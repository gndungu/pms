<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'name' => 'System Administrator',
          'email' => 'geoffrey.w.ndungu@gmail.com',
          'is_active' => true,
          'is_admin' => false,
          'password' => Hash::make('test1234'),
      ]);
    }
}
