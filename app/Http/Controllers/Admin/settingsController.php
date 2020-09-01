<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShippingRequest;

class settingsController extends Controller
{
    public function editMethod($type)
    {
        // return Setting::all();

        if ($type === 'free') 
        {
            $data = Setting::where('key','free_shipping_cost')->first();
            
        }elseif($type === 'localShipping')
        {
            $data = Setting::where('key','local_shipping_cost')->first();

        }elseif ($type === 'outerShipping') 
        {
           $data = Setting::where('key','outer_shipping_cost')->first();

        }else
        {
            return \redirect()->back()->with(['errors' => 'هذه الطريقة غير متاحة في الوقت الحالي ']);
        }

        return \view('admin.settings.shippings.edit',\compact('data'));
    }

    public function updateMethod($id,ShippingRequest $request)
    {
        try 
        {
             // return $request;
            $data = Setting::find($id);
            // return $data;
            
            DB::beginTransaction();
            
            $update = $data->update(
                [
                    'plain_value'   => $request->plain_value,
                ]);

            $data->value = $request->value;
            $data->save();
                    
            DB::commit();
                    
            return \redirect()->back()->with(['success' => 'تم تعديل وسيلة التوصيل بنجاح']);
        } 
        catch (\Throwable $th) 
        {
            return $th;
            return \redirect()->back()->with(['error' => 'هناك خطا ما برجاء المحاولة فيما بعد']);
            DB::rollback();
            
        }
       
    }
}
