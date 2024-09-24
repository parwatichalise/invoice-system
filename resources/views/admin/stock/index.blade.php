@extends('layouts.app')
@section('content')
<div class="container mx-auto mt-5">
    <h1 class="mb-5 text-2xl font-bold">Stock Report</h1> 
    <table id="stockTable" class="min-w-full bg-white">
        <thead>
            <tr class="w-full text-sm leading-normal text-gray-600 uppercase bg-gray-200">
                <th class="px-6 py-3 text-left">SL</th>
                <th class="px-6 py-3 text-left">Product Name</th>
                <th class="px-6 py-3 text-left">Product Model</th>
                <th class="px-6 py-3 text-left">Sale Price</th>
                <th class="px-6 py-3 text-left">Purchase Price</th>
                <th class="px-6 py-3 text-left">In Qnty.</th>
                <th class="px-6 py-3 text-left">Out Qnty.</th>
                <th class="px-6 py-3 text-left">Stock</th>
                <th class="px-6 py-3 text-left">Stock Sale Price</th>
                <th class="px-6 py-3 text-left">Stock Purchase Price</th>
            </tr>
        </thead>
        <tbody class="text-sm font-light text-gray-600">
            @foreach($stocks as $key => $stock)
            <tr class="border-b border-gray-200 hover:bg-pink-300">
                <td class="px-6 py-3 text-left">{{ $key + 1 }}</td>
                <td class="px-6 py-3 text-left">{{ $stock->product_name }}</td>
                <td class="px-6 py-3 text-left">{{ $stock->product_model }}</td>
                <td class="px-6 py-3 text-left">{{ $stock->sale_price }}</td>
                <td class="px-6 py-3 text-left">{{ $stock->purchase_price }}</td>
                <td class="px-6 py-3 text-left">{{ $stock->in_qty }}</td>
                <td class="px-6 py-3 text-left">{{ $stock->out_qty }}</td>
                <td class="px-6 py-3 text-left">{{ $stock->stock }}</td>
                <td class="px-6 py-3 text-left">{{ $stock->stock_sale_price }}</td>
                <td class="px-6 py-3 text-left">{{ $stock->stock_purchase_price }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
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
