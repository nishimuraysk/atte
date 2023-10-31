<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $param = [
            'name' => 'user_01',
            'email' => 'sample01@email.com',
            'password' => bcrypt('user_01'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'user_02',
            'email' => 'sample02@email.com',
            'password' => bcrypt('user_02'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'user_03',
            'email' => 'sample03@email.com',
            'password' => bcrypt('user_03'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'user_04',
            'email' => 'sample04@email.com',
            'password' => bcrypt('user_04'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'user_05',
            'email' => 'sample05@email.com',
            'password' => bcrypt('user_05'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'user_06',
            'email' => 'sample06@email.com',
            'password' => bcrypt('user_06'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'user_07',
            'email' => 'sample07@email.com',
            'password' => bcrypt('user_07'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'user_08',
            'email' => 'sample08@email.com',
            'password' => bcrypt('user_08'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'user_09',
            'email' => 'sample09@email.com',
            'password' => bcrypt('user_09'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'user_10',
            'email' => 'sample10@email.com',
            'password' => bcrypt('user_10'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('users')->insert($param);

    }
}
