@extends('layouts.app')

@section('content')
    <div class="container" >
        <div class="item registry">
           <form action="{{ route('register') }}" method="post">
               @csrf
                <div class="formField">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" class="@error ('name') box @enderror" 
                    name="name" id="name" placeholder="Your name" 
                    value="{{ old('name') }}">
                    @error('name')
                        <div class="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="formField">
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" class="@error ('username') box @enderror" 
                    name="username" id="username" placeholder="Your username" 
                    value="{{ old('username') }}">
                    @error('username')
                        <div class="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="formField">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" class="@error ('email') box @enderror" 
                    name="email" id="email" placeholder="Your email" 
                    value="{{ old('email') }}">
                    @error('email')
                        <div class="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="formField">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" class="@error ('password') box @enderror" 
                    name="password" id="password" placeholder="Your password" 
                    value="">
                    @error('password')
                        <div class="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="formField">
                    <label for="password_confirmation" class="sr-only">Confirm Password</label>
                    <input type="password" class="@error ('password_confirmation') box @enderror" name="password_confirmation" 
                    id="password_confirmation" placeholder="Re-enter password" 
                    value="">
                    @error('password_confirmation')
                        <div class="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button class="btn" type="submit" name="Register">
                    Register
                </button>


           </form>
        </div>

    </div>
@endsection