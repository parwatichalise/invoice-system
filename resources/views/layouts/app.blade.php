<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer Form</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <header class="bg-purple-500 text-white py-4 shadow-md">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-2xl font-bold">Invoice System</h1>
            </div>
        </header>
        
        <main class="flex-1 container mx-auto mt-10">
            @yield('content')
        </main>

        <footer class="bg-gray-800 text-white py-4 text-center">
            <p>&copy; 2024 Invoice System</p>
        </footer>
    </div>
</body>
</html>
