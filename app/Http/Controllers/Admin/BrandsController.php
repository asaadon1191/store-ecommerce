<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\BrandRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BrandsController extends Controller
{
    public function index()
    {
        $brands = Brand::paginate(PAGINATION_COUNT);
        // return $brands;
        return \view('admin\brand\index',\compact('brands'));
    }

    public function create()
    {
        return \view('admin\brand\create');
    }

    public function store(BrandRequest $request)
    {
        try 
        {
           
            // GET BRAND STATUS
                if (!$request->is_active) 
                {
                $request->request->add(['is_active' => 0]);
                }else
                {
                    $request->request->add(['is_active' => 1]);
                }

            // CHECK PHOTO
                if ($request->hasFile('photo')) 
                {
                   $photo =  $request->photo->store('brands','public');
                }    

            // CREATE NEW BRAND

                DB::beginTransaction();
                  $create = Brand::create(
                     [
                         'is_active' => $request->is_active,
                         
                     ]);

                    $create->name = $request->name;
                    $create->photo = $photo;
                    $create->save();
                DB::commit();

                    return \redirect()->route('brands')->with(['success' => 'New Brand Created successfaly']);

        } catch (\Throwable $th) 
        {
            return $th;
            
            DB::rollback();

            return \redirect()->route('brands')->with(['error' => 'Something Error Please Try Again Later']);

        }
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        return \view('admin\brand\edit',\compact('brand'));
    }

    public function update($id,BrandRequest $request)
    {
        try 
        {
            // GET BRAND
                $brand = Brand::find($id);

            // GET BRAND STATUS
                if (!$request->is_active) 
                {
                $request->request->add(['is_active' => 0]);
                }else
                {
                    $request->request->add(['is_active' => 1]);
                }

            // CHECK IF BRAND IS FOUND
                if (!$brand) 
                {
                    return \redirect()->route('brands')->with(['error' => 'This Brand Not Found']);

                }else
                {
                    // return $request;
            // UPDATE ALL DATA
                   $update = $brand->update($request->all());

                    $brand->name = $request->name;
                    $brand->save();
                    
            // UPDATE PHOTO 
                if ($request->hasFile('photo')) 
                {
                    Storage::disk('public')->delete('/assets/admin/images/',$brand->photo);
                    $photo =  $request->photo->store('brands','public');
                    $brand->update(['photo' => $photo]);
                }
                    return \redirect()->route('brands')->with(['success' => 'Brand Updated successfaly']);
                }

        } catch (\Throwable $th) 
        {
            $th;
            return \redirect()->route('brands')->with(['error' => 'Something Error Please Try Again Later']);
        }
    }


}
