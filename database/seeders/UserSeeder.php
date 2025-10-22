<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Leonardo Polo',
            'username' => 'lrpolo',
            'password' => Hash::make('Leo050223.')
        ])->syncRoles('super_usuario');

        User::create([
            'name' => 'Rosa Torres',
            'username' => 'rosa_torres',
            'password' => Hash::make('Seguridad2025*')
        ])->syncRoles('coordinador');

        User::create([
            'name' => 'Mayerlis Andrade',
            'username' => 'mayerlis_andrade',
            'password' => Hash::make('mandrade_238.')
        ])->syncRoles('encuestador');

        User::create([
            'name' => 'Liseth Ortiz',
            'username' => 'liseth_ortiz',
            'password' => Hash::make('lortiz_259.')
        ])->syncRoles('encuestador');

        User::create([
            'name' => 'Durys Leyva',
            'username' => 'durys_leyva',
            'password' => Hash::make('dleyva_317.')
        ])->syncRoles('encuestador');
        
    }
}
