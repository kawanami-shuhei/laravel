<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

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
            'name'=>'sample',
            'department'=>'sample',
            'email'=>'sample@sample',
            'password'=>'sample',
            'role'=> '1',
            'del_flg'=> FALSE,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
    }
}
