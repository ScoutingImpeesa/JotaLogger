<!DOCTYPE HTML>
<html>
    <head>
        <title>JOTA Logger</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="/css/main.css" />
        <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
        <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
        @yield('css')
    </head>
    <body>

        <!-- Wrapper -->
            <div id="wrapper">

                <!-- Main -->
                    <main id="main">
                        <div class="inner">

                            <!-- Headers -->
                                <header id="header">
                                    <a href="{{ url('/') }}" class="logo"><strong>Home</strong></a>
                                </header>
                                
                            <!-- Section -->
                                <section>
                                    <header class="major">
                                        <h2>@yield('header')</h2>
                                    </header>
                                    @yield('content')
                                </section>

                        </div>
                    </main>

                <!-- Sidebar -->
                    <div id="sidebar">
                        <div class="inner">

                            <!-- Menu -->
                                <nav id="menu">
                                    <header class="major">
                                        <h2>Menu</h2>
                                    </header>
                                    <ul>
                                        <li><a href="{{ url('/') }}">Homepage</a></li>
                                        {!! TCG\Voyager\Models\Menu::display('main', 'menu') !!}
                                        @if (Auth::guest())
                                            <li><a href="{{ url('/admin/login') }}">Login</a></li>
                                            <li><a href="{{ url('/register') }}">Register</a></li>
                                        @else
                                            <li><a href="{{ url('/admin') }}">Admin</a></li>
                                            <li>
                                                <a href="{{ url('/admin/logout') }}"
                                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                    Logout
                                                </a>

                                                <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>
                                        @endif
                                    </ul>
                                </nav>

                            <!-- Section -->
                                <section>
                                    <header class="major">
                                        <h2>Get in touch</h2>
                                    </header>
                                </section>

                            <!-- Footer -->
                                <footer id="footer">
                                </footer>

                        </div>
                    </div>

            </div>

        <!-- Scripts -->
            <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
            <script src="/assets/js/skel.min.js"></script>
            <script src="/assets/js/util.js"></script>
            @yield('scripts')
            <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
            <script src="/assets/js/main.js"></script>

    </body>
</html>
