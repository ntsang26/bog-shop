<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index() {
        $category = Category::where('status', 1)->get();
        $product = Product::where('status', 1)->get();
        return view('frontend.homepage', compact('category', 'product'));
    }

    public function getDetailPrd($prdId = '', $slug = '') {
        $category = Category::where('status', 1)->get();
        $prd = Product::find($prdId);
        return view('frontend.page.prd_detail', compact('prd', 'category'));
    }
}
