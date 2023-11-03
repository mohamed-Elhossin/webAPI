<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // GET all products
    public function index()
    {
        $products =  Product::all();

        if ($products->isEmpty()) {
            $response = [
                "message" => "No Recordes Found",
                "satuts" => 404,
            ];
        } else {
            $response = [
                "message" => "Send Products Successfully",
                "satuts" => 200,
                "allData" => $products
            ];
        }


        return response($response, 200);
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->title = $request->title;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
        $response = [
            "message" => "Create Product Successfully",
            "satuts" => 200,
            "create" =>  $product
        ];
        return response($response, 200);
    }


    public function show($id)
    {
        $product =  Product::find($id);

        if ($product == null) {
            $response = [
                "message" => "No Recordes Found",
                "satuts" => 404,
            ];
        } else {
            $response = [
                "message" => "Send Products Successfully",
                "satuts" => 200,
                "allData" => $product
            ];
        }


        return response($response, 200);
    }





    public function update(Request $request, $id)
    {

        $product =  Product::find($id);
        $product->title = $request->title;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
        $response = [
            "message" => "Update Product Successfully",
            "satuts" => 200,
            "create" =>  $product
        ];
        return response($response, 200);
    }


    public function destroy($id)
    {
        $product =  Product::find($id);


        if ($product == null) {
            $response = [
                "message" => "No Recordes Found",
                "satuts" => 404,
            ];
        } else {
            $response = [
                "message" => "Deletet Products Successfully",
                "satuts" => 200,
                "allData" => $product
            ];
            $product->delete();
        }


        return response($response, 200);
    }
}
