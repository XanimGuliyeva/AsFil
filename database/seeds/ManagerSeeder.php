<?php

use Illuminate\Database\Seeder;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = 'Manager';
        $surname = 'Manager';
        $phone = 'Manager';
        $email = 'manager@gmail.com';
        $password = 'manager357';
        $category = 'manager';
        $password = \Illuminate\Support\Facades\Hash::make($password);
        $add = new \App\User();
        $add->name = $name;
        $add->surname = $surname;
        $add->phone = $phone;
        $add->email = $email;
        $add->category = $category;
        $add->password = $password;
        $add->save();
    }
}
