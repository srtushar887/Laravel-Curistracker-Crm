<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\general_setting;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SuperAdminController extends Controller
{
    public function index()
    {
        return view('superadmin.index');
    }


    public function general_settings()
    {
        $gen = general_setting::first();
        return view('superadmin.pages.generalSettings',compact('gen'));
    }

    public function general_settings_update(Request $request)
    {
        $gen = general_setting::first();
        if($request->hasFile('logo')){
            @unlink($gen->logo);
            $image = $request->file('logo');
            $imageName = time().'.'.'png';
            $directory = 'assets/dashboard/images/logo/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $gen->logo = $imgUrl;
        }
        if($request->hasFile('icon')){
            @unlink($gen->icon);
            $image = $request->file('icon');
            $imageName = time().'.'.'png';
            $directory = 'assets/dashboard/images/logo/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $gen->icon = $imgUrl;
        }
        if($request->hasFile('login_page_image')){
            @unlink($gnl->login_page_image);
            $image = $request->file('login_page_image');
            $imageName = time().'.'.'jpeg';
            $directory = 'assets/dashboard/images/logo/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $gen->login_page_image = $imgUrl;
        }

        $gen->site_name = $request->site_name;
        $gen->site_email = $request->site_email;
        $gen->site_phone_number = $request->site_phone_number;
        $gen->site_address = $request->site_address;
        $gen->is_under_maintenance = $request->is_under_maintenance;
        $gen->save();

        return back()->with('success','General Settings Successfully Updated');




    }


}
