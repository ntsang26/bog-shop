<?php 

namespace App\Http\DAL;

use App\Models\Category;

class DAL_Product
{

    #region *** Cate Produt ***
    public function createCateProduct($array){
        return Category::create($array);
    }

    public function updateCateProduct($cateId = 1, $data = array()){
        return Category::where('id', $cateId)
            ->update($data);
    }

    #endregion

}