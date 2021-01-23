<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Product;


class VendorController extends Controller
{
    public function show_vendors(){
        $vendors = Vendor::get();
        return view('admin.layout.show_vendors',compact('vendors')) ;
    }

    public function show_vendors_products($id){
        // $vendor = Vendor::find(2);
        // return $vendor->products;
        // return Vendor::with('products')->find(2);

         $vendor= Vendor::find($id);
         $products = $vendor->products;
         $all_products = Product::get();
         return view('admin.layout.vendor_products',compact('products','vendor','all_products'));
    }

    public function save_vendor_products(Request $request){
        $vendor = Vendor::find($request->vendor_id);
        $vendor->products()->syncWithoutDetaching($request->all_products);
        return redirect()->back()->with('success','products added successfully');
    }

    public function vendor_phone(){
        return Vendor::with(['phones'=> function($q){
            $q->select('code','phone','vendor_id');   //->where('code','02') ex on use where
        }])->find(1);

    }
}
