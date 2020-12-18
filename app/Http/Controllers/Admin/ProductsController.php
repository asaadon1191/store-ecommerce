<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsRequest;
use App\Http\Requests\ProductsInvRequest;
use App\Http\Requests\ProductsPriceRequest;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::select('id','price','is_active')->paginate(PAGINATION_COUNT);
        return \view('admin.products.index',\compact('products'));
    }

    public function create()
    {
        $brands     = Brand::active()->get();
        $categories = Category::active()->get();
        $tags       = Tag::get();
        $products   = Product::all()->last();
        // return $products; 
        return \view('admin.products.create',\compact('brands','tags','categories','products'));
    }

    public function store(ProductsRequest $request)
    {
        // return $request;
        try
        {
            
          // GET IS_ACTIVE INPUT
          if ($request->has('is_active')) 
          {
              $request->request->add(['is_active' => 1]);
          }else
          {
              $request->request->add(['is_active' => 0]);
          }

        DB::beginTransaction();

          $products = Product::create(
              [
                  'slug'      => $request->slug,
                  'brand_id'  => $request->brand_id,
                  'is_active' => $request->is_active,
              ]);

              $products->name                 = $request->name;
              $products->description          = $request->description;
              $products->short_description    = $request->short_description;
              $products->save();  

            //   SAVE PRODUCT_TAG
            $products->tags()->attach($request->tags);

            //   SAVE PRODUCT_CATEGORY
            $products->categories()->attach($request->categories);
            DB::commit();

            return \redirect()->route('products')->with(['success'=>  __('admin/products.Create Success')]);

        

        }catch (\Throwable $th)
        { 
            DB::rollback();
            
            return $th;
            return \redirect()->route('products')->with(['error', __('admin/products.Error Message Global')]);
        }
    }


    public function store_prices(ProductsPriceRequest $request)
    {
        try
        {
            // GET PRODUCT ID
                $product =  Product::latest()->first();

            // SAVE DATA 
            DB::beginTransaction();
                $product->price                 = $request->price;
                $product->special_price         = $request->special_price;
                $product->special_price_type    = $request->special_price_type;
                $product->special_price_start   = $request->special_price_start;
                $product->special_price_end     = $request->special_price_end;
                $product->save();
            
            DB::commit();
            
                return \redirect()->route('products')->with(['success' =>  __('admin/products.Update Success')]);



        }catch (\Throwable $th)
        { 
            DB::rollback();
            
            return $th;
            return \redirect()->route('products')->with(['error', __('admin/products.Error Message Global')]);
        }     
    }

    public function store_inv(ProductsInvRequest $request)
    {
        // return $request;
        try
        {
            // GET PRODUCT ID
                $product =  Product::latest()->first();
            return $product;
            // SAVE DATA 
            DB::beginTransaction();
                $product->sku                   = $request->sku;
                $product->manage_stock          = $request->manage_stock;
                $product->qty                   = $request->qty;
                $product->in_stock              = $request->in_stock;
                $product->save();
            
            DB::commit();
            
                return \redirect()->route('products')->with(['success' =>  __('admin/products.Update Success')]);



        }catch (\Throwable $th)
        { 
            DB::rollback();
            
            return $th;
            return \redirect()->route('products')->with(['error', __('admin/products.Error Message Global')]);
        }     
    }

    public function store_image(Request $request,$id)
    {
        
        // GET PRODUCT ID
        $proId = Product::latest()->first()->id;
       
    
        // CHECK IF SUB IMAGES IS FOUND
        if ($request->hasFile('proImages')) 
        {
            $IMAGES = $request->proImages;

            foreach($IMAGES as $proPhotos)
            { 
                // dd($proPhotos);
                $create = ProductImage::create(
                    [
                        'photo'             => $proPhotos->store('productPhotos','public'),
                         'product_id'       => $proId
                    ]);
                    
                    
            }  
            return redirect()->back();
        }
    }
}
