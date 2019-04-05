<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables([
            'contactos',
            'emails',
            'direciones',
            'telefonos',
            'fotos'
        ]);

        $this->call(ContactosSeeder::class);
    }

    protected function truncateTables(array $tables) {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0'); // Desactivar llave foranea
        foreach ($tables as $table) {
            DB::table($table)->truncate(); // Limpiar la tabla
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1'); // Activar llave foranea
    }

}
