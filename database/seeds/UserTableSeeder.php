<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $helper1 = new \App\User();
        $helper1->name = "Student Homer";
        $helper1->email = "OJsimp@gmx.net";
        $helper1->password = bcrypt('1234567890');
        $helper1->is_helper = true;
        $helper1->address = "742 Evergreen Terrace";
        $helper1->birthdate = "1996-12-08";
        $helper1->save();

        $helper2 = new \App\User();
        $helper2->name = "Student Brabak Brobrama";
        $helper2->email = "bb@b.net";
        $helper2->password = bcrypt('1234567890');
        $helper2->is_helper = true;
        $helper2->address = "123 White House";
        $helper2->birthdate = "1965-12-08";
        $helper2->save();

        $helped1 = new \App\User();
        $helped1->name = "Senior Drumbos";
        $helped1->email = "t-trump@gmx.net";
        $helped1->password = bcrypt('1234567890');
        $helped1->is_helper = false;
        $helped1->address = "2020 Dump";
        $helped1->birthdate = "1932-12-08";
        $helped1->save();

        $helped2 = new \App\User();
        $helped2->name = "Senior Marge";
        $helped2->email = "mj@gmx.net";
        $helped2->password = bcrypt('1234567890');
        $helped2->is_helper = false;
        $helped2->address = "733 Evergreen Terrace";
        $helped2->birthdate = "1934-12-08";
        $helped2->save();
    }
}
