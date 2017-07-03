<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
class Member1TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('member1')->insert([
        		['name'=>'sean','age'=>22,'sex'=>10,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
        		['name'=>'jack','age'=>21,'sex'=>11,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')]
        ]);
    	
    }
}
