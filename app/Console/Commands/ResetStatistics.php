<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ResetStatistics extends Command
{
    protected $signature = 'statistics:reset';
    protected $description = 'Reset daily, weekly, and monthly statistics';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $now = Carbon::now();
        $dayOfWeek = $now->dayOfWeek;
        $dayOfMonth = $now->day;

        if ($now->hour == 0 && $now->minute == 0) {
            // Reset harian
            DB::table('statistik_pengunjung')->update(['harian' => 0]);

            // Reset mingguan jika hari ini adalah Senin
            if ($dayOfWeek == Carbon::MONDAY) {
                DB::table('statistik_pengunjung')->update(['mingguan' => 0]);
            }

            // Reset bulanan jika hari ini adalah tanggal 1
            if ($dayOfMonth == 1) {
                DB::table('statistik_pengunjung')->update(['bulanan' => 0]);
            }
        }

        $this->info('Statistics reset successfully');
    }
}
