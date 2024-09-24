@extends('layouts.app')

@section('content')
<div class="container p-4 mx-auto">
    <div class="p-6 bg-white rounded shadow-md">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-xl font-bold">Add Purchase</h1>
        </div>

        <form action="{{ route('purchase.store') }}" method="POST">
            @csrf
            <!-- Supplier and Chalan No Section -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="supplier" class="block text-sm font-medium">Supplier</label>
                    <select name="supplier" id="supplier" class="w-full border-gray-300 rounded">
                        <!-- Assuming you fetch suppliers here -->
                        <option selected disabled>Select One</option>
                        <!-- Populate suppliers dynamically -->
                        @foreach (App\Models\Supplier:: all() as $supplier )
                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                        @endforeach

                    </select>
                </div>
                <div>
                    <label for="chalan_no" class="block text-sm font-medium">Chalan No</label>
                    <input type="text" id="chalan_no" name="chalan_no" class="w-full border-gray-300 rounded">
                </div>
            </div>

            <!-- Product Information Section -->
            <div class="mt-4">
                <label for="product" class="block text-sm font-medium">Product Information</label>
                <div class="grid grid-cols-8 gap-4">
                    <input type="text" name="product_name" placeholder="Product Name" class="col-span-2 border-gray-300 rounded">
                    <input type="number" name="stock" placeholder="Stock/Qnt" class="col-span-1 border-gray-300 rounded">
                    <input type="date" name="expiry_date" placeholder="Expiry Date" class="col-span-1 border-gray-300 rounded">
                    <input type="text" name="batch_no" placeholder="Batch No" class="col-span-1 border-gray-300 rounded">
                    <input type="number" name="quantity" placeholder="Qnty" class="col-span-1 border-gray-300 rounded">
                    <input type="text" name="rate" placeholder="Rate" class="col-span-1 border-gray-300 rounded">
                
                </div>
            </div>

            <!-- Purchase Summary -->
            <div class="grid grid-cols-3 gap-4 mt-4">
                <div>
                    <label for="vat" class="block text-sm font-medium">VAT</label>
                    <input type="text" id="vat" name="vat" class="w-full border-gray-300 rounded">
                </div>
                <div>
                    <label for="discount" class="block text-sm font-medium">Purchase Discount</label>
                    <input type="text" id="discount" name="discount" class="w-full border-gray-300 rounded">
                </div>
                <div>
                    <label for="total" class="block text-sm font-medium">Grand Total</label>
                    <input type="text" id="total" name="total" class="w-full border-gray-300 rounded">
                </div>
            </div>

            <!-- Payment Method -->
            <div class="mt-4">
                <label for="payment_type" class="block text-sm font-medium">Payment Type</label>
                <select name="payment_type" id="payment_type" class="w-full border-gray-300 rounded">
                    <option value="cash">Cash</option>
                    <option value="credit">Credit</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="mt-4">
                <button type="submit" class="px-4 py-2 font-bold text-white rounded hover:bg-pink-300">Submit</button>
       </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('#stockTable').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });
    });
</script>
@endsection
