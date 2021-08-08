<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

use Image;
use File;

class SettingController extends Controller
{
    public function edit($id)
  {
    
     $setting = Setting::find($id);
    // return view('backend.pages.settings.edit')->with('setting', $setting);
    return view('backend.pages.settings.edit',compact('setting'));
  }

    public function update(Request $request, $id)
    {
        // return $request;
          $this->validate($request, [
          'website_name'  => 'required',
          'website_footer_text'  => 'required',
          'email'  => 'required',
          'phone'  => 'required',
          'address'  => 'required',
        //   'shipping_cost'  => 'required',
          'info'  => 'required',
          
        ],
        [
          'website_name.required'  => 'Please provide website name',
          'website_footer_text.required'  => 'Please provide website footer text',
          'email.required'  => 'Please provide email',
          'phone.required'  => 'Please provide phone number',
          'address.required'  => 'Please provide address',
          
        ]);

        

        $Setting = Setting::find($id);
        $Setting->website_name = $request->website_name;
        $Setting->website_footer_text = $request->website_footer_text;
        $Setting->email = $request->email;
        $Setting->phone = $request->phone;
        $Setting->address = $request->address;
        $Setting->shipping_cost = 50;
        $Setting->info = json_encode($request->info);
        

        if ($request->website_logo > 0) {
            // Delete the old Slider
            if (File::exists('images/'.$request->old_logo)) {
                File::delete('images/'.$request->old_logo);
              }

            $image = $request->file('website_logo');
            $img = time() . '.'. $image->getClientOriginalExtension();
            $location = ('images/' .$img);
            Image::make($image)->save($location);
            $Setting->website_logo = $img;
        }
        $Setting->save();

        session()->flash('success', 'Slider has updated successfully !!');
        return redirect()->back();

    }
}
