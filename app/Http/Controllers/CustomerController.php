<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::paginate(10); // Fetch all customers from database
        return view('admin.customer.index', compact('customers'));
    }

    public function edit($id)
{
    // Fetch customer details by ID
    $customer = Customer::find($id);
    
    if (!$customer) {
        return redirect()->route('customer.list')->withErrors('Customer not found');
    }

    // Return the edit view
    return view('admin.customer.edit', compact('customer'));
}

public function update(Request $request, $id)
{
    $customer = Customer::find($id);

    if (!$customer) {
        return redirect()->route('customer.list')->withErrors('Customer not found');
    }

    $customer->update($request->all()); // Update customer data
    return redirect()->route('customers.index')->with('success', 'Customer updated successfully!');

}

public function store(Request $request)
{
    $request->validate([
        'customer_name' => 'required',
        'phone'=>'required',
        'address'=>'required',
        'status'=>'required',
        'balance'=>'required',
        'city'=>'required',
        'state'=> 'required',
        'pan_no'=>'required',
        'country'=>'required',
        'email' => 'required|email',
        // Add more validation rules as needed
    ]);

    Customer::create($request->all());
    
    return redirect()->route('customer.index')
                     ->with('success', 'Customer created successfully!');
}
public function destroy($id)
{
    $customer = Customer::find($id);

    if ($customer) {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }

    return redirect()->route('customers.index')->with('error', 'Customer not found.');
}


    
    public function create(Request $request)
    {
        // Validate and store customer data
        $validatedData = $request->validate([
            'customer_name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'address' => 'nullable',
            'state' => 'nullable',
            'balance'=>'nullable',
            'country' => 'nullable',
            'vat_no' => 'nullable',
            'status' => 'nullable',
            'city' => 'nullable',
            'pan_no' => 'nullable',
        ]);

        // Save customer data to the database or perform other actions
        Customer::create($validatedData);

        return back()->with('success', 'Customer added successfully!');
    }
}



