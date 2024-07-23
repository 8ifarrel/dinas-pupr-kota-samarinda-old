@extends('umum.layouts.portal')

@section('container')

{{-- Logo --}}
<div class="d-flex justify-content-center mt-5">
	<img src="{{ asset('logo/pemerintah/kota-samarinda.png') }}" alt="" style="height: 80px">

	<img src="{{ asset('logo/pemerintah/dpupr-kota-samarinda.png') }}" alt="" style="height: 80px">
</div>

{{-- Teks --}}
<div class="mt-4">
	<h2 class="text-center fw-bold">
		PORTAL RESMI DINAS PUPR KOTA SAMARINDA
	</h2>

	<h4 class="text-center m-0">
		Bergerak Bersama, Samarinda Makin Maju
	</h4>
</div>

{{-- Tombol ke website utama --}}
<div class="d-flex justify-content-center" style="margin-top: 60px;">
	<a class="hexagon" href="{{ route('umum.beranda') }}">
		<span class="hexagon-text fw-semibold">Masuk ke Website</span>
	</a>
</div>

{{-- Aplikasi --}}
<div class="d-flex justify-content-center mt-4">
	<div class="card bg-blue" style="width: 75rem; box-shadow: 0 0 0 10px rgba(34, 52, 104, 0.25); border-radius: 0px">
		<div class="card-body">
			<div class="d-flex justify-content-between text-center text-yellow mx-4">
				<a data-bs-toggle="modal" data-bs-target="#a">
					<lottie-player style="height: 200px;"
						src="https://lottie.host/dd34a41c-849f-43dc-b0bf-bb9cff0ed814/FrdooYL5sY.json" background="transparent"
						speed="1" loop autoplay></lottie-player>
					<h5 class="card-title">Informasi Publik</h5>
				</a>

				<a data-bs-toggle="modal" data-bs-target="#b">
					<lottie-player style="height: 200px;"
						src="https://lottie.host/79009bb3-5d07-4937-b043-bdfec1f41bf1/l1GIKi6RYJ.json" background="transparent"
						speed="1" loop autoplay></lottie-player>
					<h5 class="card-title">Layanan Aplikasi</h5>
				</a>

				<a data-bs-toggle="modal" data-bs-target="#c">
					{{-- <img src="{{ asset('logo/newsboard/layanan-aduan.png') }}" alt=""> --}}
					<lottie-player style="height: 200px;"
						src="https://lottie.host/05a9c4fd-d359-4d7b-acbf-b9d560cf3739/vwyhQ7Wt8H.json" background="transparent"
						speed="1" loop autoplay></lottie-player>
					<h5 class="card-title">Layanan Aduan</h5>
				</a>

				<a data-bs-toggle="modal" data-bs-target="#d">
					<lottie-player style="height: 200px;"
						src="https://lottie.host/7fc5c4a3-cad9-414a-8bc5-e097ed4ca67c/zGiBmsHxZj.json" background="transparent"
						speed="1" loop autoplay></lottie-player>
					<h5 class="card-title">Media Sosial</h5>
				</a>
			</div>
		</div>
	</div>
</div>

{{-- Footbar --}}
<div class="container-fluid bg-blue py-2 fixed-bottom">
	<p class="m-0 text-center text-white">
		<small>
			2024 &copy; Dinas Pekerjaan Umum dan Penataan Ruang Kota Samarinda.
			<br>
			Powered by Tim IT DPUPR Kota Samarinda.
		</small>
	</p>
</div>

{{-- Modal Layanan Aplikasi --}}
<div class="modal fade" id="a" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content rounded-3 border-0">
			<div class="modal-body d-flex justify-content-between bg-blue text-white rounded-top-3 border-0">
				<div class="d-flex">
					<lottie-player style="height: 100px;"
						src="https://lottie.host/dd34a41c-849f-43dc-b0bf-bb9cff0ed814/FrdooYL5sY.json" background="transparent"
						speed="1" loop autoplay></lottie-player>
					<h5 class="card-title d-flex align-items-center">Informasi Publik</h5>
				</div>
				<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<div class="modal-body d-flex justify-content-between text-center fw-semibold">
				<p class="m-0">
					Temukan informasi yang dapat diakses secara publik seperti berita, PPID Pelaksana, dan pengumuman di sini.
				</p>
			</div>

			<div class="modal-body d-flex justify-content-evenly px-0">

				<a href="{{ route('umum.berita.kategori') }}">
					<button class="btn bg-blue rounded-2 py-2 px-4 fw-bold fs-md text-white">
						Berita
					</button>
				</a>

				<a href="{{ route('umum.pengumuman') }}">
					<button class="btn bg-blue rounded-2 py-2 px-4 fw-bold fs-md text-white">
						Pengumuman
					</button>
				</a>

				<a href="{{ route('umum.beranda') }}">
					<button class="btn bg-blue rounded-2 py-2 px-4 fw-bold fs-md text-white">
						PPID Pelaksana
					</button>
				</a>

			</div>
		</div>
	</div>
</div>

