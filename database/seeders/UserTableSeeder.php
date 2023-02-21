<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $firstuser = [
            'id' => 1, 
            'name' => 'guest', 
            'email' => 'example@example', 
            'email_verified_at'=>'2023-02-12 08:46:41', 
            'password'=>Hash::make($plainTextToken = Str::random(10)),
            'remember_token'=>Str::random(10), 
            'created_at'=>'2023-02-12 08:46:41', 
            'updated_at'=>'2023-02-12 08:46:41'];
        
        DB::table('users')
            ->insert($firstuser);
        


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
