@extends('layouts.app')

@section('content')
<style>
    .container{
       background-color: #F1DFD3
    }
   button[type="submit"]{
       background-color: #e2a8be;

   }
</style>
<div class="container py-6 mx-auto">
    <h1 class="mb-4 text-2xl font-bold">Edit Purchase</h1>

    <form action="{{ route('purchase.update', $purchase->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="supplier" class="block text-sm font-medium">Supplier</label>
                <select name="supplier" id="supplier" value="{{ old('supplier', $purchase->supplier) }}" class="w-full border-gray-300 rounded">
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
                <input type="text" id="chalan_no" name="chalan_no" value="{{ old('chalan_no', $purchase->chalan_no) }}" class="w-full border-gray-300 rounded">
            </div>
        </div>

        <!-- Product Information Section -->
        <div class="mt-4">
            <label for="product" class="block text-sm font-medium">Product Information</label>
            <div class="grid grid-cols-8 gap-4">
                <input type="text" name="product_name" placeholder="Product Name" value="{{ old('product_name', $purchase->product_name) }}"class="col-span-2 border-gray-300 rounded">
                <input type="number" name="stock" placeholder="Stock/Qnt" value="{{ old('stock', $purchase->stock) }}"class="col-span-1 border-gray-300 rounded">
                <input type="date" name="expiry_date" placeholder="Expiry Date" value="{{ old('expiry_date', $purchase->expiry_date) }}"class="col-span-1 border-gray-300 rounded">
                <input type="text" name="batch_no" placeholder="Batch No" value="{{ old('batch_no', $purchase->batch_no) }}"class="col-span-1 border-gray-300 rounded">
                <input type="number" name="quantity" placeholder="Qnty" value="{{ old('quantity', $purchase->quantity) }}"class="col-span-1 border-gray-300 rounded">
                <input type="text" name="rate" placeholder="Rate" value="{{ old('rate', $purchase->rate) }}"class="col-span-1 border-gray-300 rounded">
            
            </div>
        </div>

        <!-- Purchase Summary -->
        <div class="grid grid-cols-3 gap-4 mt-4">
            <div>
                <label for="vat" class="block text-sm font-medium">VAT</label>
                <input type="text" id="vat" name="vat" value="{{ old('vat', $purchase->vat) }}"class="w-full border-gray-300 rounded">
            </div>
            <div>
                <label for="discount" class="block text-sm font-medium">Purchase Discount</label>
                <input type="text" id="discount" name="discount" value="{{ old('discount', $purchase->discount) }}"class="w-full border-gray-300 rounded">
            </div>
            <div>
                <label for="total" class="block text-sm font-medium">Grand Total</label>
                <input type="text" id="total" name="total" value="{{ old('total', $purchase->total) }}"class="w-full border-gray-300 rounded">
            </div>
        </div>

        <!-- Payment Method -->
        <div class="mt-4">
            <label for="payment_type" value="{{ old('payment_table', $purchase->payment_table) }}"class="block text-sm font-medium">Payment Type</label>
            <select name="payment_type" id="payment_type" class="w-full border-gray-300 rounded">
                <option value="cash">Cash</option>
                <option value="credit">Credit</option>
            </select>
        </div>

        <!-- Submit Button -->
        <div class="mt-4">
            <button type="submit" class="px-4 py-2 font-bold text-white bg-pink-400 rounded hover:bg-pink-600">Submit</button>
        </div>
    </form>
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
