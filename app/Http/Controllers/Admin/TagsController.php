<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\TagsRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TagsController extends Controller
{
    public function index()
    {
        $tags = Tag::paginate(PAGINATION_COUNT);
        return \view('admin\tags\index',compact('tags'));
    }

    public function create()
    {
        return \view('admin\tags\create');
    }

    public function store(TagsRequest $request)
    {
        // return $request;
        try 
        {
            // CREATE NEW taG

                DB::beginTransaction();
                  $create = Tag::create(
                     [
                         'slug' => $request->slug
                     ]);

                    $create->name = $request->name;
                    $create->save();
                DB::commit();

                    return \redirect()->route('tags')->with(['success' => 'New Brand Created successfaly']);

        } catch (\Throwable $th) 
        {
            return $th;
            
            DB::rollback();

            return \redirect()->route('tags')->with(['error' => 'Something Error Please Try Again Later']);

        }
    }

    public function edit($id)
    {
        try 
        {
            $tag = Tag::find($id);
            if (!$tag) 
            {
                return \redirect()->route('tags')->with(['error' => 'This Tag Not Found']);
            }else
            {
                return \view('admin\tags\edit',\compact('tag'));
            }

        } catch (\Throwable $th) 
        {
            return $th;
            return \redirect()->route('tags')->with(['error' => 'Something Error Please Try Again Later']);
        }
    }

    public function update(TagsRequest $request,$id)
    {
       try 
       {
        // GET TAG ROW
            $tag = Tag::find($id);
            
        // CHECK IF TAG IS FOUND
            if (!$tag) 
            {
                return \redirect()->route('tags')->with(['error' => 'This Tag Not Found']);
            }else
            {

        // UPDATE TAG
                $tag->slug = $request->slug;
                $tag->name = $request->name;
                $tag->save();
                return \redirect()->route('tags')->with(['success' => 'Tag Updated Successfally']);
            }
        
       } catch (\Throwable $th) 
       {
            return $th;
            return \redirect()->route('tags')->with(['error' => 'Something Error Please Try Again Later']);
       }
        
    }

    public function delete($id)
    {
        try 
        {
            $tag = Tag::find($id);
            if (!$tag) 
            {
                return \redirect()->route('tags')->with(['error' => 'This Tag Not Found']);
            }else
            {
                $tag->delete();
                return \redirect()->back()->with(['success' => 'Tag Deleted Successfally']);
            }

        } catch (\Throwable $th) 
        {
            return $th;
            return \redirect()->route('tags')->with(['error' => 'Something Error Please Try Again Later']);
        }
    }
}
