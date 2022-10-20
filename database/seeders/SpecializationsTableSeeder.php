<?php
namespace Database\Seeders;
use App\Models\Specialization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specializations')->delete();
        $specializations = [
            ['en'=> 'Office assistant', 'ar'=> 'مساعد المكتب'],
            ['en'=> 'Account manager', 'ar'=> 'إدارة حساب المستخدم'],
            ['en'=> 'Office manager', 'ar'=> 'مدير مكتب'],
            ['en'=> 'Administrative assistant', 'ar'=> 'مساعد اداري'],
        ];
        foreach ($specializations as $s) {
            Specialization::create(['name' => $s]);
        }
    }
}
