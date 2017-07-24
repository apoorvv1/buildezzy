<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $user = factory(App\User::class)->create([
             'username' => 'admin',
             'email' => 'apoorvv1@gmail.com',
             'password' => bcrypt('admin'),
             'lastname' => 'verma',
             'firstname' => 'apoorv'
         ]);
    }
}
