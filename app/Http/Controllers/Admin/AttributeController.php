<?php

namespace App\Http\Controllers\Admin;

use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use App\Http\Requests\AttributeRequest;

class AttributeController extends Controller
{
    public function index()
    {
        
        $attrs = Attribute::paginate(PAGINATION_COUNT);
        // return $attrs;
        return \view('admin.attributes.index',\compact('attrs'));
    }

    public function create()
    {
        return \view('admin.attributes.create');
    }

    public function store(AttributeRequest $request)
    {
        
        try 
        {
            // CREATE NEW ATTRIBUTE

                DB::beginTransaction();
                  $create = Attribute::create([]);

                    $create->name = $request->name;
                    $create->save();
                DB::commit();

                    return \redirect()->route('attributes')->with(['success' =>  __('admin/attributes.Create Success')]);

        } catch (\Throwable $th) 
        {
            return $th;
            
            DB::rollback();

            return \redirect()->route('attributes')->with(['error' => __('admin/attributes.Error Message Global')]);

        }
        
    }
}
