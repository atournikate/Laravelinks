@extends('layouts.app')

@section('content')
    <div class="container" >
        <div class="item registry">
            @if (session('status'))

            <div class="alert">
                {{ session('status') }}
            </div>
            
            @endif


           <form action="{{ route('login') }}" method="post">
               @csrf
               

                <div class="formField">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" class="@error ('email') box @enderror" name="email" id="email" placeholder="Your email" value="{{ old('email') }}">
                    @error('email')
                        <div class="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="formField">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" class="@error ('password') box @enderror" name="password" id="password" placeholder="Your password" value="">
                    @error('password')
                        <div class="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <div class="remember">
                        <input class="checkbox" type="checkbox" name="remember" id="remember">
                        <label for="remember">Remember me</label>
                    </div>
                </div>

                <button class="btn" type="submit" name="Register">
                    Login
                </button>


           </form>
        </div>

    </div>
@endsection