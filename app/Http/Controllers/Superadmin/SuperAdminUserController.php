<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\AccountManager;
use App\Models\Admin;
use App\Models\BaseStaff;
use App\Models\Mis;
use Faker\Provider\Base;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class SuperAdminUserController extends Controller
{
    public function create_user()
    {
        return view('superadmin.users.createUser');
    }

    public function create_user_save(Request $request)
    {
        $acc_type = $request->account_type;
        if ($acc_type == 1) {
            $user = new Admin();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->password = Hash::make($request->password);
            $user->show_pass = $request->password;
            $user->account_status = $request->account_status;
            $user->account_type = $request->account_type;
            $user->save();

            return back()->with('success','Admin Account Successfully Created');
        }elseif ($acc_type == 2)
        {
            $user = new AccountManager();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->password = Hash::make($request->password);
            $user->show_pass = $request->password;
            $user->account_status = $request->account_status;
            $user->account_type = $request->account_type;
            $user->save();

            return back()->with('success','Account Manager Account Successfully Created');
        }elseif ($acc_type == 3)
        {
            $user = new BaseStaff();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->password = Hash::make($request->password);
            $user->show_pass = $request->password;
            $user->account_status = $request->account_status;
            $user->account_type = $request->account_type;
            $user->save();

            return back()->with('success','Base Staff Account Successfully Created');
        }elseif ($acc_type == 4)
        {
            $user = new Mis();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->password = Hash::make($request->password);
            $user->show_pass = $request->password;
            $user->account_status = $request->account_status;
            $user->account_type = $request->account_type;
            $user->save();

            return back()->with('success','Mis Account Successfully Created');
        }else{
            return back()->with('alert','Account Type Not Selected');
        }
    }


    public function all_admins()
    {
        return view('superadmin.users.allAdmins');
    }

    public function all_admins_get()
    {
        $users = DB::table('admins')->latest();
        return DataTables::of($users)
            ->addColumn('action',function ($users){
                return ' <a href="'.route('super.admin.edit.admin',$users->id).'"> <i class="fas fa-edit"></i></a> |
                        <i class="far fa-trash-alt" id="'.$users->id .'" onclick="admindel(this.id)" data-toggle="modal" data-target="#admindelete"></i> ';
            })
            ->make(true);
    }


    public function admin_edit($id)
    {
        $user = Admin::where('id',$id)->first();
        return view('superadmin.users.editAdmin',compact('user'));
    }

    public function user_update(Request $request)
    {

            $user =Admin::where('id',$request->edit_id)->first();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->password = Hash::make($request->password);
            $user->show_pass = $request->password;
            $user->account_status = $request->account_status;
            $user->account_type = $request->account_type;
            $user->save();

            return back()->with('success','Admin Account Successfully Updated');

    }


    public function user_delete(Request $request)
    {
        $admin_delete = Admin::where('id',$request->delete_admin_account)->first();
        $admin_delete->delete();
        return back()->with('success','Admin Account Successfully Deleted');
    }


    public function all_account_manager()
    {
        return view('superadmin.users.allAccountManager');
    }

    public function all_account_manager_get()
    {
        $users = DB::table('account_managers')->latest();
        return DataTables::of($users)
            ->addColumn('action',function ($users){
                return ' <a href="'.route('super.admin.edit.accountmanager',$users->id).'"> <i class="fas fa-edit"></i></a> |
                        <i class="far fa-trash-alt" id="'.$users->id .'" onclick="deleaccman(this.id)" data-toggle="modal" data-target="#deleteaccmanager"></i> ';
            })
            ->make(true);
    }

    public function account_manager_edit($id)
    {
        $user = AccountManager::where('id',$id)->first();
        return view('superadmin.users.editAccountManager',compact('user'));
    }

    public function account_manager_update(Request $request)
    {
        $user =AccountManager::where('id',$request->edit_id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->password = Hash::make($request->password);
        $user->show_pass = $request->password;
        $user->account_status = $request->account_status;
        $user->account_type = $request->account_type;
        $user->save();

        return back()->with('success','Account Manager Account Successfully Updated');
    }

    public function account_manager_delete(Request $request)
    {
        $del_acc_man = AccountManager::where('id',$request->delete_accou_manager_account)->first();
        $del_acc_man->delete();
        return back()->with('success','Account Manager Account Successfully Deleted');
    }


    public function all_basestaff()
    {
        return view('superadmin.users.allBaseStaff');
    }

    public function all_basestaff_get()
    {
        $users = DB::table('base_staff')->latest();
        return DataTables::of($users)
            ->addColumn('action',function ($users){
                return ' <a href="'.route('super.admin.edit.basestaff',$users->id).'"> <i class="fas fa-edit"></i></a> |
                        <i class="far fa-trash-alt" id="'.$users->id .'" onclick="deletebasestaf(this.id)" data-toggle="modal" data-target="#deletebasestaff"></i> ';
            })
            ->make(true);
    }

    public function basestaff_edit($id)
    {
        $user = BaseStaff::where('id',$id)->first();
        return view('superadmin.users.editBaseStaff',compact('user'));
    }

    public function basestaff_update(Request $request)
    {
        $user =BaseStaff::where('id',$request->edit_id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->password = Hash::make($request->password);
        $user->show_pass = $request->password;
        $user->account_status = $request->account_status;
        $user->account_type = $request->account_type;
        $user->save();

        return back()->with('success','Base Staff Account Successfully Updated');
    }


    public function basestaff_delete(Request $request)
    {
        $del_base_staff = BaseStaff::where('id',$request->delete_base_staff_account)->first();
        $del_base_staff->delete();
        return back()->with('success','Base Staff Account Successfully Deleted');
    }

    public function all_mis()
    {
        return view('superadmin.users.allMis');
    }

    public function all_mis_get()
    {
        $users = DB::table('mis')->latest();
        return DataTables::of($users)
            ->addColumn('action',function ($users){
                return ' <a href="'.route('super.admin.edit.mis',$users->id).'"> <i class="fas fa-edit"></i></a> |
                        <i class="far fa-trash-alt" id="'.$users->id .'" onclick="delmis(this.id)" data-toggle="modal" data-target="#deletemis"></i> ';
            })
            ->make(true);
    }


    public function mis_edit($id)
    {
        $user = Mis::where('id',$id)->first();
        return view('superadmin.users.editMis',compact('user'));
    }

    public function mis_update(Request $request)
    {
        $user =Mis::where('id',$request->edit_id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->password = Hash::make($request->password);
        $user->show_pass = $request->password;
        $user->account_status = $request->account_status;
        $user->account_type = $request->account_type;
        $user->save();

        return back()->with('success','Mis Account Successfully Updated');
    }


    public function mis_delete(Request $request)
    {
        $mis_del = Mis::where('id',$request->delete_mis_account)->first();
        $mis_del->delete();
        return back()->with('success','Mis Account Successfully Deleted');
    }




















}
