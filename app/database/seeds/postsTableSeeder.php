<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class postsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title'=>'sample',
            'user_id'=>'100',
            'client'=>'sample',
            'commodity'=>'sample',
            'start_date'=> date('Y-m-d'),
            'end_date'=> date('Y-m-d'),
            'content'=>'サンプル',
            'factor'=>'サンプル',
            'image'=>'sample',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);    
        
    }
}
