<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactosModuleTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * @test
     */
    function cargar_pagina_lista_de_contactos()
    {
        $this->get('/contactos')
            ->assertStatus(200);
            //->assertSee('Catalogo de contactos');
    }

    /**
     * @test
     */
    function cargar_pagina_detalle_del_contacto()
    {
        $this->get('/contactos/5')
            ->assertStatus(200);
            //->assertSee('Mostrando detalle del contacto: 5');
    }

    /**
     * @test
     */
    function cargar_pagina_nuevo_contacto()
    {
        $this->get('/contactos/nuevo')
            ->assertStatus(200);
           // ->assertSee('Nuevo contacto');
    }

}