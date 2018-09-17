<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert(
            [
                'id' => 3,
                'name' => 'orange',
                'supplier_id' => 1,
                'created_at'=>now(),
                'updated_at'=>now()
            ]
        );
    }
}
