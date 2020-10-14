<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\ar_followup_manager;
use App\Models\claim_manager;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Rap2hpoutre\FastExcel\FastExcel;
use Yajra\DataTables\Facades\DataTables;

class SuperAdminArFollowupManagerController extends Controller
{
    public function arfollowup_manager()
    {
        return view('superadmin.arfollowup.arfollowupManager');
    }

    public function arfollowup_manager_get(Request $request)
    {
        $claims = DB::table('ar_followup_managers')->latest();
        return DataTables::of($claims)
            ->addColumn('action',function ($claims){
            })
            ->editColumn('fromdos', function ($claims) {
                return Carbon::parse($claims->fromdos)->format('m/d/Y');
            })
            ->editColumn('todos', function ($claims) {
                return Carbon::parse($claims->todos)->format('m/d/Y');
            })
            ->make(true);
    }


    public function arfollowup_manager_import(Request $request)
    {
        $users = (new FastExcel)->import($request->csv_file, function ($line) {
            return ar_followup_manager::updateOrCreate([
                'claimid' => $line['claimid'],
            ],[
                'short_code' => $line['short_code'],
                'status' => $line['status'],
                'fileid' => $line['fileid'],
                'payerid' => $line['payerid'],
                'claimid' => $line['claimid'],
                'first' => $line['first'],
                'last' => $line['last'],
                'patacctnum' => $line['patacctnum'],
                'fromdos' => $line['fromdos'],
                'todos' => $line['todos'],
                'totalcharge' => $line['totalcharge'],
                'mastervendor' => $line['mastervendor'],
                'statelicenseid' => $line['statelicenseid'],
                'printclaim' => $line['printclaim'],
                'insuredid' => $line['insuredid'],
                'receiveddate' => $line['receiveddate'],
                'errordescription' => $line['errordescription'],

            ]);
        });
        return back()->with('success','Ar Followup Manager Data Successfully Uploaded');
    }

    public function arfollowup_manager_export()
    {
        $data = ar_followup_manager::select('short_code','status','fileid','payerid','claimid','first','last','patacctnum','fromdos','todos','totalcharge','mastervendor',
            'statelicenseid','printclaim','insuredid','receiveddate','errordescription')->get();
        return (new FastExcel($data))->download('ar_followup.xlsx');
    }

    public function arfollowup_manager_delete_all(Request $request)
    {
        ar_followup_manager::query()->delete();
        return back()->with('success','All Ar Followup Manager Data Successfully Deleted');
    }



}
