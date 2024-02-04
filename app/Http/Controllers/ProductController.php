<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(3);
        return view('products.index',['products'=>$products]);
    }
    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png,gif|max:1000'
        ]);
        //image upload
        $imageName = time().'_'.$request->image->extension();
        $request->image->move(public_path('products'),$imageName);

        $product = new Product();
        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;

        //save data
        $product->save();
        return back()->withSuccess('Product Created !!!');
    }
    public function edit($id)
    {
        $product = Product::where('id',$id)->first();
        return view('products.edit',['product'=>$product]);
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            //'image'=>'required|mimes:jpg,jpeg,png,gif|max:1000'
        ]);
        $product = Product::where('id',$id)->first();

        if(isset($request->image)){
        $imageName = time().'_'.$request->image->extension();
        $request->image->move(public_path('products'),$imageName);
        $product->image = $imageName;
        }
        $product->name = $request->name;
        $product->description = $request->description;

        //save data
        $product->save();
        return back()->withSuccess('Product Updated !!!');
    }
    public function destroy($id)
    {
        $product = Product::where('id',$id)->first();
        $product->delete();
        return back()->withSuccess('Product Deleted !!!');
    }
    public function view($id)
    {
        $product = Product::where('id',$id)->first();
        return view('products.view',['product'=>$product]);
    }
}
