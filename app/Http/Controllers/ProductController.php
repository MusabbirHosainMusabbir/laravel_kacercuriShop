<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){

        $products= Product::all();

        return view('admin.products.index',compact('products'));

    }

     public function create(){

        $product= new Product();

        return view('admin.products.create',compact('product'));
     }

     public function store(Request $request){

       //validation

         $request->validate([

            'product_name'=>'required',
            'product_price'=>'required',
            'product_description'=>'required',
            'product_image'=>'image|required',

         ]);

          // Upload the Image

         if ($request->hasFile('product_image')){
             $image=$request->product_image;
             $image->move('uploads',$image->getClientOriginalName());
         }
  // upload the info into the database
         Product::create([
             'product_name'=> $request->product_name,
             'product_price'=>$request->product_price,
             'product_description'=>$request->product_description,
             'product_image'=>$request->product_image->getClientOriginalName(),
         ]);


        // session message

         $request->session()->flash('message','Your product has been uploaded');

         //redirect the page

         return redirect('admin/products/create');

     }

     public function edit($id){

        $product=Product::find($id);
        return view('admin.products.edit',compact('product'));
     }

     public function update(Request $request , $id){


        //find the product
         $product=Product::find($id);


         // check the validation Form

         $request->validate([

             'product_name'=>'required',
             'product_price'=>'required',
             'product_description'=>'required',
//

         ]);

               //check if there is any image

         if ($request->hasFile('product_image')){

             if (file_exists(public_path('uploads/').$product->product_image)){

                 unlink(public_path('uploads/').$product->product_image);
             }

             //upload new image
             $image=$request->product_image;
             $image->move('uploads',$image->getClientOriginalName());
             $product->product_image= $request->product_image->getClientOriginalName();

         }


         //update the product

         $product->update([

             'product_name'=> $request->product_name,
             'product_price'=>$request->product_price,
             'product_description'=>$request->product_description,
             'product_image'=>$product->product_image,
         ]);

         //store a message a session

         $request->session()->flash('message','this product has been updateed');

         //redirect

         return redirect('admin/products');
     }


     public function show($id){

        $product=Product::find($id);

        return view('admin.products.details',compact('product'));

     }

     public function destroy($id){

        Product::destroy($id);


        //store message

         session()->flash('message','Product has been deleted');

        //redirect back

         return redirect('admin/products');

    }

}
