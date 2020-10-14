<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\practice_insurance_sort_code;
use App\Models\practice_management;
use App\Models\practice_npl_number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class SuperAdminPracticeController extends Controller
{
    public function practice_management()
    {
        return view('superadmin.practice.praceticeList');
    }

    public function create_practice()
    {
        return view('superadmin.practice.praceticeCreate');
    }

    public function create_practice_save(Request $request)
    {
        $prac_save = new practice_management();
        if($request->hasFile('practice_file')){

            $image=$request->file('practice_file');
            $name=$image->getClientOriginalName();
            $uploadPath='assets/dashboard/praceticemanagement/';
            $image->move($uploadPath,$name);
            $imageUrl=$uploadPath.$name;

            $prac_save->practice_file = $name;
        }


        if($request->hasFile('practice_sop')){

            $image=$request->file('practice_sop');
            $name=$image->getClientOriginalName();
            $uploadPath='assets/dashboard/praceticemanagement/';
            $image->move($uploadPath,$name);
            $imageUrl1=$uploadPath.$name;

            $prac_save->practice_sop = $name;
        }

        if($request->hasFile('rate_list')){

            $image=$request->file('rate_list');
            $name=$image->getClientOriginalName();
            $uploadPath='assets/dashboard/praceticemanagement/';
            $image->move($uploadPath,$name);
            $imageUrl2=$uploadPath.$name;

            $prac_save->rate_list = $name;
        }

        if($request->hasFile('auth_shop')){

            $image=$request->file('auth_shop');
            $name=$image->getClientOriginalName();
            $uploadPath='assets/dashboard/praceticemanagement/';
            $image->move($uploadPath,$name);
            $imageUrl3=$uploadPath.$name;

            $prac_save->auth_shop = $name;
        }

        if($request->hasFile('insurance_update')){

            $image=$request->file('insurance_update');
            $name=$image->getClientOriginalName();
            $uploadPath='assets/dashboard/praceticemanagement/';
            $image->move($uploadPath,$name);
            $imageUrl4=$uploadPath.$name;

            $prac_save->insurance_update = $name;
        }

        if($request->hasFile('voided_check')){

            $image=$request->file('voided_check');
            $name=$image->getClientOriginalName();
            $uploadPath='assets/dashboard/praceticemanagement/';
            $image->move($uploadPath,$name);
            $imageUrl5=$uploadPath.$name;

            $prac_save->voided_check = $name;
        }

        if($request->hasFile('eft')){

            $image=$request->file('eft');
            $name=$image->getClientOriginalName();
            $uploadPath='assets/dashboard/praceticemanagement/';
            $image->move($uploadPath,$name);
            $imageUrl6=$uploadPath.$name;

            $prac_save->eft = $name;
        }

        if($request->hasFile('era_forms')){

            $image=$request->file('era_forms');
            $name=$image->getClientOriginalName();
            $uploadPath='assets/dashboard/praceticemanagement/';
            $image->move($uploadPath,$name);
            $imageUrl7=$uploadPath.$name;

            $prac_save->era_forms = $name;
        }

        if($request->hasFile('email_updated')){

            $image=$request->file('email_updated');
            $name=$image->getClientOriginalName();
            $uploadPath='assets/dashboard/praceticemanagement/';
            $image->move($uploadPath,$name);
            $imageUrl8=$uploadPath.$name;

            $prac_save->email_updated = $name;
        }

        if($request->hasFile('npi_roster')){

            $image=$request->file('npi_roster');
            $name=$image->getClientOriginalName();
            $uploadPath='assets/dashboard/praceticemanagement/';
            $image->move($uploadPath,$name);
            $imageUrl9=$uploadPath.$name;

            $prac_save->npi_roster = $name;
        }

        if($request->hasFile('onboarding_sheet')){

            $image=$request->file('onboarding_sheet');
            $name=$image->getClientOriginalName();
            $uploadPath='assets/dashboard/praceticemanagement/';
            $image->move($uploadPath,$name);
            $imageUrl10=$uploadPath.$name;

            $prac_save->onboarding_sheet = $name;
        }

        if($request->hasFile('w9')){

            $image=$request->file('w9');
            $name=$image->getClientOriginalName();
            $uploadPath='assets/dashboard/praceticemanagement/';
            $image->move($uploadPath,$name);
            $imageUrl11=$uploadPath.$name;

            $prac_save->w9 = $name;
        }


        $prac_save->practice_name = $request->practice_name;
        $prac_save->short_code = $request->short_code;
        $prac_save->practice_tax_id = $request->practice_tax_id;
        $prac_save->practice_address = $request->practice_address;
        $prac_save->billing_address = $request->billing_address;
        $prac_save->provider_name = $request->provider_name;
        $prac_save->sftp_url = $request->sftp_url;
        $prac_save->sfpt_username = $request->sfpt_username;
        $prac_save->sftp_password = $request->sftp_password;
        $prac_save->save();



        $data = $request->practice_npl;
        for ($i=0;$i<count($data);$i++){
            $new_npl = new practice_npl_number();
            $new_npl->practice_id = $prac_save->id;
            $new_npl->npl_number = $data[$i];
            $new_npl->save();
        }

        $data2 = $request->insurance_code;
        for ($i=0;$i<count($data2);$i++){
            $new_npl = new practice_insurance_sort_code();
            $new_npl->practice_id = $prac_save->id;
            $new_npl->insurance_sort_code = $data2[$i];
            $new_npl->save();
        }


        return back()->with('success','Practice Created');
    }


    public function practice_management_get(Request $request)
    {
        $practice = DB::table('practice_managements')->latest();
        return DataTables::of($practice)
            ->addColumn('action',function ($practice){
                return '
                        <a href="'.route('super.admin.edit.pracetice',$practice->id).'"> <i class="fas fa-edit"></i> </a> |
                      <i class="fas fa-trash" id="'.$practice->id .'" onclick="deleteprac(this.id)" data-toggle="modal" data-target="#superadmindeletepractice"></i>
                        ';
            })
            ->make(true);
    }

    public function edit_practice($id)
    {
        $prac_edit = practice_management::where('id',$id)->first();
        return view('superadmin.practice.praceticeEdit',compact('prac_edit'));
    }


    public function delete_exist_sortcode(Request $request)
    {
        $delete_exist_npl = practice_insurance_sort_code::where('id',$request->id)->first();
        $delete_exist_npl->delete();
    }

    public function delete_exist_npl(Request $request)
    {
        $delete_exist_npl = practice_npl_number::where('id',$request->id)->first();
        $delete_exist_npl->delete();
    }

    public function update_practice(Request $request)
    {
        $practive_update = practice_management::where('id',$request->practice_edit_id)->first();
        if($request->hasFile('practice_file')){
            @unlink($practive_update->practice_file);
            $image=$request->file('practice_file');
            $name=$image->getClientOriginalName();
            $uploadPath='assets/dashboard/praceticemanagement/';
            $image->move($uploadPath,$name);
            $imageUrl=$uploadPath.$name;

            $practive_update->practice_file = $name;
        }


        if($request->hasFile('practice_sop')){
            @unlink($practive_update->practice_sop);
            $image=$request->file('practice_sop');
            $name=$image->getClientOriginalName();
            $uploadPath='assets/dashboard/praceticemanagement/';
            $image->move($uploadPath,$name);
            $imageUrl1=$uploadPath.$name;

            $practive_update->practice_sop = $name;
        }

        if($request->hasFile('rate_list')){
            @unlink($practive_update->rate_list);
            $image=$request->file('rate_list');
            $name=$image->getClientOriginalName();
            $uploadPath='assets/dashboard/praceticemanagement/';
            $image->move($uploadPath,$name);
            $imageUrl2=$uploadPath.$name;

            $practive_update->rate_list = $name;
        }

        if($request->hasFile('auth_shop')){
            @unlink($practive_update->auth_shop);
            $image=$request->file('auth_shop');
            $name=$image->getClientOriginalName();
            $uploadPath='assets/dashboard/praceticemanagement/';
            $image->move($uploadPath,$name);
            $imageUrl3=$uploadPath.$name;

            $practive_update->auth_shop = $name;
        }

        if($request->hasFile('insurance_update')){
            @unlink($practive_update->insurance_update);
            $image=$request->file('insurance_update');
            $name=$image->getClientOriginalName();
            $uploadPath='assets/dashboard/praceticemanagement/';
            $image->move($uploadPath,$name);
            $imageUrl4=$uploadPath.$name;

            $practive_update->insurance_update = $name;
        }

        if($request->hasFile('voided_check')){
            @unlink($practive_update->voided_check);
            $image=$request->file('voided_check');
            $name=$image->getClientOriginalName();
            $uploadPath='assets/dashboard/praceticemanagement/';
            $image->move($uploadPath,$name);
            $imageUrl5=$uploadPath.$name;

            $practive_update->voided_check = $name;
        }

        if($request->hasFile('eft')){
            @unlink($practive_update->eft);
            $image=$request->file('eft');
            $name=$image->getClientOriginalName();
            $uploadPath='assets/dashboard/praceticemanagement/';
            $image->move($uploadPath,$name);
            $imageUrl6=$uploadPath.$name;

            $practive_update->eft = $name;
        }

        if($request->hasFile('era_forms')){
            @unlink($practive_update->era_forms);
            $image=$request->file('era_forms');
            $name=$image->getClientOriginalName();
            $uploadPath='assets/dashboard/praceticemanagement/';
            $image->move($uploadPath,$name);
            $imageUrl7=$uploadPath.$name;

            $practive_update->era_forms = $name;
        }

        if($request->hasFile('email_updated')){
            @unlink($practive_update->email_updated);
            $image=$request->file('email_updated');
            $name=$image->getClientOriginalName();
            $uploadPath='assets/dashboard/praceticemanagement/';
            $image->move($uploadPath,$name);
            $imageUrl8=$uploadPath.$name;

            $practive_update->email_updated = $name;
        }

        if($request->hasFile('npi_roster')){
            @unlink($practive_update->logo);
            $image=$request->file('npi_roster');
            $name=$image->getClientOriginalName();
            $uploadPath='assets/dashboard/praceticemanagement/';
            $image->move($uploadPath,$name);
            $imageUrl9=$uploadPath.$name;

            $practive_update->npi_roster = $name;
        }

        if($request->hasFile('onboarding_sheet')){
            @unlink($practive_update->logo);
            $image=$request->file('onboarding_sheet');
            $name=$image->getClientOriginalName();
            $uploadPath='assets/dashboard/praceticemanagement/';
            $image->move($uploadPath,$name);
            $imageUrl10=$uploadPath.$name;

            $practive_update->onboarding_sheet = $name;
        }

        if($request->hasFile('w9')){
            @unlink($practive_update->logo);
            $image=$request->file('w9');
            $name=$image->getClientOriginalName();
            $uploadPath='assets/dashboard/praceticemanagement/';
            $image->move($uploadPath,$name);
            $imageUrl11=$uploadPath.$name;

            $practive_update->w9 = $name;
        }


        $practive_update->practice_name = $request->practice_name;
        $practive_update->short_code = $request->short_code;
        $practive_update->practice_tax_id = $request->practice_tax_id;
        $practive_update->practice_address = $request->practice_address;
        $practive_update->billing_address = $request->billing_address;
        $practive_update->sftp_url = $request->sftp_url;
        $practive_update->sfpt_username = $request->sfpt_username;
        $practive_update->sftp_password = $request->sftp_password;
        $practive_update->save();

        $data = $request->practice_npl_edit;
        if ($data){
            for ($i=0;$i<count($data);$i++){
                practice_npl_number::updateOrCreate(['id'=> $request->practice_npl_edit_id[$i],],[
                    'practice_id '=> $practive_update->id,
                    'npl_number' => $data[$i],
                ]);
            }
        }



        $data2 = $request->insurance_code_edit;
        if ($data2){
            for ($i=0;$i<count($data2);$i++){
                practice_insurance_sort_code::updateOrCreate(['id'=> $request->insurance_code_edit_id[$i],],[
                    'practice_id '=> $practive_update->id,
                    'insurance_sort_code' => $data2[$i],
                ]);
            }
        }





        $req = $request->practice_npl;

        if ($req != ""){
            for ($i=0;$i<count($req);$i++){
                $new_prc_ac = new practice_npl_number();
                $new_prc_ac->practice_id = $practive_update->id;
                $new_prc_ac->npl_number = $req[$i];
                $new_prc_ac->save();
            }
        }


        $req2 = $request->insurance_code;

        if ($req2 != ""){
            for ($i=0;$i<count($req2);$i++){
                $new_prc_ac = new practice_insurance_sort_code();
                $new_prc_ac->practice_id = $practive_update->id;
                $new_prc_ac->insurance_sort_code = $req2[$i];
                $new_prc_ac->save();
            }
        }





        return back()->with('success','Practice Updated');
    }


    public function delete_practice(Request $request)
    {
        $prac_del = practice_management::where('id',$request->practice_delete_id)->first();

        $prac_npls = practice_npl_number::where('practice_id',$prac_del->id)->get();

        foreach ($prac_npls as $pacnpl){
            $prac_npl_delete = practice_npl_number::where('id',$pacnpl->id)->delete();
        }

        $prac_insurances = practice_insurance_sort_code::where('practice_id',$prac_del->id)->get();

        foreach ($prac_insurances as $prac_ins){
            $delete_prac_insu_code = practice_insurance_sort_code::where('id',$prac_ins->id)->delete();
        }

        $prac_del->delete();
        return back()->with('success','Practice Successfully Deleted');
    }








}
