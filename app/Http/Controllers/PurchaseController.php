<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Supplier;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::all();
        return view('admin.purchase.manage', compact('purchases'));
    }
     
    public function create(Request $request)
    {
    return view('admin.purchase.add-purchase', );
    }
    public function store(Request $request)
    {
       $validatedData= $request->validate([
            'supplier' => 'required',
            'chalan_no' => 'required',
            'product_name' => 'required',
            'batch_no' => 'required',
            'stock' => 'required',
            'expiry_date' => 'required',
            'quantity' => 'required|numeric',
            'rate' => 'required|numeric',
            'vat' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'total' => 'required|numeric',
            'payment_type' => 'required',
        ]);
        Purchase::create($validatedData);
    
        return redirect()->route('purchase.index')->with('success', 'Purchase added successfully!');
    }
    public function list(Request $request)
    {
        $purchases = Purchase::all();
        return view('admin.purchase.manage', compact('purchase'));
    }

    public function edit($id)
{
    // Fetch customer details by ID
    $purchase = Purchase::find($id);
    
    if (!$purchase) {
        return redirect()->route('purchase.index')->withErrors('Purchase not found');
    }
    $suppliers = Supplier::all(); // Fetch suppliers for the edit view
    // Return the edit view
    return view('admin.purchase.edit', compact('purchase','suppliers'));
}
public function update(Request $request, $id)
{
    $purchase = Purchase::find($id);
    if (!$purchase) {
        return redirect()->route('purchase.index')->withErrors('Purchase not found');
    }
    $validatedData = $request->validate([
        'supplier' => 'required',
            'chalan_no' => 'required',
            'product_name' => 'required',
            'batch_no' => 'required',
            'stock' => 'required',
            'expiry_date' => 'required',
            'quantity' => 'required|numeric',
            'rate' => 'required|numeric',
            'vat' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'total' => 'required|numeric',
            'payment_type' => 'required',
    ]);

    $purchase->update($validatedData); // Update customer data
    return redirect()->route('purchase.index')->with('success', 'Purchase updated successfully!');
}

public function destroy($id)
{
    $purchase = Purchase::find($id);

    if ($purchase) {
        $purchase->delete();
        return redirect()->route('purchase.index')->with('success', 'Purchase deleted successfully.');
    }

    return redirect()->route('purchase.index')->with('error', 'Purchase not found.');
}
public function show($id)
{
    // Fetch customer details by ID
    $purchase = Purchase::find($id);
    
    if (!$purchase) {
        return redirect()->route('purchase.index')->withErrors('Purchase not found');
    }
    $suppliers = Supplier::all(); // Fetch suppliers for the edit view
    // Return the edit view
    return view('admin.purchase.edit', compact('purchase','suppliers'));
}
}