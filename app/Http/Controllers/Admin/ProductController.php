<?php

namespace App\Http\Controllers\Admin;

use App\Helper\_ApiCode;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{

    #Region *** Product ***
    public function getListProduct() {
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
        if ($keyword != '') {
            $product = Product::where('status', 1)
            ->where('name', 'like', '%'.$keyword.'%')
            ->orWhere('id', $keyword)
            ->paginate(10);
        } else {
            $product = Product::orderBy('id', 'desc')
            ->where('status', 1)
            ->paginate(10);
        }
        return view('admin.product.list_product', compact('product'));
    }

    public function getAddProduct() {
        $cate = Category::all();
        return view('admin.product.add_product', compact('cate'));
    }

    public function postAddProduct(ProductRequest $request) {
        $product = new Product();
        $product->category_id = $request->category_id;
        $product->prd_code = 'SP'.rand(1000,9999);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->sale_off = $request->sale_off;
        $product->status = 1;
        if($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $name = $file->getClientOriginalExtension();
            $image = time().'.'.$name;
            while(file_exists("public/product".$image)){
                $image = time().'.'.$name;
            }
            $file->storeAs("public/product", $image);
            $product->thumbnail = $image;
        } else $product->thumbnail = '';
        $product->save();
        return redirect()->back()->with(['success_message' => 'Thêm mới sản phẩm thành công']);
    }

    public function getEditProduct($prdId) {
        $cate = Category::all();
        $prd = Product::find($prdId);
        return view('admin.product.edit_product', compact('cate','prd'));
    }

    public function postEditProduct(Request $request, $prdId) {
        $product = Product::find($prdId);
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->sale_off = $request->sale_off;
        if($request->hasFile('thumbnail')) {
            $oldFile = public_path("product/".$product->thumbnail);
            if(file_exists($oldFile)) {
                unlink($oldFile);
            }
            $file = $request->file('thumbnail');
            $name = $file->getClientOriginalExtension();
            $image = time().'.'.$name;
            while(file_exists("public/product".$image)){
                $image = time().'.'.$name;
            }
            $file->storeAs("public/product", $image);
            $product->thumbnail = $image;
        }
        $product->save();
        return redirect()->route('admin.product.list')->with(['success_message' => 'Sửa sản phẩm thành công']);
    }

    public function getDeleteProduct($prdId) {
        $product = Product::find($prdId);
        $product->update(['status' => -1]);
        return redirect()->back()->with(['success_message' => 'Xóa sản phẩm thành công']);
    }

    #end region


    #Region *** Cate Product ***
    public function getListCate(Request $request) {
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
        if ($keyword != '') {
            $cate = Category::where('status', 1)
            ->where('name', 'like', '%'.$keyword.'%')
            ->orWhere('id', $keyword)
            ->get();
        } else {
            $cate = Category::orderBy('id', 'desc')
            ->where('status', 1)
            ->get();
        }
        return view('admin.product.list_cate', compact('cate'));
    }

    public function getAddCate() {
        return view('admin.product.add_cate');
    }

    public function postAddCate(Request $request) {
        $cate = new Category();
        $cate->name = $request->name;
        $cate->status = 1;
        if($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $name = $file->getClientOriginalExtension();
            $image = time().'.'.$name;
            while(file_exists("public/category".$image)){
                $image = time().'.'.$name;
            }
            $file->storeAs("public/category", $image);
            $cate->thumbnail = $image;
        } else $cate->thumbnail = '';
        $cate->save();
        return redirect()->back()->with(['success_message' => 'Thêm mới danh mục thành công']);
    }

    public function getEditCate($cateId) {
        $cate = Category::find($cateId);
        return view('admin.product.edit_cate', compact('cate'));
    }

    public function postEditCate(Request $request, $cateId){
        $cate = Category::find($cateId);
        $cate->name = $request->name;
        if($request->hasFile('thumbnail')) {
            $oldFile = public_path("category/".$cate->thumbnail);
            if(file_exists($oldFile)) {
                unlink($oldFile);
            }
            $file = $request->file('thumbnail');
            $name = $file->getClientOriginalExtension();
            $image = time().'.'.$name;
            while(file_exists("public/category".$image)){
                $image = time().'.'.$name;
            }
            $file->storeAs("public/category", $image);
            $cate->thumbnail = $image;
        }
        $cate->save();
        return redirect()->route('admin.product.cate.getList')->with(['success_message' => 'Chỉnh sửa danh mục thành công']);
    }

    public function getDeleteCate($cateId) {
        $cate = Category::find($cateId);
        $cate->delete();
        return redirect()->back()->with(['success_message' => 'Xóa danh mục thành công']);
    }
    #end Region
}
