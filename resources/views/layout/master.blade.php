<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/NavbarStyle.css') }}"/>
</head>
<nav>
    <div class="navbar-brand">
        <a href="/" style="text-decoration: none">
            <h2 style="color: black">Game<span style="color: red">SLot</span></h2>
        </a>
    </div>
    <div class="navbar-content">
        @auth
            @if (Auth::User()->role->name == 'Admin')
                <div class="navbar-menu-container">
                    <a href="/manageGame" class="navbar-menu admin-menu">Manage Game</a>
                    <a href="/manageGameGenre" class="navbar-menu admin-menu">Manage Game Genre</a>
                </div>
            @endif
        @endauth
        <form class="searchbar" action="/searchGame" method="POST">
            @csrf
            <input class="searchfield" type="text" placeholder="Search" name="search">
            <button class="searchsubmit"type="submit">Search</button>
        </form>
        @auth
            <div class="navbar_menu_container right">
                <a href="/cart" class="sign">Cart</a>
                <a href="/profile" class="sign">Profile</a>
                <a href="/transactionheader" class="sign">Transaction</a>
                <a href="/signOut" class="sign">Sign Out</a>
            </div>
        @else
            <div class="navbar_menu_container right">
                <a href="/signIn" class="sign">Sign In</a>
                <a href="/signUp" class="sign">Sign Up</a>
            </div>
        @endauth
    </div>
</nav>
<body>
    @yield('content')
</body>
<footer>
    <div class="footer">
        <p>&copy; 2021 SL, Inc. All rights reserved.</p>
    </div>
</footer>
</html>
