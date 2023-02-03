<?php

use Illuminate\Database\Seeder;

class post_productTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_product')->insert([
            'product_id'=>'100',
            'post_id'=>'100',
        ]);    
    }
}
