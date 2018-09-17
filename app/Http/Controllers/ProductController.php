<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Resources\Product as ProductResource;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //

    public function index(){
        $products = Product::all();
        return ProductResource::collection($products);
    }
    public function singleProduct($id){

        $product = Product::findOrFail($id);
        return new ProductResource($product);

    }
    public function add(Request $request){

        $product = $request->isMethod('put') ? Product::findOrFail($request->id): new Product();

        $product->id = $request->input('id');
        $product->name = $request->input('name');
        $product->supplier_id = $request->input('supplier_id');

        if ($product->save()){
            return new Product([$product]);
        }

    }
    public function delete($id){

        $product = Product::findOrFail($id);

        if ($product->delete()){
            return new Product($product);
        }

    }
}
