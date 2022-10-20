<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Gender;
use App\Models\Nationalitie;
use App\Models\Blood;
use App\Models\Specialization;
use App\Models\Employe;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employes')->delete();
        $employes = new Employe();
        $employes->name = ['ar' => 'عمر سعودي', 'en' => 'Omar Saoudi'];
        $employes->email = 'saoudiomar518@gmail.com';
        $employes->password = Hash::make('1');
        $employes->joining_date = date("Y-m-d h:i:s");
        $employes->date_birth = date('1998-07-13');
        $employes->status = 1;
        $employes->address = 'حي تعاونية الامير عبد القادر';
        $employes->gender_id = Gender::all()->unique()->random()->id;
        $employes->nationalitie_id = Nationalitie::all()->unique()->random()->id;
        $employes->blood_id = Blood::all()->unique()->random()->id;
        $employes->specialization_id = Specialization::all()->unique()->random()->id;
        $employes->save();
    }
}
