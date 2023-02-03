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
            'name'=>'sample',
            'price'=>100,
            'info'=>'sample',
            'image'=>'sample',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]); 
    }
}
