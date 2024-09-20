<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice Form</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex flex-col min-h-screen">
        <header class="py-4 text-white bg-purple-500 shadow-md">
            <div class="container flex items-center justify-between mx-auto">
                <h1 class="text-2xl font-bold">Invoice System</h1>
            </div>
        </header>
        
        <main class="container flex-1 mx-auto mt-10">
            @yield('content')
        </main>

        <footer class="py-4 text-center text-white bg-gray-800">
            <p>&copy; 2024 Invoice System</p>
        </footer>
    </div>
</body>
</html>
