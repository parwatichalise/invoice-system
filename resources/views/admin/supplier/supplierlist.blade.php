<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<!-- Top Section -->
<div class="max-w-4xl p-4 mx-auto bg-white rounded-lg shadow-lg">
    <div class="flex items-center">
        <!-- Left Section: Grid icon -->
        <i class="mr-4 text-2xl text-gray-400 fas fa-bars"></i>

        <!-- Middle Section: Sale and Purchase buttons (uses flex-grow) -->
        <div class="flex flex-grow space-x-4">
            <button class="flex items-center px-6 py-2 space-x-2 text-purple-500 border-2 border-purple-500 rounded">
                <i class="fas fa-cash-register"></i> <!-- Sale icon -->
                <span>Sale</span>
            </button>
            <button class="flex items-center px-6 py-2 space-x-2 text-purple-500 border-2 border-purple-500 rounded">
                <i class="fas fa-shopping-cart"></i> <!-- Purchase icon -->
                <span>Purchase</span>
            </button>
        </div>

        <!-- Right Section: Warning and Settings icons -->
        <div class="flex ml-auto space-x-4">
            <i class="text-2xl text-red-500 fas fa-exclamation-triangle"></i> <!-- Warning icon -->
            <i class="text-2xl text-gray-500 fas fa-cog"></i> <!-- Settings icon -->
        </div>
    </div>
</div>

<!-- Breadcrumb Section -->
<div class="max-w-4xl px-4 py-2 mx-auto mt-2 bg-white rounded-lg shadow-lg">
    <div class="text-sm text-gray-500">
        <a href="#" class="hover:underline"><i class="fas fa-home"></i> Home</a>
        <span>/</span>
        <a href="#" class="hover:underline">Supplier</a>
        <span>/</span>
        <span class="font-bold">Add Supplier</span>
    </div>
</div>

<!-- Supplier List Section -->
<div class="max-w-6xl mx-auto mt-6">
    <h2 class="mb-4 text-2xl font-semibold">Supplier List</h2>

    <!-- Display success message -->
    @if(session('success'))
        <div class="p-4 mb-4 text-white bg-green-500 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 border">Supplier Name</th>
                    <th class="px-4 py-2 border">Email</th>
                    <th class="px-4 py-2 border">Phone</th>
                    <th class="px-4 py-2 border">Mobile No</th>
                    <th class="px-4 py-2 border">PAN No</th>
                    <th class="px-4 py-2 border">Address1</th>
                    <th class="px-4 py-2 border">Address2</th>
                    <th class="px-4 py-2 border">City</th>
                    <th class="px-4 py-2 border">State</th>
                    <th class="px-4 py-2 border">Ward No.</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($suppliers as $supplier)
                    <tr>
                        <!-- Conditionally show the supplier info or the edit form -->
                        @if(request()->get('edit') == $supplier->id)
                        <!-- Inline Edit Form -->
                        <form action="{{ route('supplier.update', $supplier->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <td class="px-4 py-2 border">
                                <input type="text" name="name" value="{{ $supplier->name }}" class="w-full p-2 border" required>
                            </td>
                            <td class="px-4 py-2 border">
                                <input type="email" name="email" value="{{ $supplier->email }}" class="w-full p-2 border">
                            </td>
                            <td class="px-4 py-2 border">
                                <input type="text" name="phone" value="{{ $supplier->phone }}" class="w-full p-2 border">
                            </td>
                            <td class="px-4 py-2 border">
                                <input type="text" name="mobile_no" value="{{ $supplier->mobile_no }}" class="w-full p-2 border">
                            </td>
                            <td class="px-4 py-2 border">
                                <input type="text" name="pan_no" value="{{ $supplier->pan_no }}" class="w-full p-2 border">
                            </td>
                            <td class="px-4 py-2 border">
                                <input type="text" name="address1" value="{{ $supplier->address1 }}" class="w-full p-2 border">
                            </td>
                            <td class="px-4 py-2 border">
                                <input type="text" name="address2" value="{{ $supplier->address2 }}" class="w-full p-2 border">
                            </td>
                            <td class="px-4 py-2 border">
                                <input type="text" name="city" value="{{ $supplier->city }}" class="w-full p-2 border">
                            </td>
                            <td class="px-4 py-2 border">
                                <input type="text" name="state" value="{{ $supplier->state }}" class="w-full p-2 border">
                            </td>
                            <td class="px-4 py-2 border">
                                <input type="text" name="ward_no" value="{{ $supplier->ward_no }}" class="w-full p-2 border">
                            </td>
                            <td class="px-6 py-4 border-b border-gray-300">
                                <button type="submit" class="px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600">Save</button>
                                <a href="{{ route('supplier.index') }}" class="px-4 py-2 text-white bg-gray-500 rounded hover:bg-gray-600">Cancel</a>
                            </td>
                        </form>
                        @else
                        <!-- Display Supplier Information -->
                        <td class="px-4 py-2 border">{{ $supplier->name }}</td>
                        <td class="px-4 py-2 border">{{ $supplier->email }}</td>
                        <td class="px-4 py-2 border">{{ $supplier->phone }}</td>
                        <td class="px-4 py-2 border">{{ $supplier->mobile_no }}</td>
                        <td class="px-4 py-2 border">{{ $supplier->pan_no }}</td>
                        <td class="px-4 py-2 border">{{ $supplier->address1 }}</td>
                        <td class="px-4 py-2 border">{{ $supplier->address2 }}</td>
                        <td class="px-4 py-2 border">{{ $supplier->city }}</td>
                        <td class="px-4 py-2 border">{{ $supplier->state }}</td>
                        <td class="px-4 py-2 border">{{ $supplier->ward_no }}</td>

                        <!-- Edit and Delete Buttons -->
                        <td class="px-6 py-4 border-b border-gray-300">
                            <div class="flex space-x-2">
                                <!-- Edit Button -->
                                <a href="{{ route('supplier.index', ['edit' => $supplier->id]) }}" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">
                                    Edit
                                </a>

                                <!-- Delete Button -->
                                <form action="{{ route('supplier.destroy', $supplier->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this supplier?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 text-white bg-red-500 rounded hover:bg-red-600">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
