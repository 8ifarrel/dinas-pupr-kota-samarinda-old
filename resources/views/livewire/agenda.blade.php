<div>
    <div class="d-flex justify-content-center">
        <div class="calendar-container w-75">
            <div
                class="d-flex justify-content-between bg-blue-18 p-3 rounded-4 border border-secondary">
                <button wire:click="loadPekanSebelumnya" class="btn rounded-4 py-2 px-4 fw-bold">
                    Pekan Sebelumnya
                </button>

                <div class="fs-md fw-bold d-flex align-items-center">
                    {{ $tanggalPertamaPekan->format('F Y') }}
                </div>

                <button wire:click="loadPekanBerikutnya" class="btn rounded-4 py-1 px-4 fw-bold">
                    Pekan Berikutnya
                </button>
            </div>

            <div class="d-flex justify-content-between">
                @foreach ($jadwal as $kegiatan)

                @php
                $tanggal = Carbon\Carbon::parse($kegiatan['tanggal']);
                $isActiveDate = $tanggal->toDateString() === $activeDate;
                @endphp

                <div class="calendar-day @if($isActiveDate) active-date @endif mt-3 text-center rounded-4 shadow bg-blue-18"
                    style="padding: 10px 40px;"
                    wire:click="pilihTanggal('{{ $kegiatan['tanggal'] }}')">
                    {{ $tanggal->locale('id')->isoFormat('D') }}<br>
                    {{ $tanggal->locale('id')->isoFormat('dddd') }}<br>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Kode di luar calendar-body --}}
    <div class="d-flex justify-content-center mt-4">
        <div class="w-75">
            @if (!$agenda_kegiatan_filter->isEmpty())

            <div class="mt-4 mb-3">
                <p class="m-0 text-blue fs-md">
                  Terdapat <span class="fw-bold">{{ $agenda_kegiatan_filter->count() }} kegiatan</span>
                </p>
            </div>

            @foreach ($agenda_kegiatan_filter as $item)
            <div class="card rounded-4 mx-auto border-0 bg-blue-18 my-3 px-3">
                <div class="card-body">
                    <p class="fs-md mb-2 fw-semibold">
                        {{ $item->nama }}
                    </p>

                    <div class="badge rounded-pill bg-blue shadow-md mb-2">
                        <p class=" px-2 py-1 text-yellow fw-bold m-0 fs-md">
                            <small>
                                {{ $item->dihadiri_oleh }}
                            </small>
                        </p>
                    </div>

                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="m-0 fs-md fw-semibold">
                                <small>
                                    {{ $item->waktu }} | {{ $item->tempat }}
                                </small>
                            </p>
                        </div>

                        <div class="d-flex align-items-center" id="dot-{{ $item->id }}">
                            @if ($this->getStatus($item) === "Sedang Berlangsung")
                            <dotlottie-player
                                src="https://lottie.host/534d821f-20c2-4173-b8d4-b8a0e719ee64/mpgYgLfCR1.json"
                                background="transparent" speed="1" style="width: 20px; height: 20px;" loop autoplay>
                            </dotlottie-player>
                            @endif

                            <!-- Display the status -->
                            <span class="ml-2">{{ $this->getStatus($item) }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="card rounded-4 mx-auto border-0 mb-3">
                <div class="">
                    <dotlottie-player src="https://lottie.host/7b306262-0233-45ad-a820-c6b33105d262/Kxj0npnkrb.json" background="transparent" speed="1" style="width: 300px; height: 300px;" autoplay class="w-100"></dotlottie-player>
                    
                    <p class="fs-lg m-0 fw-bold text-center">
                        Tidak ada agenda
                    </p>
                </div>
            </div>
            @endif
        </div>
    </div>

</div>