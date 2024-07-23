<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatistikPengunjungSeeder extends Seeder
{
    public function run()
    {
        DB::table('statistik_pengunjung')->insert([
            'harian' => 0,
            'mingguan' => 0,
            'bulanan' => 0,
        ]);
    }
}
