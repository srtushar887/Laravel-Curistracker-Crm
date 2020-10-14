<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\file_manager;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class SuperAdminFileManagerController extends Controller
{
    public function file_manager()
    {
        return view('superadmin.file.fileManager');
    }

    public function file_manager_get(Request $request)
    {
        $file = DB::table('file_managers')->latest();
        return DataTables::of($file)
            ->addColumn('action',function ($file){
                return '
                        <a href="'.asset('assets/dashboard/filemanager/').'/'.$file->file_location.'" download=""> <i class="fas fa-download"></i> </a> |
                        <a href="'.asset('assets/dashboard/filemanager/').'/'.$file->file_location.'" target="_blank"><i class="fas fa-eye"></i> </a> |
                       <a href=""> <i class="fas fa-trash"></i> </a>
                        ';
            })
            ->make(true);
    }


    public function upload_file()
    {
        return view('superadmin.file.uploadFile');
    }

    public function upload_file_save(Request $request)
    {
        if($request->hasFile('file')) {
            $file = $request->file('file');
            $image=$request->file('file');
            $name=$image->getClientOriginalName();
            $uploadPath='assets/dashboard/filemanager/';
            $image->move($uploadPath,$name);
            $imageUrl=$uploadPath.$name;

            file_manager::create([
                'file_location' => $file->getClientOriginalName(),
            ]);
        }
    }





}
