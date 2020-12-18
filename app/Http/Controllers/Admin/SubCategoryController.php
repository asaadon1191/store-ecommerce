<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\subcategoryRequest;

class SubCategoryController extends Controller
{
    public function index()
    {
        $mainCategories = Category::child()->paginate(PAGINATION_COUNT);
        // return $mainCategories;
        return \view('admin.SubCategories.index',\compact('mainCategories'));
    }

    public function create()
    {
        $mainCategories = Category::child()->paginate(PAGINATION_COUNT);
        return \view('admin\SubCategories\create',\compact('mainCategories'));
    }

    public function store(subcategoryRequest $request)
    {
        try 
        {
             // GET IS_ACTIVE INPUT

            //  return $request;
            if ($request->has('is_active')) 
            {
                $request->request->add(['is_active' => 1]);
            }else
            {
                $request->request->add(['is_active' => 0]);
            }

            DB::beginTransaction();
                $category               = Category::create($request->all());
                $category->name         = $request->name;
                $category->parent_id    = $request->mainCategory;
                $category->save();
            DB::commit();
            // return $request;
            return \redirect()->route('SubCategory')->with(['success' => 'تم اضافة قسم جديد بنجاح']);

        } catch (\Throwable $th) 
        {
            
            DB::rollback();
            return $th;
            return \redirect()->route('SubCategory')->with(['error','هناك خطا ما براجاء المحاولة فيما بعد']);

        }
    }

    public function edit($id)
    {
        $mainCategories = Category::parient()->paginate(PAGINATION_COUNT);
        $category = Category::find($id);
        // return $category;
        if (!$category) 
        {
            return \redirect()->route('SubCategory')->with(['error' => 'This Id Not Found']);
        }else
        {
            return \view('admin\SubCategories\edit',\compact('category','mainCategories'));
        }
    }

    public function update($id,subcategoryRequest $request)
    {
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

            // GET ID
            $category = Category::find($id);

            // CHECK IF ID IS FOUND
            if (!$category) 
            {
                return \redirect()->back()->with(['error' => 'هذا القسم غير موجود']);
            }else
            {
                // return $request;
                $category->update($request->all());

                // UPDATE TRANSLATIONS
                $category->name = $request->name;
                $category->parent_id = $request->mainCategory;
                $category->save();
            }
            
            return \redirect()->route('SubCategory')->with(['success' => 'تم التعديل بنجاح']);

        } catch (\Throwable $th) 
        {
            return $th;
            return \redirect()->route('SubCategory')->with(['error','هناك خطا ما براجاء المحاولة فيما بعد']);
        }
    }

    public function delete($id)
    {
         try 
         {
             // GET ID
                $category = Category::find($id);

                // CHECK IF ID IS FOUND
                if (!$category) 
                {
                    return \redirect()->back()->with(['error' => 'هذا القسم غير موجود']);
                }else
                {
                    $category->delete();
                }
                
                return \redirect()->route('SubCategory')->with(['success' => 'تم الحزف بنجاح']);

         } catch (\Throwable $th) 
         {
            return $th;
            return \redirect()->route('SubCategory')->with(['error','هناك خطا ما براجاء المحاولة فيما بعد']);

         }
    }
}
