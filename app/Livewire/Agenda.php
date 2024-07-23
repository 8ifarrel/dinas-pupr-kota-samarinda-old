<?php

namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\AgendaKegiatan;


class Agenda extends Component
{
	public $bulan;
	public $tahun;
	public $jadwal;
	public $tanggalPertamaPekan;
	public $tanggalPilihan;
	public $agenda_kegiatan;
	public $agenda_kegiatan_filter;

	public $activeDate;

	protected $layout = 'components.layouts.app';


	public function mount()
	{
		$this->bulan = now()->month;
		$this->tahun = now()->year;
		$this->tanggalPertamaPekan = now()->startOfWeek();
		$this->tanggalPilihan = now()->toDateString();
		$this->agenda_kegiatan = AgendaKegiatan::all(); // Ganti ini dengan logika yang sesuai
		$this->loadJadwal();
		$this->loadAgendaKegiatan();
		$this->activeDate = now()->toDateString();
	}

	public function updatedBulan()
	{
		$this->loadJadwal();
	}

	public function updatedTahun()
	{
		$this->loadJadwal();
	}

	public function loadJadwal()
	{
		$startOfWeek = $this->tanggalPertamaPekan->copy();
		$endOfWeek = $this->tanggalPertamaPekan->copy()->endOfWeek();

		$this->jadwal = collect();

		while ($startOfWeek <= $endOfWeek) {
			$this->jadwal->push([
				'tanggal' => $startOfWeek->toDateString(),
				'hari' => $startOfWeek->format('l'),
				'kegiatan' => $this->getKegiatan($startOfWeek->toDateString()),
			]);

			$startOfWeek->addDay();
		}
		
		$this->loadAgendaKegiatan();
	}

	public function loadAgendaKegiatan()
	{
		if ($this->agenda_kegiatan) {
			$this->agenda_kegiatan_filter = $this->agenda_kegiatan->filter(function ($item) {
				$tanggalKegiatan = Carbon::parse($item->tanggal);
				return $tanggalKegiatan->isSameDay($this->tanggalPilihan);
			});
		} else {
			$this->agenda_kegiatan_filter = collect();
		}

		$this->agenda_kegiatan_filter = $this->agenda_kegiatan_filter->sortBy('waktu');
	}

	public function pilihTanggal($tanggal)
	{
		$this->tanggalPilihan = $tanggal;
		$this->loadAgendaKegiatan();
		$this->activeDate = $tanggal;
	}

	public function getKegiatan($tanggal)
	{
		$agenda = AgendaKegiatan::whereDate('tanggal', $tanggal)->first();

		return $agenda ? $agenda->nama : '';
	}

	public function loadPekanSebelumnya()
	{
		$this->tanggalPertamaPekan = $this->tanggalPertamaPekan->subWeek();
		$this->loadJadwal();
	}

	public function loadPekanBerikutnya()
	{
		$this->tanggalPertamaPekan = $this->tanggalPertamaPekan->addWeek();
		$this->loadJadwal();
	}

	public function render()
	{
		return view('livewire.agenda',);
	}

	public function getStatusKegiatanFromDatabase($id)
	{
		// Mengambil agenda kegiatan dari database berdasarkan ID
		$agenda = AgendaKegiatan::findOrFail($id);

		// Mendapatkan nilai kolom 'tanggal' dan 'waktu' sebagai objek Carbon
		$tanggalKegiatan = $agenda->tanggal;
		$waktuKegiatan = $agenda->waktu;

		// Menggunakan fungsi getStatusKegiatan
		$status = $this->getStatusKegiatan($tanggalKegiatan, $waktuKegiatan);

		return $status;
	}

	public function getStatusKegiatan($tanggalKegiatan, $waktuKegiatan)
	{
		// Konversi $tanggalKegiatan dan $waktuKegiatan ke objek Carbon
		$tanggalKegiatan = Carbon::parse($tanggalKegiatan);
		$waktuKegiatan = Carbon::parse($waktuKegiatan);

		// Gabungkan tanggal dan waktu untuk mendapatkan timestamp lengkap
		$timestampKegiatan = $tanggalKegiatan->setTime($waktuKegiatan->hour, $waktuKegiatan->minute, $waktuKegiatan->second)->toDateTimeString();

		$currentTimestamp = Carbon::now('Asia/Makassar')->toDateTimeString();

		// Kondisi: Akan berlangsung
		if ($currentTimestamp < $timestampKegiatan) {
			return "Akan berlangsung";
		}

		// Kondisi: Sedang berlangsung
		// baiki di sini
		$twentyFourHoursAfter = $tanggalKegiatan->copy()->hour(17)->minute(0)->second(0)->toDateTimeString();
		if ($currentTimestamp >= $timestampKegiatan && $currentTimestamp < $twentyFourHoursAfter) {
			return "Sedang Berlangsung";
		}

		// Kondisi: Sudah selesai
		if ($currentTimestamp >= $twentyFourHoursAfter) {
			return "Sudah Selesai";
		}

		// Jika tidak memenuhi kondisi di atas, mungkin ada kesalahan
		return "Error: Tidak dapat menentukan status kegiatan.";
	}

	public function getStatus($item)
	{
		return $this->getStatusKegiatan($item->tanggal, $item->waktu);
	}
}
