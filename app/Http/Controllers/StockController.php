<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::all(); // Retrieve all stock entries
        return view('admin.stock.index', compact('stocks'));
    }
}
