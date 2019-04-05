<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Email;
use App\Models\Direccion;
use App\Models\Telefono;
use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Image;

class ContactoController extends Controller
{
    
    //--- CATALOGO DE CONTACTOS ---//
    public function index()
    {
        $titulo = 'CATALOGO DE CONTACTOS';
        $contactos = Contacto::orderBy('id', 'DESC')->paginate(5);
        return view('contactos.index', compact('titulo', 'contactos'));
    }

    //--- DETALLE DEL CONTACTO ---//
    public function detalle(Contacto $contacto)
    {
        $titulo = 'Detalle de contactos';
        $buscarContacto = Contacto::findOrFail($contacto->id);
        $emails = Email::where('contacto_id', '=', $buscarContacto->id)->get();
        $direcciones = Direccion::where('contacto_id', '=', $buscarContacto->id)->get();
        $telefonos = Telefono::where('contacto_id', '=', $buscarContacto->id)->get();
        $foto = Foto::where('contacto_id', '=', $buscarContacto->id)->get();
        return view('contactos.detalle', compact('titulo', 'buscarContacto', 'emails', 'direcciones', 'telefonos', 'foto'));
    }

    //--- VIEW PARA NUEVO ---//
    public function nuevo() 
    {
        return view('contactos.crear');
    }
    
    //--- CREAR CONTACTO ---//
    public function crear() 
    {

        //--- SE VALIDA LA INFORMACION 
        $data = request()->validate([
            'nombre' => 'required',
            'ap_paterno' => 'required',
            'ap_materno' => 'required',
            'fecha_nacimiento' => 'required',
            'alias' => ['required', 'unique:contactos,alias'],
        ], [
            'nombre' => 'El nombre es obligatorio',
            'ap_paterno' => 'El ap_paterno es obligatorio',
            'ap_materno' => 'El ap_materno es obligatorio',
            'fecha_nacimiento' => 'La fecha_nacimiento es obligatorio',
            'alias' => 'El alias es obligatorio',
        ]);


        // Begin Transaction
        DB::beginTransaction();

            //-- Crea al contacto
            $contacto = Contacto::create([
                'nombre' => $data['nombre'],
                'ap_paterno' => $data['ap_paterno'],
                'ap_materno' => $data['ap_materno'],
                'fecha_nacimiento' => $data['fecha_nacimiento'],
                'alias' => $data['alias']
            ]);

            //--- Datos adicionales
            $dataAdicional = request()->all();

            //-- Crea los emails
            if(isset($dataAdicional['email'])) {
                foreach ($dataAdicional['email'] as $email) {
                    if(!empty($email)){
                    Email::create([
                        'contacto_id' => $contacto->id,
                        'email' => $email
                    ]);
                    }
                }
            }

            //--- Crea las direcciones
            if(isset($dataAdicional['direccion'])) {
                foreach ($dataAdicional['direccion'] as $direccion) {
                    Direccion::create([
                        'contacto_id' => $contacto->id,
                        'direccion' => $direccion
                    ]);
                }
            }

            //--- Crea los telefonos
            if(isset($dataAdicional['telefono']) && isset($dataAdicional['descripcion'])) {
                $x = 0;
                foreach ($dataAdicional['telefono'] as $telefono) {
                    if(isset($telefono) && isset($dataAdicional['descripcion'][$x])) {
                    Telefono::create([
                        'contacto_id' => $contacto->id,
                        'descripcion' => $dataAdicional['descripcion'][$x],
                        'telefono' => $telefono
                    ]);
                    }
                    ++$x;
                }
            }

            //--- Subir la imagen ---//
            $imagen = $this->store(request());
            $foto = Foto::create([
                'contacto_id' => $contacto->id,
                'foto' => $imagen
            ]);
  
        // Commit Transaction
        DB::commit();

        return redirect()->route('contactos.index');
    }


