<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use App\Http\Resources\Supplier as SupplierResource;

class SupplierController extends Controller
{
    //

    public function index(){
        $suppliers = Supplier::all();
        return SupplierResource::collection($suppliers);
    }
    public function singleSupplier($id){
        $supplier = Supplier::findOrFail($id);
        return new SupplierResource($supplier);
    }
    public function add(Request $request){
        $supplier = $request->isMethod('put') ? Supplier::findOrFail($request->id)->update(): new Supplier();

        $supplier->id = $request->input('id');
        $supplier->name = $request->input('name');
        $supplier->supplier_id = $request->input('delivery_id');

        if ($supplier->save()){
            return new Supplier([$supplier]);
        }
    }
    public function delete($id){
        $supplier = Supplier::findOrFail($id);

        if ($supplier->delete()){
            return new Supplier($supplier);
        }
    }
}
