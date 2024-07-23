<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatisticsTables extends Migration
{
    public function up()
    {
        Schema::create('riwayat_ip_pengunjung', function (Blueprint $table) {
            $table->string('ip_address')->primary();
            $table->timestamps();
        });

        Schema::create('statistik_pengunjung', function (Blueprint $table) {
            $table->integer('harian')->default(0);
            $table->integer('mingguan')->default(0);
            $table->integer('bulanan')->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('riwayat_ip_pengunjung');
        Schema::dropIfExists('statistik_pengunjung');
    }
}
