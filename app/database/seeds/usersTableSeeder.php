<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'number'=> 100,
            'name'=>'admin',
            'department'=>'admin',
            'email'=>'admin@admin.com',
            'password' => Hash::make('admin'),
            'role'=> '0',
            'del_flg'=> FALSE,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
    }
}