    //--- VIEW PARA EDITAR ---//
    public function editar(Contacto $contacto)
    {
        $buscarContacto = Contacto::findOrFail($contacto->id);
        $emails = Email::where('contacto_id', '=', $buscarContacto->id)->get();
        $direcciones = Direccion::where('contacto_id', '=', $buscarContacto->id)->get();
        $telefonos = Telefono::where('contacto_id', '=', $buscarContacto->id)->get();
        $foto = Foto::where('contacto_id', '=', $buscarContacto->id)->get();
        //--- Envia los arreglos para la pagina de editar 
        return view('contactos.editar', ['contacto' =>  $contacto, 'emails' => $emails, 'direcciones' => $direcciones, 'telefonos' => $telefonos, 'foto' => $foto]);
    }


    //--- ACTUALIZAR CONTACTO ---//
    public function actualizar(Contacto $contacto, Email $emails, Direccion $direcciones, Telefono $telefonos, Foto $foto)
    {

        //--- SE VALIDA LA INFORMACION 
        $data = request()->validate([
            'nombre' => 'required',
            'ap_paterno' => 'required',
            'ap_materno' => 'required',
            'fecha_nacimiento' => 'required',
            'alias' => ['required', Rule::unique('contactos', 'alias')->ignore($contacto->id)],
        ]);

        $datos = request()->all();

        // Begin Transaction
        DB::beginTransaction();

            $contacto->update($datos);

            if(isset($dataAdicional['email'])) {
                $x=0;
                foreach ($datos['emails'] as $email) {
                    $valor = Email::find($datos['idemail'][$x]);
                    $valor->update(['email' => $email]);
                    ++$x;
                }
            }

            if(isset($dataAdicional['direcciones'])) {
                $x=0;
                foreach ($datos['direcciones'] as $direccion) {
                    $valor = Direccion::find($datos['iddireccion'][$x]);
                    $valor->update(['direccion' => $direccion]);
                    ++$x;
                }
            }

            if(isset($dataAdicional['telefonos'])) {
                $x=0;
                foreach ($datos['telefonos'] as $telefono) {
                    $valor = Telefono::find($datos['idtelefono'][$x]);
                    $valor->update(['telefono' => $telefono]);
                    ++$x;
                }

                $x=0;
                foreach ($datos['descripciones'] as $descripcion) {
                    $valor = Telefono::find($datos['idtelefono'][$x]);
                    $valor->update(['descripcion' => $descripcion]);
                    ++$x;
                }
            }


            $imagen = $this->store(request());
dd($imagen);

            if ($request->file('imagen') && $request->file('imagen')->isValid()) {
                $request->file('imagen')->move($path, $documentName);
                $data['document'] = $documentName;
            }
        
        // $document->update($request->all());
       // $document->update($data);





        // Commit Transaction
        DB::commit();

        return redirect()->route('contactos.detalle', ['contacto' => $contacto->id]);
    }
    

    //--- BORRAR CONTACTO ---//
    public function eliminar(Contacto $contacto)
    {
        $contacto->delete();
        return redirect()->route('contactos.index');
    }

    
    public function store(Request $request)
    {
        // ruta de las imagenes guardadas
        $ruta = public_path().'/img/';

        // recogida del form
        $imagenOriginal = $request->file('imagen');

        // crear instancia de imagen
        $imagen = Image::make($imagenOriginal);

        // generar un nombre aleatorio para la imagen
        $temp_name = $this->random_string() . '.' . $imagenOriginal->getClientOriginalExtension();

        $imagen->resize(300,300);

        // guardar imagen
        // save( [ruta], [calidad])
        $imagen->save($ruta . $temp_name, 100);

        return $temp_name;
    }

    protected function random_string()
    {
        $key = '';
        $keys = array_merge( range('a','z'), range(0,9) );
    
        for($i=0; $i<10; $i++)
        {
            $key .= $keys[array_rand($keys)];
        }
    
        return $key;
    }

}