<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/js/app.js'])
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background: #3b3d43;
        }

        button {
            border: 0;
            padding: 0;
            font-family: inherit;
            background: transparent;
            color: inherit;
            cursor: pointer;
        }

        .navbar {
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 64px;
            background: #19191c;
            color: #f9f9f9;
            font-family: "Poppins";
            box-sizing: border-box;
        }

        @media only screen and (min-width: 600px) {
            .navbar {
                justify-content: space-between;
                padding: 0 0 0 16px;
            }
        }

        .navbar-overlay {
            position: fixed;
            z-index: 2;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            visibility: hidden;
            opacity: 0;
            transition: 0.3s;
        }

        body.open .navbar-overlay {
            visibility: visible;
            opacity: 1;
        }

        @media only screen and (min-width: 600px) {
            .navbar-overlay {
                display: none;
            }
        }

        .navbar-burger {
            position: absolute;
            top: 0;
            left: 0;
            display: grid;
            place-items: center;
            width: 64px;
            height: 64px;
            padding: 0px;
        }

        @media only screen and (min-width: 600px) {
            .navbar-burger {
                display: none;
            }

        }

        .navbar-title {
            margin: 0px;
            fonte: 30px;
            -siz
        }

        @media screen and (min-width: 427px) {
            .navbar-title {
                margin-left: 60px;
                fonte: 30px;
                -siz
            }



        }

        @media screen and (min-width: 321px) {
            .navbar-title {
                margin-left: 40px;
                fonte: 30px;
            }
        }

        .navbar-menu {
            position: fixed;
            z-index: 3;
            top: 0;
            left: 0;
            translate: -100% 0;
            width: 60vw;
            height: 100%;
            padding: 8px;
            display: flex;
            gap: 8px;
            flex-direction: column;
            align-items: flex-start;
            background: #000000;
            visibility: hidden;
            transition: translate 0.3s;
        }

        body.open .navbar-menu {
            translate: 0 0;
            visibility: visible;
        }

        @media only screen and (min-width: 600px) {
            .navbar-menu {
                position: static;
                translate: 0 0;
                width: auto;
                background: transparent;
                flex-direction: row;
                visibility: visible;
            }
        }


        .navbar-menu>button {
            color: #3a7250cb;
            background: transparent;
            padding: 0 8px;
        }

        .navbar-menu>button:hover {
            color: #14ff72cb;
            background: transparent;
            padding: 0 8px;
        }

        .navbar-menu>button.active {
            color: inherit;
        }

        /* +++++++++++++ */
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap");

        /* * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        } */

        /* body {
            display: flex;
            background: #333;
            justify-content: flex-end;
            align-items: flex-end;
            min-height: 100vh;
        } */

        .footer {
            position: relative;
            width: 100%;
            background: #000;
            min-height: 100px;
            padding: 20px 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin-top: 12vh;
        }

        .social-icon,
        .menu {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 10px 0;
            flex-wrap: wrap;
        }

        .social-icon__item,
        .menu__item {
            list-style: none;
        }

        .social-icon__link {
            font-size: 2rem;
            color: #fff;
            margin: 0 10px;
            display: inline-block;
            transition: 0.5s;
        }

        .social-icon__link:hover {
            transform: translateY(-10px);
        }

        .menu__link {
            font-size: 1.2rem;
            color: #fff;
            margin: 0 10px;
            display: inline-block;
            transition: 0.5s;
            text-decoration: none;
            opacity: 0.75;
            font-weight: 300;
        }

        .menu__link:hover {
            opacity: 1;
        }

        .footer p {
            color: #fff;
            margin: 15px 0 10px 0;
            font-size: 1rem;
            font-weight: 300;
        }

        .wave {
            position: absolute;
            top: -95px;
            left: 0;
            width: 100%;
            height: 100px;
            background: url("./image/wave.svg"); 
            background-size: 900px 100px;
        }

        .wave#wave1 {
            z-index: 1000;
            opacity: 1;
            bottom: 0;
            animation: animateWaves 4s linear infinite;
        }

        .wave#wave2 {
            z-index: 999;
            opacity: 0.5;
            bottom: 10px;
            animation: animate 4s linear infinite !important;
        }

        .wave#wave3 {
            z-index: 1000;
            opacity: 0.2;
            bottom: 15px;
            animation: animateWaves 3s linear infinite;
        }

        .wave#wave4 {
            z-index: 999;
            opacity: 0.7;
            bottom: 20px;
            animation: animate 3s linear infinite;
        }

        @keyframes animateWaves {
            0% {
                background-position-x: 1000px;
            }

            100% {
                background-positon-x: 0px;
            }
        }

        @keyframes animate {
            0% {
                background-position-x: -1000px;
            }

            100% {
                background-positon-x: 0px;
            }
        }
    </style>
