<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ClearVisitorHistory extends Command
{
    protected $signature = 'visitors:clear';
    protected $description = 'Clear visitor IP history every midnight';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        DB::table('riwayat_ip_pengunjung')->truncate();
        $this->info('Visitor IP history cleared successfully.');
    }
}
