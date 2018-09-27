<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Transformers\CategoryTransformer;

class CategoriesController extends Controller
{
    public function index()
    {
        //分类数据是集合，所以我们使用 $this->response->collection 返回数据。
        return $this->response->collection(Category::all(), new CategoryTransformer());
    }
}
