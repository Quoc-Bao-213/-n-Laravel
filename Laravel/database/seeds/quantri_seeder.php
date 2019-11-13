<?php

use Illuminate\Database\Seeder;

class quantri_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quan_tri_vien')->insert([
			'ten_dang_nhap' => 'admin',
			'mat_khau' => Hash::make('admin@!23'),
			'ho_ten' => 'Administrator',
        ]);
    }
}
