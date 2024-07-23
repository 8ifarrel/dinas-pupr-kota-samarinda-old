@extends('epanel.layouts.auth')

@section('container')

<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card p-5 border border-0 shadow" style="width: 85%">

        @if (session()->has('login-error'))
        <div class="container-fluid">
            <div class="d-flex justify-content-center position-absolute align-items-center w-75">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('login-error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
        @endif

        <div class="d-flex flex-row ">
            {{-- Login --}}
            <main class="me-5" style="width: 45%">
                <div class="">
                    <div class="d-flex justify-content-center mb-3">
                        <a class="pe-2" href="{{ url('https://samarindakota.go.id/') }}">
                            <img src="{{ asset('logo/pemerintah/kota-samarinda.png') }}" alt="kota-samarinda"
                                style="width: 54px">
                        </a>
                        <a class="pe-2" href="{{ url('/') }}">
                            <img src="{{ asset('logo/pemerintah/dpupr-kota-samarinda.png') }}"
                                alt="dpupr-kota-samarinda" style="height: 54px">
                        </a>
                    </div>

                    <div class="d-flex justify-content-center">
                        <h3 class="fw-bold text-blue">Hai, Administrator!</h3>
                    </div>
                </div>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form class="needs-validation" method="POST" action="{{ route('login') }}" novalidate>
                    @csrf

                    <!-- Username -->
                    <div class="mt-3">
                        <label for="username" class="fw-semibold">Username</label>

                        <input id="username" class="block form-control mt-2 @error('username') is-invalid @enderror"
                            type="username" name="username" value="{{ old('username') }}" required />

                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <div class="d-flex justify-content-between">
                            <label for="password" class="fw-semibold">Password</label>
                        </div>

                        <!-- Password -->
                        <input id="password" class="block form-control mt-2 @error('password') is-invalid @enderror"
                            type="password" name="password" required />

                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between mt-3">
                        <!-- Remember me -->
                        <div class="form-check">
                            <label for="remember_me">
                                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                                <span class="form-check-label">{{ __('Ingatkan saya') }}</span>
                            </label>
                        </div>

                        <div class="">
                            <!-- Submit button -->
                            <button class="btn text-white bg-blue py-2 px-4 fw-bold" type="submit">
                                LOG IN
                            </button>
                        </div>
                    </div>
                </form>
            </main>

            {{-- Foto Jembatan --}}
            <div class="d-flex justify-content-center align-items-center">
                <div class="">
                    <img src="{{ asset('img/login.jpg') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection