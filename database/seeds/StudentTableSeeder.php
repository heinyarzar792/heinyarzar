<?php

use Illuminate\Database\Seeder;
use App\Student;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // $s1 = new Student;
       // $s1->name = "Nu Nu";
       // $s1->email = "nunu@gmail.com";
       // $s1->address = "Latha";
       // $s1->save();

       // $s2 = new Student;
       // $s2->name = "Pu Pu";
       // $s2->email = "pupu@gmail.com";
       // $s2->address = "Bahan";
       // $s2->save();
      factory(App\Student::class, 10)->create();

    }
}
