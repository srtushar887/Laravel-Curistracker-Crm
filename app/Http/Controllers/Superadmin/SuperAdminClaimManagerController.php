<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\claim_manager;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Rap2hpoutre\FastExcel\FastExcel;
use Yajra\DataTables\Facades\DataTables;

class SuperAdminClaimManagerController extends Controller
{
    public function claim_manager()
    {
        return view('superadmin.claim.claimManager');
    }


    public function claim_manager_get(Request $request)
    {
        $claims = DB::table('claim_managers')->latest();
        return DataTables::of($claims)
            ->addColumn('action',function ($claims){
             })
            ->editColumn('check_date', function ($claims) {
                return Carbon::parse($claims->check_date)->format('m/d/Y');
            })
            ->editColumn('svc_date', function ($claims) {
                return Carbon::parse($claims->svc_date)->format('m/d/Y');
            })
            ->make(true);
    }



    public function claim_manager_import(Request $request)
    {
        $claim = (new FastExcel)->import($request->csv_file, function ($line) {
            return claim_manager::updateOrCreate([
                'idcs' => $line['idcs'],
            ],[
                'file_name' => $line['file_name'],
                'npl' => $line['npl'],
                'check_date' => $line['check_date'],
                'patient_id' => $line['patient_id'],
                'last_name_first_name' => $line['last_name_first_name'],
                'status_1' => $line['status_1'],
                'payer' => $line['payer'],
                'payer_claim_control_number' => $line['payer_claim_control_number'],
                'svc_date' => $line['svc_date'],
                'cpt' => $line['cpt'],
                'charge_amount_2' => $line['charge_amount_2'],
                'payment_amount_2' => $line['payment_amount_2'],
                'group_name' => $line['group_name'],
                'adj_amount' => $line['adj_amount'],
                'translated_reason_code' => $line['translated_reason_code'],
                'idcs' => $line['idcs'],
                'invoice_date' => $line['invoice_date'],
                'invoice_name' => $line['invoice_name'],
                'issue_code' => $line['issue_code'],
                'action_code' => $line['action_code'],
            ]);
        });


        return back()->with('success','Claim Manager Data Successfully Uploaded');

    }

    public function claim_manager_export()
    {
        $claims = claim_manager::select('file_name','npl','check_date','patient_id',
            'last_name_first_name','status_1','payer','payer_claim_control_number','svc_date',
            'cpt','charge_amount_2','payment_amount_2','group_name','adj_amount','translated_reason_code','idcs','invoice_date','invoice_name',
            'issue_code','action_code')->get();
        return (new FastExcel($claims))->download('claim_manager.xlsx');
    }


    public function claim_manager_delete_all(Request $request)
    {
        claim_manager::query()->delete();
        return back()->with('success','All Claim Manager Data Successfully Deleted');
    }




}
