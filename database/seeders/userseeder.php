<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Carlos Luis',
            'username' => 'rood26',
            'password' => Hash::make('palabrasecreta2'),
            //FECHA DE CREACIÓN Y ACTUALIZACIÓN NO SON RELEVANTES
        ]);
    }
}
