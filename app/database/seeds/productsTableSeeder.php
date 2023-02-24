<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class productsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name'=>'sample2',
            'price'=>200,
            'info'=>'sample2',
            'image'=>'sample2',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]); 
    }
}
