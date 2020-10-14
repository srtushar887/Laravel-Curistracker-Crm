<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\claim_manager;
use App\Models\web_portal_manager;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Rap2hpoutre\FastExcel\FastExcel;
use Yajra\DataTables\Facades\DataTables;

class SuperAdminWebportalManagerController extends Controller
{
    public function webportal_manager()
    {
        return view('superadmin.webportal.webPortalManager');
    }

    public function webportal_manager_get(Request $request)
    {
        $web_portal = DB::table('web_portal_managers')->latest();
        return DataTables::of($web_portal)
            ->addColumn('action',function ($web_portal){
            })
            ->make(true);
    }


    public function webportal_manager_import(Request $request)
    {
        $users = (new FastExcel)->import($request->csv_file, function ($line) {
            return web_portal_manager::updateOrCreate([
                'idcs' => $line['idcs'],
            ],[
                'short_code' => $line['short_code'],
                'facility_name' => $line['facility_name'],
                'ins_name' => $line['ins_name'],
                'status' => $line['status'],
                'web_link' => $line['web_link'],
                'user_name' => $line['user_name'],
                'pass_word' => $line['pass_word'],
                'security_questions_answers' => $line['security_questions_answers'],
                'idcs' => $line['idcs'],
            ]);
        });
        return back()->with('success','Web Portal Manager Data Successfully Uploaded');
    }

    public function webportal_manager_export()
    {
        $data = web_portal_manager::select('short_code','facility_name','ins_name','status','web_link','user_name','pass_word','security_questions_answers','idcs')->get();
        return (new FastExcel($data))->download('web_portal.xlsx');
    }

    public function webportal_manager_delete_all(Request $request)
    {
        web_portal_manager::query()->delete();
        return back()->with('success','All Web Portal Manager Data Successfully Deleted');
    }



}
