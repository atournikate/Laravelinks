<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lavelinks</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header class="header">

        <nav>
            <ul class="navLinks">
                <li>
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('posts') }}">Post</a>
                </li>
            </ul>

            <ul class="account">
                @auth
                <li>
                    <a href="{{ route('dashboard') }}">{{ auth()->user()->username }}</a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="btn-log">Logout</button>
                    </form>
                    
                </li>
                @endauth

                @guest
                <li>
                    <a href="{{ route('login') }}">Login</a>
                </li>
                <li>
                    <a href="{{ route('register') }}">Register</a>
                </li>
                @endguest
                
            </ul>
        </nav>
    </header>
    
    @yield('content')
    

    <footer class="footer">
        <img src="{{ asset('images/STZH_SEB_Logo.png') }}" alt="">
        <img src="{{ asset('images/SAG_Logo_De.png') }}" alt="">
        <img src="{{ asset('images/Opportunity.png') }}" alt="">

    </footer>
</body>
</html>