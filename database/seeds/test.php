<?php

use Illuminate\Database\Seeder;

class test extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'Nombre'    => 'Usuario',
            'Apellido' 	=> 'Administrador',
            'cedula'     => '00000000',
            'email'     => 'admin@example.com',
        	'password' 	=> bcrypt('admin'),
        	'tipo'		=> 'Admin',
        ]);

         DB::table('users')->insert([
            'Nombre'    => 'Usuario',
            'Apellido'  => 'Normal',
            'cedula'     => '00000001',
            'email'     => 'normal@example.com',
            'password'  => bcrypt('normal'),
            'tipo'      => 'Normal',
        ]);
    }
}
