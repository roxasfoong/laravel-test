<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Http\RedirectResponse;



class ProductController extends Controller
{

    public function listAllProduct(){
        $id = Auth::user()->id;
        $productList = Product::where('user_id', $id)->orderBy('created_at', 'desc')->get();
        return view('dashboard',compact('productList'));
    }

    public function showProductPage($productID)
    {
        $id = Auth::user()->id;
        if (!is_numeric($productID)) {
            $productID = 0;
        }

        $findProduct = Product::where('user_id', $id)->where('id', $productID)->first();

        if (!$findProduct) {
            return redirect()->route('dashboard')->with('error', 'Product not found or You have no right to access.');
        }
        $findProduct = Product::where('user_id', $id)->where('id', $productID)->get();
        return view('show_product_page', compact('findProduct'));
    }

    public function deleteProduct(){
        $id = Auth::user()->id;
        $productList = Product::where('user_id', $id)->orderBy('created_at', 'desc')->get();
        return view('dashboard',compact('productList'));
    }

    public function editProductPage($productID)
    {
        $id = Auth::user()->id;
        if (!is_numeric($productID)) {
            $productID = 0;
        }

        $findProduct = Product::where('user_id', $id)->where('id', $productID)->first();

        if (!$findProduct) {
            return redirect()->route('dashboard')->with('error', 'Product not found or You have no right to access.');
        }
        $findProduct = Product::where('user_id', $id)->where('id', $productID)->get();
        return view('edit_product_page', compact('findProduct'));

    }

    public function editProduct(Request $request)
    {
        $findProduct = Product::find($request->input('productID'));

        if(!Auth::check()){
            return redirect()->route('login');
        }
        if (!$findProduct) {
            return redirect()->route('dashboard')->with('error', 'Product not found or You have no right to access.');
        }

        $rules = [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'detail' => 'required|string|max:255',
        ];
    
        $validatedData = $request->validate($rules);

        $publishStatus =  htmlspecialchars($request->input('publish_status'));

        if (strtolower($publishStatus) !== 'no') {
            $publishStatus = 'Yes';
        }

        $name = $validatedData['name'];
        $price = $validatedData['price'];
        $detail = $validatedData['detail'];
        $user_id = Auth::user()->id;

        $data = [
            
                'user_id' =>$user_id,
                'name' => $name,
                'price' => $price,
                'detail' => $detail,
                'publish' => $publishStatus,
                'updated_at' => Carbon::now(),                
            
        ];

        $success =  $findProduct->update($data);

        if ($success) {

            return redirect()->route('dashboard')->with('success', 'Product updated successfully');
        } else {

            return redirect()->back()->with('error', 'Failed to update product');
        }

    }


    public function createProductPage()
    {
        return view('create_product_page');
    }

    public function createProduct(Request $request)
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }

        $rules = [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'detail' => 'required|string|max:255',
        ];
    
        $validatedData = $request->validate($rules);

        $publishStatus =  htmlspecialchars($request->input('publish_status'));

        if (strtolower($publishStatus) !== 'no') {
            $publishStatus = 'Yes';
        }

        $name = $validatedData['name'];
        $price = $validatedData['price'];
        $detail = $validatedData['detail'];
        $user_id = Auth::user()->id;

        $data = [
            [
                'user_id' =>$user_id,
                'name' => $name,
                'price' => $price,
                'detail' => $detail,
                'publish' => $publishStatus,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),                
            ],
        ];

        try{
        Product::insert($data);

        return redirect()->route('dashboard')->with('success', 'Records inserted successfully.');
        }catch(\Exception $e)
        {
            return redirect()->back()->with('error',$e);
        }
    }
}
