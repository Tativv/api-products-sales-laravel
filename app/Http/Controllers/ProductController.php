<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // GET /api/products
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    // POST /api/products
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
    ]);

    $product = Product::create($validated);

    return response()->json([
        'message' => 'Producto creado correctamente',
        'data' => $product
    ]);
}

    // GET /api/products/{id}
    public function show(Product $product)
    {
        return response()->json($product);
    }

    // PUT /api/products/{id}
    public function update(Request $request, Product $product)
    {
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        $product->update($request->all());

        return response()->json($product);
    }

    // DELETE /api/products/{id}
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json(['message' => 'Producto eliminado']);
    }
}
