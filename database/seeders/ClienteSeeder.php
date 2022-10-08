<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clientes = [
            ['nombre' => 'Sol', 'apellido' => 'Galain', 'cuil' => '23-33902353-4', 'telefono' => '2945467931', 'email' => 'solgalain@gmail.com'],
            ['nombre' => 'Cintia', 'apellido' => 'Fernandez', 'cuil' => '29-36902753-4', 'telefono' => '2945457931', 'email' => 'cintiafernandez@gmail.com'],
            ['nombre' => 'Juan', 'apellido' => 'Perez', 'cuil' => '27-35902353-4', 'telefono' => '2945467971', 'email' => 'juanperez@gmail.com'],

        ];
        Cliente::insert($clientes);
    }
}
