<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\FuncCall;

class CategoryController extends Controller
{
    public function store_category(Request $request){

        $validator =Validator::make($request->all(),
        [
            'name' => 'required|unique:categories,name'
        ],
        [
            'name.required' => 'Category Name is Required!',
            'name.unique' => 'This Name is already taken!'
        ]
    );

    // to show message and redirect user baack
        if($validator -> fails()){
            return redirect()->back()->withErrors($validator)->withInputS($request->all());
        }
        Category::create([
            'name' => $request->name
        ]);
        return redirect()->back()->with('success','category created successfully');

    }
        //edit category
    public function edit_category($id){

        $category = Category::find($id);  //SELETCT * FROM categories WHERE id = '$id' (category ROW)
        $arr = array('category' => $category);

        return view('admin.layout.edit_category',$arr);


    }

            //update in db
    public function update_category($id, Request $request){
       $category = Category::find($id);
       $category ->name = $request ->name;
       $category->save();
       return redirect()->back()->with('success','category Updated successfully');


    }


        //delete category
    public function delete_category($id){
      $category =  Category::find($id);
      $category->delete();    //delete parent row

      $category->products()->delete();  // delete child rows (products that belongs to the deleted cat)
      return redirect()->back()->with('success','category Deleted Successfully!');
    }
            //show ALL Category products
    public function show_category_products($id){


         $category = Category::find($id);
         $products = $category->products; //join two tables;
         return view('admin.layout.all_cat_products',compact('products','category'));
    }
}
