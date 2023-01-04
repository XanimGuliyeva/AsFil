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
        $name = 'Admin';
        $surname = 'Admin';
        $phone = 'Admin';
        $email = 'asfil@gmail.com';
        $password = 'asfil357';
        $category = 'admin';
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
