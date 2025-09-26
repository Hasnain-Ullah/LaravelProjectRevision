<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Simple Layout')</title>   {{-- This is the area where dynamically title come --}}
                                                        {{-- the second parameter name is default value of title --}}
    <style>                                                 
        /* --- Basic CSS --- */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f4f4;
        }
        header {
            background: #333;
            color: #fff;
            padding: 1rem;
            text-align: center;
        }
        nav {
            background: black;
            color: #fff;
            padding: 0.5rem;
            text-align: center;
        }
        nav a {
            color: #fff;
            margin: 0 1rem;
            text-decoration: none;
        }
        .container {
            display: flex;
            min-height: calc(85vh - 120px); /* Adjust height minus header/footer */
        }
        aside {
            width: 200px;
            background: lightgray;
            padding: 1rem;
        }
        main {
            flex: 1;
            background: #fff;
            padding: 1rem;
        }
        footer {
            background: #333;
            color: #fff;
            text-align: center;
            padding: 1rem;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header>
        <h1>My Website Header</h1>
    </header>

    <!-- Top Menu -->
    <nav>
        <a href="/layout/home">Home</a>
        <a href="/layout/about">About</a>
        <a href="/layout/contact">Contact</a>
    </nav>

    <!-- Body -->
    <div class="container">
        <!-- Sidebar -->
        <aside>
            <ul>
                <li><a href="/layout/home">Home</a></li>
                <li><a href="/layout/about">About</a></li>
                <li><a href="/layout/contact">Contact</a></li>
            </ul>
        </aside>

        <!-- Dynamic Content Area -->
        <main>
            @hasSection ('content')    {{-- Check if the section 'content' is defined in child views --}}
                                            {{-- This is basically a condition that check the value of yield --}}
                @yield('content')     {{-- This is where child views will inject their content --}}
            @else
                <h2>No Contents Found</h2>
            @endif
            {{-- @yield('content')     This is where child views will inject their content --}}
        </main>
    </div>

    <!-- Footer -->
    <footer>
        &copy; {{ date('Y') }} My Website. All rights reserved.
    </footer>

</body>
</html>
