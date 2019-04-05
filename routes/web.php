<?php

Route::get('/', function () {
    return 'Home';
});

//--- CONTACTOS ---//

//--- Listado ---//
Route::get('/contactos', 'ContactoController@index')->name('contactos.index');
//--- Detalle  ---//
Route::get('/contactos/{contacto}', 'ContactoController@detalle')->where('contacto', '[0-9]+')->name('contactos.detalle');
//--- Nuevo ---//
Route::get('/contactos/nuevo', 'ContactoController@nuevo')->name('contactos.nuevo');
Route::post('/contactos/crear', 'ContactoController@crear')->name('contactos.crear');
//--- Editar ---/
Route::get('/contactos/{contacto}/editar', 'ContactoController@editar')->name('contactos.editar');
Route::put('/contactos/{contacto}', 'ContactoController@actualizar')->name('contactos.actualizar');
//--- Borrar ---//
Route::delete('/contactos/{contacto}', 'ContactoController@eliminar')->name('contactos.eliminar');
