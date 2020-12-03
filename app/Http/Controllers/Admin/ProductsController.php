<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsRequest;

class ProductsController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        $brands     = Brand::active()->get();
        $categories = Category::active()->get();
        $tags       = Tag::get();
        return \view('admin.products.create',\compact('brands','tags','categories'));
    }

    public function store(ProductsRequest $request)
    {
        return $request;
    }
}
