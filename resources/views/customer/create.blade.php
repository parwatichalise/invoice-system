@extends('layouts.app')

@section('content')
    <div class="container py-6 mx-auto">
        <h1 class="mb-4 text-2xl font-bold">Create Customer Category</h1>

        <form action="{{ route('customers.create') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700">SL.:</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700">Category Name:</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700">Address:</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700">Phone:</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700">Email:</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700">VAT No:</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700">Status:</label>
                <input type="number" id="number" class="w-full px-4 py-2 border rounded"></textarea>
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700">PAN No:</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700">Country:</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700">Balance:</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 border rounded" required>
            </div>

            <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                Create
            </button>
        </form>
    </div>
@endsection