</head>

<body class="bg-gray-100">
    <header class="">
        {{-- <h1>logo</h1> --}}

        <nav class="navbar flex items-center px-4">
            <div class="navbar-overlay" onclick="toggleMenuOpen()"></div>

            <button type="button" class="navbar-burger" onclick="toggleMenuOpen()">
                <span class="material-icons"><i class="fa-solid fa-bars text-2xl"></i></span>
            </button>
            <h1 class="navbar-title text-2xl">logo</h1>
            <nav class="navbar-menu">
                <a class="lg:px-3" href="{{ route('allevents.index') }}">
                    <button type="button" class="text-xl">events</button>
                </a>
                <a class="lg:px-3" href="{{ route('Concerts_Festival.index') }}">
                    <button type="button" class="text-xl">Concerts & Festival</button>
                </a>
                <a class="lg:px-3" href="{{ route('Conference.index') }}">
                    <button type="button" class="text-xl">Conference</button>
                </a>
                <a class="lg:px-3" href="{{ route('Spor.index') }}">
                    <button type="button" class="text-xl">Théâtre & Humour</button>
                </a>
                <a class="lg:px-3" href="{{ route('Théâtre_Humour.index') }}">
                    <button type="button" class="text-xl">Sport</button>
                </a>
            </nav>
            <div class="flex gap-x-6 items-center">
                <i class="fa-solid fa-bag-shopping text-3xl"></i>
                <div>
                    @if (Route::has('login'))
                        @auth
                            <a class="text-decoration-none" href="{{ url('/profile') }}"
                                class="rounded-md text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                <i class="fa-solid fa-user text-3xl text-white"></i>
                            </a>
                        @else
                            <a class="text-decoration-none" href="{{ route('login') }}"
                                class="rounded-md text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a class="text-decoration-none" href="{{ route('register') }}"
                                    class="rounded-md text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                    Register
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </nav>
        {{--         
            <nav class="flex gap-x-4 " >
                <a class="text-decoration-none text-2xl text-black" href="#">Home</a>
                <a class="text-decoration-none text-2xl text-black" href="#">Home</a>
                <a class="text-decoration-none text-2xl text-black" href="#">Home</a>
                <a class="text-decoration-none text-2xl text-black" href="#">Home</a>
            </nav> --}}
    </header>
    <main>
        @yield('content')
    </main>

    <html>

    <body>
        <footer class="footer">
            <div class="waves">
                <div class="wave" id="wave1"></div>
                <div class="wave" id="wave2"></div>
                <div class="wave" id="wave3"></div>
                <div class="wave" id="wave4"></div>
            </div>
            <ul class="social-icon">
                <li class="social-icon__item"><a class="social-icon__link" href="#">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a></li>
                <li class="social-icon__item"><a class="social-icon__link" href="#">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a></li>
                <li class="social-icon__item"><a class="social-icon__link" href="#">
                        <ion-icon name="logo-linkedin"></ion-icon>
                    </a></li>
                <li class="social-icon__item"><a class="social-icon__link" href="#">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a></li>
            </ul>
            <ul class="menu">
                <li class="menu__item"><a class="menu__link" href="#">Home</a></li>
                <li class="menu__item"><a class="menu__link" href="#">About</a></li>
                <li class="menu__item"><a class="menu__link" href="#">Services</a></li>
                <li class="menu__item"><a class="menu__link" href="#">Team</a></li>
                <li class="menu__item"><a class="menu__link" href="#">Contact</a></li>

            </ul>
            <p>&copy;2021 Nadine Coelho | All Rights Reserved</p>
        </footer>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>

    </html>

    <script>
        const toggleMenuOpen = () => document.body.classList.toggle("open");
    </script>
</body>


</html>