{{-- Modal Layanan Aplikasi --}}
<div class="modal fade" id="b" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content rounded-3 border-0">
			<div class="modal-body d-flex justify-content-between bg-blue text-white rounded-top-3 border-0">
				<div class="d-flex">
					<lottie-player style="height: 100px;"
						src="https://lottie.host/79009bb3-5d07-4937-b043-bdfec1f41bf1/l1GIKi6RYJ.json" background="transparent"
						speed="1" loop autoplay></lottie-player>
					<h5 class="card-title d-flex align-items-center">Layanan Aplikasi</h5>
				</div>
				<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<div class="modal-body d-flex justify-content-between text-center fw-semibold">
				<p class="m-0">
					Temukan berbagai layanan aplikasi yang kami sediakan untuk memenuhi kebutuhan Anda.
				</p>
			</div>

			<div class="modal-body d-flex flex-column justify-content-center text-center px-0">
				<div class="mb-2">
					<a href="" class="text-decoration-none">
						<button class="btn bg-blue rounded-2 py-2 px-4 fw-bold fs-md text-white">
							Hantubanyu
						</button>
					</a>

					<a href="" class="text-decoration-none">
						<button class="btn bg-blue rounded-2 py-2 px-4 fw-bold fs-md text-white">
							UPTD Limbah
						</button>
					</a>
				</div>

				<div>
					<a href="http://forms.gle/CqvjPRs1uiEPL7TN7" class="text-decoration-none">
						<button class="btn bg-blue rounded-2 py-2 px-4 fw-bold fs-md text-white">
							UPTD Jalan dan Jembatan
						</button>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

{{-- Modal Layanan Aduan --}}
<div class="modal fade" id="c" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content rounded-3 border-0">
			<div class="modal-body d-flex justify-content-between bg-blue text-white rounded-top-3 border-0">
				<div class="d-flex">
					<lottie-player src="https://lottie.host/05a9c4fd-d359-4d7b-acbf-b9d560cf3739/vwyhQ7Wt8H.json"
						background="transparent" speed="1" style="width: 100px; height: 100px;" loop autoplay class="me-3">
					</lottie-player>
					<h5 class="card-title d-flex align-items-center">Layanan Aduan</h5>
				</div>
				<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<div class="modal-body d-flex justify-content-between text-center fw-semibold">
				<p class="m-0">
					Silakan berikan aduan, kritik, atau saran Anda di sini untuk meningkatkan kualitas layanan kami.
				</p>
			</div>

			<div class="modal-body d-flex justify-content-evenly px-0">

				<a href="{{ route('umum.skm.index') }}">
					<button class="btn bg-blue rounded-2 py-2 px-4 fw-bold fs-md text-white">
						SKM
					</button>
				</a>

				<a href="{{ url('https://www.lapor.go.id/') }}">
					<button class="btn bg-blue rounded-2 py-2 px-4 fw-bold fs-md text-white">
						LAPOR!
					</button>
				</a>

				<a
					href="{{ url('https://e-kianpuas.samarindakota.go.id/survei/form/dinas-pekerjaan-umum-dan-penataan-ruang/39ba9d60-d13d-4bce-ae9e-a54316bed169') }}">
					<button class="btn bg-blue rounded-2 py-2 px-4 fs-md fw-bold text-white">
						E-KianPuas
					</button>
				</a>
			</div>
		</div>
	</div>
</div>

{{-- Media Sosial --}}
<div class="modal fade" id="d" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content rounded-3 border-0">
			<div class="modal-body d-flex justify-content-between bg-blue text-white rounded-top-3 border-0">
				<div class="d-flex">
					<lottie-player style="height: 100px;"
						src="https://lottie.host/7fc5c4a3-cad9-414a-8bc5-e097ed4ca67c/zGiBmsHxZj.json" background="transparent"
						speed="1" loop autoplay></lottie-player>
					<h5 class="card-title d-flex align-items-center">Media Sosial</h5>
				</div>
				<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<div class="modal-body d-flex justify-content-between text-center fw-semibold">
				<p class="m-0">
					Temukan kami di platform media sosial favorit Anda dan ikuti kami untuk mendapatkan informasi terbaru.
				</p>
			</div>

			<div class="modal-body d-flex justify-content-evenly px-0">

				<a href="{{ url('https://www.instagram.com/dpuprkotasamarinda/') }}">
					<button class="btn bg-blue rounded-2 py-2 px-4 fw-bold fs-md text-white">
						Instagram
					</button>
				</a>

				<a href="{{ url('https://www.facebook.com/dpuprkotasamarinda') }}" style="height: 42px">
					<button class="btn bg-blue rounded-2 py-2 px-4 fw-bold fs-md text-white">
						Facebook
					</button>
				</a>

				<a href="{{ url('https://www.youtube.com/@dinaspuprkotasamarinda') }}" style="height: 42px">
					<button class="btn bg-blue rounded-2 py-2 px-4 fs-md fw-bold text-white">
						YouTube
					</button>
				</a>
			</div>
		</div>
	</div>
</div>

@endsection

<style>
	.hexagon {
		height: 0;
		width: 300px;
		border-top: 45px solid var(--blue);
		border-right: 20px solid transparent;
		border-left: 20px solid transparent;
		position: relative;
		display: flex;
		align-items: center;
		justify-content: center;
		color: white;
		text-decoration: none;
	}

	.hexagon:before {
		position: absolute;
		content: '';
		height: 0;
		width: 300px;
		border-bottom: 45px solid var(--blue);
		border-right: 20px solid transparent;
		border-left: 20px solid transparent;
		bottom: 45px;
		Left: -20px;
	}

	.hexagon-text {
		position: absolute;
		bottom: 11.25px;
		left: 50%;
		transform: translate(-50%, -50%);
		color: var(--yellow);
		text-decoration: none;
		font-size: 24px;
		white-space: nowrap;
	}

	.bg-img {
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		z-index: -1;
		opacity: 0.5;
	}
</style>