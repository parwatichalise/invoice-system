<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function create()
    {
        return view('admin.supplier.addsupplier');
    }

    // Store a new supplier in the database
    public function store(Request $request)
    {
        // Validate form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:15',
            'address1' => 'nullable|string|max:255',
            'address2' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'ward_no' => 'nullable|integer',
            'mobile_no' => 'nullable|string|max:15',
            'pan_no' => 'nullable|string|max:15',
        ]);

        // Create a new supplier record
        Supplier::create($validatedData);

        // Redirect to the supplier list after storing the supplier
        return redirect()->route('supplier.index')->with('success', 'Supplier added successfully!');
    }

    // Display the supplier list
    public function index(Request $request)
    {
        // Get all suppliers from the database
        $suppliers = Supplier::all();

        // Return the supplier list view with the data
        return view('admin.supplier.supplierlist', compact('suppliers'));
    }

    // Update a supplier in the database
    public function update(Request $request, $id)
    {
        // Validate form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:15',
            'address1' => 'nullable|string|max:255',
        ]);

        // Find the supplier by ID and update the record
        $supplier = Supplier::findOrFail($id);
        $supplier->update($validatedData);

        // Redirect back to the supplier list with a success message
        return redirect()->route('supplier.index')->with('success', 'Supplier updated successfully!');
    }

    // Delete a supplier from the database
    public function destroy($id)
    {
        // Find the supplier by ID and delete it
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        // Redirect back to the supplier list with a success message
        return redirect()->route('supplier.index')->with('success', 'Supplier deleted successfully!');
    }
}
