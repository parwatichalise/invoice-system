<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Supplier</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="p-8 bg-gray-100">

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

<!-- Add Supplier Form -->
<div class="max-w-4xl p-8 mx-auto mt-4 bg-white rounded-lg shadow-lg">
    <h2 class="mb-6 text-2xl font-semibold">Add Supplier</h2>

    <!-- Form -->
    <form action="{{ route('supplier.store') }}" method="POST">
        @csrf <!-- Token for Laravel form security -->

        <div class="grid grid-cols-2 gap-6">
            <!-- Left Column -->
            <div>
                <label class="block mb-2 font-semibold" for="supplierName">Supplier Name *</label>
                <input type="text" id="supplierName" name="name" class="w-full p-2 border rounded-lg" placeholder="Supplier Name" required>

                <label class="block mt-4 mb-2 font-semibold" for="email">Email Address</label>
                <input type="email" id="email" name="email" class="w-full p-2 border rounded-lg" placeholder="Email">

                <label class="block mt-4 mb-2 font-semibold" for="phone">Phone</label>
                <input type="tel" id="phone" name="phone" class="w-full p-2 border rounded-lg" placeholder="Phone">

                <label class="block mt-4 mb-2 font-semibold" for="address1">Address1</label>
                <input type="text" id="address1" name="address1" class="w-full p-2 border rounded-lg" placeholder="Address1">

                <label class="block mt-4 mb-2 font-semibold" for="ward_no">Ward No.</label>
                <input type="tel" id="ward_no" name="ward_no" class="w-full p-2 border rounded-lg" placeholder="Ward No.">
            </div>

            <!-- Right Column -->
            <div>
                <label class="block mb-2 font-semibold" for="mobileNo">Mobile No</label>
                <input type="tel" id="mobileNo" name="mobile_no" class="w-full p-2 border rounded-lg" placeholder="Mobile No">

                <label class="block mt-4 mb-2 font-semibold" for="panNo">PAN No</label>
                <input type="tel" id="panNo" name="pan_no" class="w-full p-2 border rounded-lg" placeholder="PAN NO">

                <label class="block mt-4 mb-2 font-semibold" for="address2">Address2</label>
                <input type="text" id="address2" name="address2" class="w-full p-2 border rounded-lg" placeholder="Address2">

                <label class="block mt-4 mb-2 font-semibold" for="city">City</label>
                <input type="text" id="city" name="city" class="w-full p-2 border rounded-lg" placeholder="City">

                <label class="block mt-4 mb-2 font-semibold" for="state">State</label>
                <input type="text" id="state" name="state" class="w-full p-2 border rounded-lg" placeholder="State">
            </div>
        </div>

        <div class="flex justify-end mt-6">
            <button type="submit" class="px-4 py-2 text-white bg-purple-500 rounded">Save</button>
        </div>
    </form>
</div>
</body>
</html>
