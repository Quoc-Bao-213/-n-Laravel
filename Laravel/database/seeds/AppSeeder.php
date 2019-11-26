<?php

use Illuminate\Database\Seeder;

class AppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cau_hinh_app')->insert([
            "co_hoi_sai" => 5,
            "thoi_gian_tra_loi" => 30000
        ]);
    }
}
