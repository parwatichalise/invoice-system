@extends('layouts.app')

@section('content')
<style>
    .container{
       background-color: #F1DFD3
    }
</style>
<div class="container p-6 mx-auto">
    <div class="p-4 bg-white rounded-md shadow">
        <h1 class="mb-4 text-xl font-bold">Manage Purchases</h1>
        <form action="{{ route('purchase.store') }}" method="POST">
            @csrf
        
        <!-- Add Purchase Button -->
        <a href="{{ route('purchase.create') }}" class="px-4 py-2 mb-4 text-white bg-purple-500 rounded hover:bg-pink-600">
            Add Purchase
        </a>

        @if(session('success'))
            <div class="p-4 mb-4 text-white bg-purple-500 rounded">
                {{ session('success') }}
            </div>
        @endif

        
        <table class="min-w-full bg-white border">
            <thead>
                <tr class="text-sm leading-normal text-gray-600 uppercase bg-gray-200">
                    <th class="px-6 py-3 text-left">SL</th>
                    <th class="px-6 py-3 text-left">Chalan No</th>
                    <th class="px-6 py-3 text-left">Product</th>
                    <th class="px-6 py-3 text-left">Quantity</th>
                    <th class="px-6 py-3 text-left">Rate</th>
                    <th class="px-6 py-3 text-left">Discount</th>
                    <th class="px-6 py-3 text-left">Grand Total</th>
                    <th class="px-6 py-3 text-left">Payment Type</th>
                    <th class="px-6 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-sm text-gray-600">
                @foreach($purchases as $purchase)
                    <tr class="border-b">
                        <td class="px-6 py-3">{{ $loop->iteration }}</td>
                        <td class="px-6 py-3">{{ $purchase->chalan_no }}</td>
                        <td class="px-6 py-3">{{ $purchase->product_name }}</td>
                        <td class="px-6 py-3">{{ $purchase->quantity }}</td>
                        <td class="px-6 py-3">{{ $purchase->rate }}</td>
                        <td class="px-6 py-3">{{ $purchase->discount_percentage }}%</td>
                        <td class="px-6 py-3">{{ $purchase->grand_total }}</td>
                        <td class="px-6 py-3">{{ ucfirst($purchase->payment_type) }}</td>
                        <td class="px-6 py-3 text-center">
                            <!-- Edit Button -->
                            <a href="{{ route('purchase.edit', $purchase->id) }}" 
                               class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                                Edit
                            </a>
                            
                            <!-- Delete Button -->
                            <form action="{{ route('purchase.destroy', $purchase->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 font-bold text-white bg-red-500 rounded hover:bg-red-700"
                                        onclick="return confirm('Are you sure you want to delete this purchase?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="9" class="px-6 py-3 text-center">No purchases found</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</form>
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
