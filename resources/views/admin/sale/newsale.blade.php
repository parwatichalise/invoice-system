@extends('layouts.app')
@section('content')
<div class="container p-6 mx-auto">
    <div class="p-6 bg-white rounded shadow-md">
        <h1 class="mb-6 text-xl font-bold">New Sale</h1>

        <form action="{{ route('sale.store') }}" method="POST">
            @csrf

        <!-- Customer and Date Section -->
        <div class="grid grid-cols-3 gap-4 mb-6">
            <div>
                <label for="customer_id" class="block text-sm font-medium">Customer Name<span class="text-red-500">*</span></label>
                <select name="customer_id" id="customer_id" class="w-full p-2 border border-gray-400 rounded">
                    <option selected disabled>Select One</option>
                    @foreach (App\Models\Customer:: all() as $customer )
                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                    @endforeach
                </select>
<!-- Button to open the modal -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addCustomerModal">
    +
</button>
            </div>
            <div>
                <label for="date" class="block text-sm font-medium">Date <span class="text-red-500">*</span></label>
                <input type="date" id="date" name="date" value="{{ date('Y-m-d') }}" class="w-full p-2 border border-gray-300 rounded">
            </div>
        </div>

        <!-- Product Information Table -->
        <div class="mb-6 overflow-x-auto">
            <table class="min-w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                    <tr>
                        <th class="px-4 py-2">Item Information <span class="text-red-500">*</span></th>
                        <th class="px-4 py-2">Batch No</th>
                        <th class="px-4 py-2">Qnty <span class="text-red-500">*</span></th>
                        <th class="px-4 py-2">Unit <span class="text-red-500">*</span></th>
                        <th class="px-4 py-2">Rate <span class="text-red-500">*</span></th>
                        <th class="px-4 py-2">Discount %</th>
                        <th class="px-4 py-2">Dis.value</th>
                        <th class="px-4 py-2">VAT %</th>
                        <th class="px-4 py-2">VAT.value</th>
                        <th class="px-4 py-2">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-4 py-2">
                            <input type="text" name="product_name" placeholder="Product Name" class="w-full p-2 border border-gray-300 rounded">
                        </td>
                        <td class="px-4 py-2">
                            <input type="text" name="batch_no" placeholder="Batch No" class="w-full p-2 border border-gray-300 rounded">
                        </td>
                        <td class="px-4 py-2">
                            <input type="number" name="quantity" placeholder="0.00" class="w-full p-2 border border-gray-300 rounded">
                        </td>
                        <td class="px-4 py-2">
                            <input type="number" name="unit" placeholder="0.00" class="w-full p-2 border border-gray-300 rounded">
                        </td>
                        <td class="px-4 py-2">
                            <input type="number" name="rate" placeholder="0.00" class="w-full p-2 border border-gray-300 rounded">
                        </td>
                        <td class="px-4 py-2">
                            <input type="number" name="discount_percentage" placeholder="0.00" class="w-full p-2 border border-gray-300 rounded">
                        </td>
                        <td class="px-4 py-2">
                            <input type="number" name="dis_value" placeholder="0.00" class="w-full p-2 border border-gray-300 rounded">
                        </td>
                    
                        <td class="px-4 py-2">
                            <input type="number" name="vat" placeholder="0.00" class="w-full p-2 border border-gray-300 rounded">
                        </td>
                        <td class="px-4 py-2">
                            <input type="number" name="vat_value" placeholder="0.00" class="w-full p-2 border border-gray-300 rounded">
                        </td>
                        <td class="px-4 py-2">
                            <input type="number" name="total" placeholder="0.00" class="w-full p-2 border border-gray-300 rounded">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Summary Section -->
        <div class="grid grid-cols-2 gap-4 mb-6">
            <div class="flex justify-end">
                <!-- Removed Add Item Button -->
            </div>
            <div>
                <div class="grid grid-cols-2 gap-4">

                    <div class="text-right">Sale Discount:</div>
                    <div><input type="text" name="sale_discount" placeholder="0.00" class="w-full p-2 border border-gray-300 rounded"></div>

                    <div class="text-right">Total Discount:</div>
                    <div><input type="text" name="total_discount" placeholder="0.00" class="w-full p-2 border border-gray-300 rounded"></div>

                    <div class="text-right">Total VAT:</div>
                    <div><input type="text" name="total_vat" placeholder="0.00" class="w-full p-2 border border-gray-300 rounded"></div>
                    
                    <div class="text-right">Shipping Cost:</div>
                    <div><input type="text" name="shipping_cost" placeholder="0.00" class="w-full p-2 border border-gray-300 rounded"></div>

                    <div class="text-right">Grand Total:</div>
                    <div><input type="text" name="grand_total" placeholder="0.00" class="w-full p-2 border border-gray-300 rounded"></div>

                    <div class="text-right">Net Total:</div>
                    <div><input type="text" name="net_total" placeholder="0.00" class="w-full p-2 border border-gray-300 rounded"></div>

                    <div class="text-right">Due Amount:</div>
                    <div><input type="text" name="due" placeholder="0.00" class="w-full p-2 border border-gray-300 rounded"></div>

                    <div class="text-right">Change:</div>
                    <div><input type="text" name="change" placeholder="0.00" class="w-full p-2 border border-gray-300 rounded"></div>
                </div>
            </div>
        </div>

        <!-- Payment Section Below -->
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="payment_type" class="block text-sm font-medium">Payment Type</label>
                <select id="payment_type" name="payment_type" class="w-full p-2 border border-gray-300 rounded">
                    <option value="">Select option</option>
                    <option value="cash">Cash</option>
                    <option value="card">Card</option>
                    <option value="esewa">E-sewa</option>
                </select>
            </div>
            <div>
                <label for="paid_amount" class="block text-sm font-medium">Paid Amount</label>
                <input type="text" id="paid_amount" name="paid_amount" value="" class="w-full p-2 border border-gray-300 rounded">
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end mt-6">
            <button type="submit" class="px-6 py-2 text-white bg-purple-600 rounded hover:bg-purple-700">Submit</button>
        </div>
    </form>
    </div>
</div>

<!-- Modal HTML -->
<div class="modal fade" id="addCustomerModal" tabindex="-1" aria-labelledby="addCustomerLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #af4c82; color: white;">
                <h5 class="modal-title" id="addCustomerLabel">Add new customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addCustomerForm" method="POST" action="{{ route('customers.create') }}">
                    @csrf
                    <!-- Customer Name -->
                    <div class="mb-3">
                        <label for="customer_id" class="form-label">Customer Name *</label>
                        <input type="text" class="form-control" id="customer_id" name="customer_id" placeholder="Customer Name" required>
                    </div>
                    
                    <!-- Customer Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Customer Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Customer Email">
                    </div>
                    
                    <!-- Customer Mobile -->
                    <div class="mb-3">
                        <label for="phone" class="form-label">Customer Mobile</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Customer Mobile">
                    </div>
                    
                    <!-- Customer Address -->
                    <div class="mb-3">
                        <label for="address" class="form-label">Customer Address</label>
                        <textarea class="form-control" id="address" name="address" placeholder="Customer Address"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="addCustomerForm" class="btn btn-success">Submit</button>
            </div>
        </div>
    </div>
</div>

@endsection


