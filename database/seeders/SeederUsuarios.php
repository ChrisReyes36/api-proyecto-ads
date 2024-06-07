<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeederUsuarios extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios = [
            [
                'name' => 'Jorge Luis',
                'email' => 'jorge@gmail.com',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Steven Gonzalez',
                'email' => 'steven@gmail.com',
                'password' => bcrypt('12345678'),
            ]
        ];

        foreach ($usuarios as $usuario) {
            User::create($usuario);
        }
    }
}
