<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $firstemployee = [
            'id' =>1,
            'created_at' =>'2023-02-12 08:46:41',
            'updated_at' =>'2023-02-12 08:46:41',
            'user_id' =>1,
            'department' =>'null',
            'status' =>'manager',
            'profile' =>'null',
            'github' =>'null',
            'image' =>'null',

        ];

        DB::table('employees')
            ->insert($firstemployee);

        


        /*DB::table('prefectures')->insert([
            ['id' => 1, 
            'name' => 'guest', 
            'email' => 'example@example', 
            'email_verified_at'=>'2023-02-12 08:46:41', 
            'password'=>Hash::make($plainTextToken = Str::random(10)),
            'remember_token'=>Str::random(10), 
            'created_at'=>'2023-02-12 08:46:41', 
            'updated'=>'2023-02-12 08:46:41'],
        ]);
        */
    

    }
}

