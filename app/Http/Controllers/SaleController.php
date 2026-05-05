<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $sales = \App\Models\Sale::with('product')->get();
    return response()->json($sales);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1',
    ]);

    $product = \App\Models\Product::find($validated['product_id']);

    // Validar stock
    if ($product->stock < $validated['quantity']) {
        return response()->json([
            'message' => 'No hay suficiente stock'
        ], 400);
    }

    // Calcular total
    $total = $product->price * $validated['quantity'];

    // Crear venta
    $sale = \App\Models\Sale::create([
        'product_id' => $product->id,
        'quantity' => $validated['quantity'],
        'total' => $total,
    ]);

    // Descontar stock
    $product->stock -= $validated['quantity'];
    $product->save();

    return response()->json([
    'message' => 'Venta realizada correctamente',
    'data' => $sale
], 201);
}

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
