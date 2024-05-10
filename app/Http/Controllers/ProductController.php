<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProductPage(){
        return view('show_product_page');
    }
    public function editProductPage(){
        return view('edit_product_page');
    }
    public function createProductPage(){
        return view('create_product_page');
    }
}
