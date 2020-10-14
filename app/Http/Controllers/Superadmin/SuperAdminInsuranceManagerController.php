<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\claim_manager;
use App\Models\insurance_manager;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Rap2hpoutre\FastExcel\FastExcel;
use Yajra\DataTables\Facades\DataTables;

class SuperAdminInsuranceManagerController extends Controller
{
    public function insurance_manager()
    {
        return view('superadmin.insurance.insuranceManager');
    }

    public function insurance_manager_get(Request $request)
    {
        $claims = DB::table('insurance_managers')->latest();
        return DataTables::of($claims)
            ->addColumn('action',function ($claims){
            })
            ->make(true);
    }



    public function insurance_manager_import(Request $request)
    {
        $insurance = (new FastExcel)->import($request->csv_file, function ($line) {
            return insurance_manager::updateOrCreate([
                'idcs' => $line['idcs'],
            ],[
                'short_code' => $line['short_code'],
                'insurance_name' => $line['insurance_name'],
                'insurance_no' => $line['insurance_no'],
                'facsimile_no' => $line['facsimile_no'],
                'payer_id' => $line['payer_id'],
                'tfl_days' => $line['tfl_days'],
                'appeal_limit' => $line['appeal_limit'],
                'mailing_address' => $line['mailing_address'],
                'custom_1' => $line['custom_1'],
                'custom_2' => $line['custom_2'],
                'custom_3' => $line['custom_3'],
                'custom_4' => $line['custom_4'],
                'custom_5' => $line['custom_5'],
                'idcs' => $line['idcs'],
            ]);
        });
        return back()->with('success','Insurance Manager Data Successfully Updated');
    }


    public function insurance_manager_export()
    {
        $data = insurance_manager::select('short_code','insurance_name','insurance_no','facsimile_no','payer_id','tfl_days','appeal_limit','mailing_address',
            'custom_1','custom_2','custom_3','custom_4','custom_5','idcs')->get();
        return (new FastExcel($data))->download('insurance.xlsx');
    }

    public function insurance_manager_delete_all(Request $request)
    {
        insurance_manager::query()->delete();
        return back()->with('success','All Insurance Manager Data Successfully Deleted');
    }



}
