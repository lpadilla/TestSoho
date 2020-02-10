<?php

namespace App\Http\Controllers\Api\V1;

use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function show($id)
    {
        return Product::findOrFail($id);
    }
    
    public function update(Request $request, $id)
    {
        $data =Product::where('id', $request->get('val_1'))->first();
        $data->title = $request->get('val_2');
        $data->product_code = $request->get('val_3');
        $data->description = $request->get('val_4');
        $data->save();
        return $data;
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return $product;
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return '';
    }   
}