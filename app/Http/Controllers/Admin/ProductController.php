<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Validator;
use App\Traits\ProductTrait;

class ProductController extends Controller
{
    use ProductTrait;
    public function show_products(){
        //take(2)-> to selcet the first 2 rows
        $products = Product::orderBy('created_at','DESC')->get();  // SELECT * FROM products order by created_at Desc
        $max = Product::max('price');
        $min = Product::min('price');
         return view('admin.products_list',compact('products','max','min'));
    }


        //create new product
        //product inputs validation
    public function store_product(ProductRequest $request){

            //validation in Product Request

            // upload product photo

        //this class (ProductController)

        $file_name= $this->savePhoto($request->photo,'images/products');

        //insert new product into db

        Product::create([
            'name'=> $request->name,
            'price'=> $request->price,
            'details'=> $request->details,
            'photo' => $file_name,
            'category_id'=> $request->category,
        ]);
        return redirect()->back()->with('success','product created successfully');
    }
        //delete product
    public function delete_product($id){
        $product = Product::find($id);
        $product->delete();
        unlink("images/products/$product->photo"); //to delete the photo location on the server
        return redirect()->back()->with('success','product Deleted Successfully');

    }

    //search product
    public function search_product(Request $request){
        $data = '%' . $request->K . '%';
        $products = Product::where('name','like', $data)->get();  //SELCTS * FROM products WHERE name LIKE data

        if(isset($products) && $products->count() > 0){
            foreach($products as $product){
                echo "<p><a href='/admin/product-details/$product->id'>$product->name</a></p>";
            }
        }else {
            return 'no products with such name';
        }
    }

    //show search product details

    public function show_product_details($id){
         $product = Product::find($id);
         return view('admin.layout.product_details',compact('product'));
        }
}
