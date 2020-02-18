<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array([
              'name' => 'Shiro',
              'firstname' => 'Admin',
              'lastname' => 'Admin',
              'admin' => '1',
              'email' => 'test@admin.fr',
              'password' => 'P@ssw0rd'
          ]); 
          App\User::insert($data);
    }
}
