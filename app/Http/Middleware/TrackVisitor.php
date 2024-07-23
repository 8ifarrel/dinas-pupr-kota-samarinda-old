<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class TrackVisitor
{
    public function handle(Request $request, Closure $next)
    {
        $ipAddress = $request->ip();
        $today = Carbon::today();

        // Log IP Address and date
        // Log::info('IP Address: ' . $ipAddress);
        // Log::info('Date: ' . $today);

        // Cek apakah IP sudah ada di riwayat_ip_pengunjung
        $visitor = DB::table('riwayat_ip_pengunjung')
                    ->where('ip_address', $ipAddress)
                    ->first();

        if (!$visitor) {
            // Jika belum ada, tambahkan ke riwayat_ip_pengunjung
            DB::table('riwayat_ip_pengunjung')->insert([
                'ip_address' => $ipAddress,
                'created_at' => now(),
            ]);

            // Update statistik_pengunjung
            DB::table('statistik_pengunjung')->increment('harian');
            DB::table('statistik_pengunjung')->increment('mingguan');
            DB::table('statistik_pengunjung')->increment('bulanan');

            // Log insertion
            // Log::info('Statistik pengunjung diperbarui.');
        } 
        // else {
        //     Log::info('Pengunjung sudah tercatat.');
        // }

        return $next($request);
    }
}
