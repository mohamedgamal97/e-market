<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;


class SiteController extends Controller
{
   public function index (){
       $latproducts = Product::take(3)->orderBy('created_at','DESC')->get();
       return view('frontend.index',compact('latproducts'));
   }

   public function show_products(Request $request){
        $id =  $request->catid;
        $products = Product::where('category_id',$id)->get();

        if(isset( $products)&&  $products->count()>0){
            foreach( $products as $prod){
                echo "<p>$prod->name</p>";
            }
        }else {
            echo "no products found in this category";
        }

   }

   public function about (){
       return view('frontend.about');
   }

   public function contact (){
       return view('frontend.contact');
   }
}
