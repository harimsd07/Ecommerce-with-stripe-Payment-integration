<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function viewCategory(){
        $categories =Category::all();
        return view('admin.category',compact('categories'));
    }

    public function addCategory(Request $request){
      $category = new Category;
        $category->category_name = $request->category;
        $category->save();

        toastr()->timeOut(5000)->closeButton()->addSuccess('Category added successfully');
        return redirect()->back();
    }

    public function deleteCategory($id){
        $category = Category::find($id);
        $category->delete();

        toastr()->timeOut(5000)->closeButton()->addDeleted('Category deleted successfully');
        return redirect()->back();
    }

    public function editCategory($id){
        $category = Category::find($id);
        return view('admin.edit-category',compact('category'));
    }

    public function updateCategory(Request $request,$id){
        $category = Category::find($id);
        $category->category_name = $request->category;
        $category->save();

        toastr()->timeOut(5000)->closeButton()->addDeleted('Category updated successfully');
        return redirect('/view-category');
    }

    public function addProduct(){
        $category = Category::all();
        return view('admin.add-product',compact('category'));
    }

    public function uploadProduct(Request $request){
        $product = new Product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;

        $image = $request->image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('products',$imagename);

            $product->image = $imagename;
        }

        $product->save();

        toastr()->timeOut(5000)->closeButton()->addDeleted('product added successfully');

        return redirect()->back();
    }

    public function viewProduct(){
        $product =Product::paginate(5);
        return view('admin.view-product',compact('product'));
    }

    public function deleteProduct($id){
        $product = Product::find($id);
        $image_path = public_path('products/'.$product->image);

        if(file_exists($image_path)){
            unlink($image_path);
        }

        $product->delete();
        toastr()->timeOut(5000)->closeButton()->addDeleted('Product deleted successfully');

        return redirect()->back();
    }

    public function updateProduct($slug){
        $category = Category::all();
        $product = Product::where('slug',$slug)->get()->first();
        return view('admin.update-product',compact('product','category'));
    }

    public function editProduct(Request $request,$id){
        $product = Product::find($id);

        $product->title =$request->title;
        $product->description =$request->description;
        $product->price =$request->price;
        $product->quantity =$request->quantity;
        $product->category =$request->category;

        $image = $request->image;

        if($image){
            $imageName =time().'.'.$image->getClientOriginalExtension();

            $request->image->move('products',$imageName);

            $product->image =$imageName;


        }
        $product->save();
        toastr()->timeOut(5000)->closeButton()->addDeleted('Product updated successfully');

        return redirect('/view-product');
    }

    public function productSearch(Request $request){

        $search = $request->search;
        $product = Product::where('title','LIKE','%'.$search.'%')->orWhere('category','LIKE','%'.$search.'%')->paginate(3);

        return view('admin.view-product',compact('product'));
    }

    public function viewOrder(){
        $orders = Order::all();
        return view('admin.order',compact('orders'));
    }

    public function ontheWay($id){
        $order = Order::find($id);
        $order->status = "On the Way";

        $order->save();

        return redirect('view-order');
    }

    public function delivered($id){
        $order = Order::find($id);
        $order->status = "Delivered";

        $order->save();

        return redirect('view-order');
    }

    public function printPDF($id){
        $orderData = Order::find($id);

        $pdf = Pdf::loadView('admin.invoice',compact('orderData'));
        return $pdf->download('invoice.pdf');
    }
}
