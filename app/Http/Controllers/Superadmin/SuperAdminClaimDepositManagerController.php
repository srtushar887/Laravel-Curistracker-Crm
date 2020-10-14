<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\claim_deposit_manager;
use App\Models\claim_manager;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Rap2hpoutre\FastExcel\FastExcel;
use Yajra\DataTables\Facades\DataTables;

class SuperAdminClaimDepositManagerController extends Controller
{
    public function claim_deposit_manager()
    {
        return view('superadmin.deposit.claimDepositManager');
    }


    public function claim_deposit_manager_get(Request $request)
    {
        $claims = DB::table('claim_deposit_managers')->latest();
        return DataTables::of($claims)
            ->addColumn('action',function ($claims){
            })
            ->editColumn('check_date_order', function ($claims) {
                return Carbon::parse($claims->check_date)->format('m/d/Y');
            })
            ->make(true);
    }



    public function claim_deposit_manager_import(Request $request)
    {
        $claim = (new FastExcel)->import($request->csv_file, function ($line) {
            return claim_deposit_manager::updateOrCreate([
                'idcs' => $line['idcs'],
            ],[
                'payer' => $line['payer'],
                'check_date' => $line['check_date'],
                'check_date_order' => Carbon::parse($line['check_date'])->format('Y-m-d'),
                'deposit_check_id' => $line['deposit_check_id'],
                'amount' => $line['amount'],
                'file_name' => $line['file_name'],
                'claims' => $line['claims'],
                'npl' => $line['npl'],
                'idcs' => $line['idcs'],
            ]);
        });
        return back()->with('success','Claim Deposit Manager Data Successfully Updated');
    }


    public function claim_deposit_manager_export()
    {
        $claim = claim_deposit_manager::select('payer','check_date','deposit_check_id','amount','file_name','claims','npl','idcs')->get();
        return (new FastExcel($claim))->download('deposit.xlsx');
    }

    public function claim_deposit_manager_delete_all(Request $request)
    {
        claim_deposit_manager::query()->delete();
        return back()->with('success','All Claim Deposit Manager Data Successfully Deleted');
    }



}
