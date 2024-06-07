<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;

class SeederClientes extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clientes = [
            [
                'name' => 'John Doe',
                'address' => 'San Salvador, El Salvador',
                'phone' => '78945612',
                'email' => 'John@gmail.com'
            ],
            [
                'name' => 'Juan Perez',
                'address' => 'San Salvador, El Salvador',
                'phone' => '78945613',
                'email' => 'juan@gmail.com'
            ],
            [
                'name' => 'Maria Lopez',
                'address' => 'San Salvador, El Salvador',
                'phone' => '78945614',
                'email' => 'maria@gmail.com'
            ],
            [
                'name' => 'Ana Ramirez',
                'address' => 'San Salvador, El Salvador',
                'phone' => '78945615',
                'email' => 'ana@gmail.com'
            ],
        ];

        foreach ($clientes as $cliente) {
            Cliente::create($cliente);
        }
    }
}
