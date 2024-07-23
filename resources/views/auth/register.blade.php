@extends('layouts.auth')

@section('container')

    <div class="row justify-content-center">
        <div class="col-lg-4">
            <main class="m-auto">
                
                <form class="needs-validation" method="POST" action="{{ route('register') }}" novalidate>
                    @csrf
            
                    <h2 class="mb-4">Register</h2>

                    <!-- Name -->
                    <div class="mt-2">
                        <label for="name">Name</label>

                        <input id="name" class="block form-control mt-2 @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" required/>

                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }} 
                            </div>
                        @enderror
                    </div>

                    <!-- Userame -->
                    <div class="mt-2">
                        <label for="username">Username</label>

                        <input id="username" class="block form-control mt-2 @error('username') is-invalid @enderror" type="text" name="username" value="{{ old('username') }}" required/>
                        
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }} 
                            </div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mt-2">
                        <label for="password">Password</label>

                        <input id="password" class="block form-control mt-2 @error('password') is-invalid @enderror" type="password" name="password" required/>
                        
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }} 
                            </div>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-2">
                        <label for="password_confirmation">Comfirm Password</label>

                        <input id="password_confirmation" class="block form-control mt-2" type="password" name="password_confirmation" required/>
                    </div>

                    <!-- Submit button -->
                    <button class="btn btn-primary w-100 py-2 mt-3" type="submit">
                        Register
                    </button>

                    <!-- Log in button -->
                    <p class="mt-3 text-center">
                        Already registered? <a href="/login"> Log in here!</a>
                    </p>
                </form>

            </main>
        </div>
    </div>
@endsection