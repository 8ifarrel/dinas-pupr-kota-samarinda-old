<?php

/** Author : Noviyanto Rachmady 
 * E-mail  : novay@enterwind.com
 * Copyright 2017 - The EnterWind Inc. */

/**
 * Simpan Konfigurasi di file .env
 * @return String
 */
if(!function_exists('writeConfig')) {
     function writeConfig($key, $int) {
        $lines = parseEnv(base_path('.env'));
        $data = [prefixKey($key) => "'".$int."'",];

        $lines = array_merge($lines, $data);
        $fp = @fopen(base_path('.env'), 'w+');
        if(!$fp)
            throw new Exception('Error');
        foreach($lines as $key => $data):
            if(is_int($key)):
                fwrite($fp, implode('',["\n"]));
            else:
                fwrite($fp, implode('',[$key,'=',$data,"\n"]));
            endif;
        endforeach;
        fclose($fp);
        return true;
    }

    function parseEnv($path) {
        if(!file_exists($path) || !is_file($path))
            return [];
        $lines = array_map('trim', file($path));
        $result = [];
        foreach($lines as $row => $line):
            $parts = explode('=', $line, 2);
            $result[$parts[0] ? : $row] = isset($parts[1]) ? $parts[1] : '';
        endforeach;
        return $result;
    }

    function prefixKey($key) {
        return implode('_', ['EW', $key]);
    }
}

/**
 * Make an image directory function
 * @param  $path: nama folder yang ingin dibuat
 * @return mixed
 */
if(!function_exists('makeImgDirectory')) {
    function makeImgDirectory($path) {
        # pastikan file atay folder yang dimaksud tidak ada
	    if (!file_exists(storage_path() .'/'. $path )):
	        # bila benar, buat direktori yang dimaksud dengan permission 0777
	        $oldmask = umask(0);
	        mkdir(storage_path() .'/'. $path , 0777, true);
	        umask($oldmask);
	    endif;
	    return;
    }
}


if(!function_exists('cekFile')) {
    function cekFile($file) {
        return app('filesystem')->disk(array_get(config('mediaManager'), 'storage_disk'))->exists($file);
    }
}

if(!function_exists('unduhFile')) {
    function unduhFile($file) {
        return app('filesystem')->disk(array_get(config('mediaManager'), 'storage_disk'))->download($file);
    }
}

if(!function_exists('hapusFile')) {
    function hapusFile($file) {
        app('filesystem')->disk(array_get(config('mediaManager'), 'storage_disk'))->delete($file);
    }
}

if(!function_exists('hakAkses')) {
    function hakAkses($slug) {
        switch ($slug) {
            case 1:
                return 'Admin Website';
            break;
            case 2:
                return 'Editor Website';
            break;
            case 3:
                return 'Admin PPID';
            break;
            default:
                return '-';
                break;
        }
    }
}

if(!function_exists('viewImg')) {
    function viewImg($img, $type = null) {
        if($type !== null):
            $type = "_$type.";
        else:
            $type = ".";
        endif;

        if($img == 'default.jpg'):
            return asset('assets/frontend/img/placeholder' . $type . 'png');
        endif;

        if($img == null):
            return asset('assets/frontend/img/placeholder' . $type . 'png');
        endif;


        $explode = explode(".", $img);
        $ekstensi = $explode[1];
        $file = $explode[0];

        return asset($file . $type . $ekstensi);
    }
}

if(!function_exists('postUrl')) {
    function postUrl($temp) {
        return route('frontend.berita.detail', [optional($temp->kategori)->slug, $temp->slug]);
    }
}

if(!function_exists('uuid')) {
    function uuid() {
        return Uuid::generate()->string;
    }
}

/**
 * Tanggal Dalam Bahasa Indonesia
 * @return String
 */
if(!function_exists('tgl_indo')) {
    function tgl_indo($tanggal) {
        $fix = date('Y-m-d', strtotime($tanggal));
        $bulan = array (1 => 'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
        );
        $split = explode('-', $fix);
        return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
    }
}

if(!function_exists('bulan')) {
    function bulan() {
        return array (1 => 'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
        );
    }
}

function selectBulan($i) {
    foreach(bulan() as $ii => $temp):
        if($i == $ii):
            return $temp;
        endif;
    endforeach;
}


if(!function_exists('tahunAnggaran')) {
    function tahunAnggaran() {
        return [
            '2016' => '2016',
            '2017' => '2017',
            '2018' => '2018',
            '2019' => '2019',
            '2020' => '2020', 
            '2021' => '2021'
        ];
    }
}

if(!function_exists('jenisPengadaan')) {
    function jenisPengadaan() {
        return [
            1 => 'Barang',
            'Jasa Konsultansi',
            'Jasa Lainnya',
            'Pekerjaan Konstruksi'
        ];
    }
}

function selectJenisPengadaan($i) {
    foreach(jenisPengadaan() as $ii => $temp):
        if($i == $ii):
            return $temp;
        endif;
    endforeach;
}

function rupiah($string) {
    return number_format($string, 0, ',', '.');
}

if(!function_exists('segmenPpid')) {
    function segmenPpid($slug) {
        switch ($slug) {
            case 1:
                return 'List Induk (PPID Pelaksana)';
            break;
            case 2:
                return 'Informasi dan Teknis UPD';
            break;
            case 3:
                return 'Pedagang';
            break;
            default:
                return '-';
                break;
        }
    }
}

function cekHarga($pasar, $komoditas, $tanggal) {
    return Plugin\PIHPS\Harga::whereIdPasar($pasar->id)->whereIdKomoditas($komoditas->id)->whereTanggal($tanggal)->first();
}

function harga($pasar, $komoditas, $tanggal) {
    $cek = Plugin\PIHPS\Harga::whereIdPasar($pasar->id)->whereIdKomoditas($komoditas->id)->whereTanggal($tanggal)->first();
    if($cek):
        return $cek->harga;
    else:
        return 0;
    endif;
}

function hargaTertinggi($pasar, $komoditas, $bulan, $tahun) {
    return Plugin\PIHPS\Harga::whereIdPasar($pasar->id)
        ->whereIdKomoditas($komoditas->id)
        ->whereBetween('tanggal', [tgl(01, $bulan, $tahun), tgl(31, $bulan, $tahun)])
        ->max('harga');
}

function hargaRataRata($pasar, $komoditas, $bulan, $tahun) {
    return Plugin\PIHPS\Harga::whereIdPasar($pasar->id)
        ->whereIdKomoditas($komoditas->id)
        ->whereBetween('tanggal', [tgl(01, $bulan, $tahun), tgl(31, $bulan, $tahun)])
        ->avg('harga');
}

function hargaTerendah($pasar, $komoditas, $bulan, $tahun) {
    return Plugin\PIHPS\Harga::whereIdPasar($pasar->id)
        ->whereIdKomoditas($komoditas->id)
        ->whereBetween('tanggal', [tgl(01, $bulan, $tahun), tgl(31, $bulan, $tahun)])
        ->min('harga');
}

function todayPrice() {
    foreach(Plugin\PIHPS\Pasar::all() as $pasar):
        foreach(Plugin\PIHPS\Komoditas::all() as $komoditas):
            $cek = cekHarga($pasar, $komoditas, date('Y-m-d'));
            if(!$cek):
                $kemarin = cekHarga($pasar, $komoditas, date('Y-m-d', strtotime("-1 days")));
                Plugin\PIHPS\Harga::create([
                    'id_pasar' => $pasar->id, 
                    'id_komoditas' => $komoditas->id, 
                    'tanggal' => date('Y-m-d'),
                    'harga' => !$kemarin ? 0 : $kemarin->harga, 
                    'naik' => 0, 
                    'turun' => 0
                ]);
            endif;
        endforeach;
    endforeach;
}

function toRomawi($angka)
{
    $hsl = "";
    if ($angka < 1 || $angka > 5000) { 
        // Statement di atas buat nentuin angka ngga boleh dibawah 1 atau di atas 5000
        $hsl = "Batas Angka 1 s/d 5000";
    } else {
        while ($angka >= 1000) {
            // While itu termasuk kedalam statement perulangan
            // Jadi misal variable angka lebih dari sama dengan 1000
            // Kondisi ini akan di jalankan
            $hsl .= "M"; 
            // jadi pas di jalanin , kondisi ini akan menambahkan M ke dalam
            // Varible hsl
            $angka -= 1000;
            // Lalu setelah itu varible angka di kurangi 1000 ,
            // Kenapa di kurangi
            // Karena statment ini mengambil 1000 untuk di konversi menjadi M
        }
    }
    if ($angka >= 500) {
        // statement di atas akan bernilai true / benar
        // Jika var angka lebih dari sama dengan 500
        if ($angka > 500) {
            if ($angka >= 900) {
                $hsl .= "CM";
                $angka -= 900;
            } else {
                $hsl .= "D";
                $angka-=500;
            }
        }
    }
    while ($angka>=100) {
        if ($angka>=400) {
            $hsl .= "CD";
            $angka -= 400;
        } else {
            $angka -= 100;
        }
    }
    if ($angka>=50) {
        if ($angka>=90) {
            $hsl .= "XC";
            $angka -= 90;
        } else {
            $hsl .= "L";
            $angka-=50;
        }
    }
    while ($angka >= 10) {
        if ($angka >= 40) {
            $hsl .= "XL";
            $angka -= 40;
        } else {
            $hsl .= "X";
            $angka -= 10;
        }
    }
    if ($angka >= 5) {
        if ($angka == 9) {
            $hsl .= "IX";
            $angka-=9;
        } else {
            $hsl .= "V";
            $angka -= 5;
        }
    }
    while ($angka >= 1) {
        if ($angka == 4) {
            $hsl .= "IV"; 
            $angka -= 4;
        } else {
            $hsl .= "I";
            $angka -= 1;
        }
    }
    return ($hsl);
}


function tgl($i, $bulan, $tahun) {
    return $tahun . "-" . sprintf("%02d", $bulan) . "-" . sprintf("%02d", $i);
}

function hari() {
    return [
        'Senin' => 'Senin', 
        'Selasa' => 'Selasa', 
        'Rabu' => 'Rabu', 
        'Kamis' => 'Kamis', 
        'Jum\'at' => 'Jum\'at', 
        'Sabtu' => 'Sabtu'
    ];
}

function select_hari($i) {
    foreach(hari() as $ii => $temp):
        if($i == $ii):
            return $temp;
        endif;
    endforeach;
}

if(!function_exists('segmenPpid')) {
    function segmenPpid($slug) {
        switch ($slug) {
            case 1:
                return 'List Induk (PPID Pembantu)';
            break;
            case 2:
                return 'Informasi dan Teknis UPD';
            break;
            default:
                return '-';
                break;
        }
    }
    
}

