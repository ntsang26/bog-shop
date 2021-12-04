<?php

namespace  App\Http\Business\Admin;

use App\Helper\_ApiCode;
use App\Models\Category;

class BzProduct extends BzAdmin
{
    # *** Region Cate ***
        public function postAddCate($request) {
            return $this->dal_product->createCateProduct([
                'name' => $request->name,
                'thumbnail' => '',
                'status' => 1
            ]) ? _ApiCode::SUCCESS : _ApiCode::ERROR_UNKNOWN;
        }

        public function getEditCate($cateId){
            $data['cate'] = Category::find($cateId);
            return $data;
        }

        public function postEditCate($request) {
            $cateId = $request->cateId;
            $array = [
                'name' => $request->name,
            ];
            return $this->dal_product->updateCateProduct($cateId,$array) ? _ApiCode::SUCCESS : _ApiCode::ERROR_UNKNOWN;
        }
    #end region
}