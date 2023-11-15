<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\contact;



class ProductController extends Controller
{
    public function first_page(){
        $products = Product::latest()->paginate(2);
        return view('products.index',['products'=>$products]);
    }

public function create_page(){
    return view ('products.create');
}

public function store_page(Request $request){
    // dd($request);
    $request-> validate([
        'name'=>'required',
        'description'=>'required',
        'mrp'=>'required|numeric',
        'price'=>'required|numeric',  
        'image'=>'required|mimes:jpeg,jpg,png,gif,webp|max:10000',

    ]);
    $imageName = time().".".$request->image->extension(); //image name change panni $imageName la store panrom.
    $request->image->move(public_path("products"), $imageName); //image public la irukura product folder ku move panrom.
    
    $product = new Product();
    $product->image = $imageName;
    $product->name = $request->name;
    $product->description = $request->description;
    $product->mrp = $request->mrp;
    $product->price = $request->price;
    $product->save();
    return back()->withSuccess('Product Details Added Successfully');
    
}

public function show_page($id){
$product = Product::where('id',$id)->first();
return view('products.show',['product'=>$product]);
}

public function edit_page($id){
    $product = Product::where('id',$id)->first();
    return view('products.edit',['product'=>$product]);
    }

public function update_page(Request $request, $id){

$request->validate([

        'name'=>'required',
        'description'=>'required',
        'mrp'=>'required|numeric',
        'price'=>'required|numeric',  
        'image'=>'nullable|mimes:jpeg,jpg,png,gif,webp|max:10000',
]);

    $product=Product::where('id',$id)->first();

    if(isset($product->image)){

        $imageName = time().".".$request->image->extension(); //image name change panni $imageName la store panrom.
        $request->image->move(public_path("products"), $imageName); 
        $product->image = $imageName;
    }

    $product->name = $request->name;
    $product->description = $request->description;
    $product->mrp = $request->mrp;
    $product->price = $request->price;
    $product->save();
    return back()->withSuccess('Product Details updated Successfully');

}
    public function delete_page($id){

        $product = Product::where('id',$id)->first();
        $product->delete();
        return back()->withSuccess('Product deleted');
    }    

    public function home_page(){
        return view('home.index');
    }

    public function contact_page(Request $request){
        // dd($request);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',  
        ]);
    
        $contacts = new contact();
        $contacts->name = $request->name;
        $contacts->email = $request->email;
        $contacts->subject = $request->subject;
        $contacts->message = $request->message;
        $contacts->save();
        return back()->withSuccess('Product Details Added Successfully');
    }


    public function about_page(){
        $contacts = contact::latest()->paginate(2);
        return view('home.about', ['contacts' => $contacts]);
    }

    public function view_page(){
        $products = Product::latest()->paginate(5);
        return view('dashboard.view',['products'=>$products]);
    }

}