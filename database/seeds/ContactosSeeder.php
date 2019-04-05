<?php

use App\Models\Contacto;
use App\Models\Email;
use App\Models\Direccion;
use App\Models\Telefono;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ContactosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // --- CONTACTO --- ///
        factory(Contacto::class, 30)->create();
        // --- EMAIL --- ///
        factory(Email::class, 30)->create();
        // --- DIRECCION --- ///
        factory(Direccion::class, 30)->create();
        // --- TELEFONO --- ///
        factory(Telefono::class, 30)->create();
    }
}
