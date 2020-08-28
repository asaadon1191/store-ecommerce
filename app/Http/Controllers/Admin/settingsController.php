<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function updateMethod($id,Request $request)
    {
        
    }
}
