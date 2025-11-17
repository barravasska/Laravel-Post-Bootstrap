<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel CRUD Learning</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-gray-100 font-sans antialiased"> <div class="container mx-auto px-4 py-8">

        <header class="mb-8">
            <h1 class="text-3xl font-bold text-center text-gray-900">
                Laravel CRUD Learning
            </h1>
            <p class="text-center text-gray-500">
                A simple CRUD application for learning Laravel environment
            </p>
        </header>

        <main>
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-md relative mt-4" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </main>

        <footer class="mt-12 py-4 border-t border-gray-200">
            <div class="text-center text-gray-500">
                <p>Laravel CRUD Learning Application - For Educational Purposes</p>
            </div>
        </footer>

    </div>

    </body>
</html>