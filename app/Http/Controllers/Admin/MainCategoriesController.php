<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\MainCategoryRequest;

class MainCategoriesController extends Controller
{
    public function index()
    {
        $mainCategories = Category::parient()->paginate(PAGINATION_COUNT);
        // return $mainCategories;
        return \view('admin.categories.index',\compact('mainCategories'));
    }

    public function create()
    {
        return \view('admin\categories\create');
    }

    public function store(MainCategoryRequest $request)
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

            DB::beginTransaction();
                $category = Category::create($request->all());
                $category->name = $request->name;
                $category->save();
            DB::commit();
            // return $request;
            return \redirect()->route('Categories')->with(['success' => 'تم اضافة قسم جديد بنجاح']);

        } catch (\Throwable $th) 
        {
            return \redirect()->route('Categories')->with(['error','هناك خطا ما براجاء المحاولة فيما بعد']);

        }
    }

    public function edit($id)
    {
        $category = Category::find($id);
        // return $category;
        if (!$category) 
        {
            return \redirect()->route('Categories')->with(['error' => 'This Id Not Found']);
        }else
        {
            return \view('admin.categories.edit',\compact('category'));
        }
    }

    public function update($id,MainCategoryRequest $request)
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
                $category->update($request->all());

                // UPDATE TRANSLATIONS
                $category->name = $request->name;
                $category->save();
            }
            
            return \redirect()->route('Categories')->with(['success' => 'تم التعديل بنجاح']);

        } catch (\Throwable $th) 
        {
            return $th;
            return \redirect()->route('Categories')->with(['error','هناك خطا ما براجاء المحاولة فيما بعد']);
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
                
                return \redirect()->route('Categories')->with(['success' => 'تم الحزف بنجاح']);

         } catch (\Throwable $th) 
         {
            return $th;
            return \redirect()->route('Categories')->with(['error','هناك خطا ما براجاء المحاولة فيما بعد']);

         }
    }
}
