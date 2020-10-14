<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');


Route::prefix('superadmin')->group(function (){
    Route::get('/login', [\App\Http\Controllers\Auth\SuperAdminLoginController::class,'showLoginform'])->name('super.admin.login');
    Route::post('/login', [\App\Http\Controllers\Auth\SuperAdminLoginController::class,'login'])->name('super.admin.login.submit');
    Route::get('/logout', [\App\Http\Controllers\Auth\SuperAdminLoginController::class,'logout'])->name('super.admin.logout');
});


Route::group(['middleware' => ['auth:superadmin']], function() {
    Route::prefix('superadmin')->group(function() {

        Route::get('/', [\App\Http\Controllers\Superadmin\SuperAdminController::class,'index'])->name('super.admin.dashboard');

        //general settings
        Route::get('/general/settings', [\App\Http\Controllers\Superadmin\SuperAdminController::class,'general_settings'])->name('super.admin.general.settings');
        Route::post('/general/settings-update', [\App\Http\Controllers\Superadmin\SuperAdminController::class,'general_settings_update'])->name('super.admin.general.settings.update');

        //user management
        Route::get('/create/user', [\App\Http\Controllers\Superadmin\SuperAdminUserController::class,'create_user'])->name('super.admin.create.user');
        Route::post('/create/user/save', [\App\Http\Controllers\Superadmin\SuperAdminUserController::class,'create_user_save'])->name('super.admin.create.user.save');

        //admin user
        Route::get('/all/admin', [\App\Http\Controllers\Superadmin\SuperAdminUserController::class,'all_admins'])->name('super.admin.all.admin');
        Route::get('/all/admin/get', [\App\Http\Controllers\Superadmin\SuperAdminUserController::class,'all_admins_get'])->name('super.admin.get.all.admin');
        Route::get('/admin/edit/{id}', [\App\Http\Controllers\Superadmin\SuperAdminUserController::class,'admin_edit'])->name('super.admin.edit.admin');
        Route::post('/admin/update', [\App\Http\Controllers\Superadmin\SuperAdminUserController::class,'user_update'])->name('super.admin.admin.update');
        Route::post('/admin/delete', [\App\Http\Controllers\Superadmin\SuperAdminUserController::class,'user_delete'])->name('super.admin.delete.admin');

        //account manager user
        Route::get('/all/accountmanager', [\App\Http\Controllers\Superadmin\SuperAdminUserController::class,'all_account_manager'])->name('super.admin.all.accountmanager');
        Route::get('/all/accountmanager/get', [\App\Http\Controllers\Superadmin\SuperAdminUserController::class,'all_account_manager_get'])->name('super.admin.get.all.accountmanager');
        Route::get('/accountmanager/edit/{id}', [\App\Http\Controllers\Superadmin\SuperAdminUserController::class,'account_manager_edit'])->name('super.admin.edit.accountmanager');
        Route::post('/accountmanager/update', [\App\Http\Controllers\Superadmin\SuperAdminUserController::class,'account_manager_update'])->name('super.admin.accountmanager.update');
        Route::post('/accountmanager/delete', [\App\Http\Controllers\Superadmin\SuperAdminUserController::class,'account_manager_delete'])->name('super.admin.delete.accountmanager');


        //base staff user
        Route::get('/all/basestaff', [\App\Http\Controllers\Superadmin\SuperAdminUserController::class,'all_basestaff'])->name('super.admin.all.basestaff');
        Route::get('/all/basestaff/get', [\App\Http\Controllers\Superadmin\SuperAdminUserController::class,'all_basestaff_get'])->name('super.admin.get.all.basestaff');
        Route::get('/basestaff/edit/{id}', [\App\Http\Controllers\Superadmin\SuperAdminUserController::class,'basestaff_edit'])->name('super.admin.edit.basestaff');
        Route::post('/basestaff/update', [\App\Http\Controllers\Superadmin\SuperAdminUserController::class,'basestaff_update'])->name('super.admin.basestaff.update');
        Route::post('/basestaff/delete', [\App\Http\Controllers\Superadmin\SuperAdminUserController::class,'basestaff_delete'])->name('super.admin.delete.basestaff');

        //mis user
        Route::get('/all/mis', [\App\Http\Controllers\Superadmin\SuperAdminUserController::class,'all_mis'])->name('super.admin.all.mis');
        Route::get('/all/mis/get', [\App\Http\Controllers\Superadmin\SuperAdminUserController::class,'all_mis_get'])->name('super.admin.get.all.mis');
        Route::get('/mis/edit/{id}', [\App\Http\Controllers\Superadmin\SuperAdminUserController::class,'mis_edit'])->name('super.admin.edit.mis');
        Route::post('/mis/update', [\App\Http\Controllers\Superadmin\SuperAdminUserController::class,'mis_update'])->name('super.admin.mis.update');
        Route::post('/mis/delete', [\App\Http\Controllers\Superadmin\SuperAdminUserController::class,'mis_delete'])->name('super.admin.delete.mis');

        //practice management
        Route::get('/pracetice/management', [\App\Http\Controllers\Superadmin\SuperAdminPracticeController::class,'practice_management'])->name('super.admin.practice.management');
        Route::post('/pracetice/management/get', [\App\Http\Controllers\Superadmin\SuperAdminPracticeController::class,'practice_management_get'])->name('super.admin.practice.management.get');
        Route::get('/create/pracetice/', [\App\Http\Controllers\Superadmin\SuperAdminPracticeController::class,'create_practice'])->name('super.admin.create.pracetice');
        Route::post('/create/pracetice/save', [\App\Http\Controllers\Superadmin\SuperAdminPracticeController::class,'create_practice_save'])->name('super.admin.create.pracetice.save');
        Route::get('/edit/pracetice/{id}', [\App\Http\Controllers\Superadmin\SuperAdminPracticeController::class,'edit_practice'])->name('super.admin.edit.pracetice');
        Route::post('/delete/exist/sortcode', [\App\Http\Controllers\Superadmin\SuperAdminPracticeController::class,'delete_exist_sortcode'])->name('super.admin.delete.exist.practicecode');
        Route::post('/delete/exist/npl', [\App\Http\Controllers\Superadmin\SuperAdminPracticeController::class,'delete_exist_npl'])->name('super.admin.delete.exist.npl');
        Route::post('/update/pracetice/', [\App\Http\Controllers\Superadmin\SuperAdminPracticeController::class,'update_practice'])->name('super.admin.update.pracetice');
        Route::post('/delete/pracetice/', [\App\Http\Controllers\Superadmin\SuperAdminPracticeController::class,'delete_practice'])->name('super.admin.delete.practice');

        //claim manager
        Route::get('/claim/manager', [\App\Http\Controllers\Superadmin\SuperAdminClaimManagerController::class,'claim_manager'])->name('super.admin.claim.manager');
        Route::post('/claim/manager/get', [\App\Http\Controllers\Superadmin\SuperAdminClaimManagerController::class,'claim_manager_get'])->name('super.admin.claim.manager.get');
        Route::post('/claim/manager/import', [\App\Http\Controllers\Superadmin\SuperAdminClaimManagerController::class,'claim_manager_import'])->name('super.admin.import.claim.manager');
        Route::get('/claim/manager/export', [\App\Http\Controllers\Superadmin\SuperAdminClaimManagerController::class,'claim_manager_export'])->name('super.admin.export.claim.manager');
        Route::post('/claim/manager/delete/all', [\App\Http\Controllers\Superadmin\SuperAdminClaimManagerController::class,'claim_manager_delete_all'])->name('super.admin.delete.all.claim.manager');


        //deposit manager
        Route::get('/claim/deposit/manager', [\App\Http\Controllers\Superadmin\SuperAdminClaimDepositManagerController::class,'claim_deposit_manager'])->name('super.admin.deposit.manager');
        Route::post('/claim/deposit/manager/get', [\App\Http\Controllers\Superadmin\SuperAdminClaimDepositManagerController::class,'claim_deposit_manager_get'])->name('super.admin.claim.deposit.manager.get');
        Route::post('/claim/deposit/manager/import', [\App\Http\Controllers\Superadmin\SuperAdminClaimDepositManagerController::class,'claim_deposit_manager_import'])->name('super.admin.import.claim.deposit.manager');
        Route::get('/claim/deposit/manager/export', [\App\Http\Controllers\Superadmin\SuperAdminClaimDepositManagerController::class,'claim_deposit_manager_export'])->name('super.admin.export.claim.deposit.manager');
        Route::post('/claim/deposit/manager/delete/all', [\App\Http\Controllers\Superadmin\SuperAdminClaimDepositManagerController::class,'claim_deposit_manager_delete_all'])->name('super.admin.delete.all.claim.deposit.manager');


        //insurance manager
        Route::get('/insurance/manager', [\App\Http\Controllers\Superadmin\SuperAdminInsuranceManagerController::class,'insurance_manager'])->name('super.admin.insurance.manager');
        Route::post('/insurance/manager/get', [\App\Http\Controllers\Superadmin\SuperAdminInsuranceManagerController::class,'insurance_manager_get'])->name('super.admin.insurance.manager.get');
        Route::post('/insurance/manager/import', [\App\Http\Controllers\Superadmin\SuperAdminInsuranceManagerController::class,'insurance_manager_import'])->name('super.admin.import.insurance.manager');
        Route::get('/insurance/manager/export', [\App\Http\Controllers\Superadmin\SuperAdminInsuranceManagerController::class,'insurance_manager_export'])->name('super.admin.export.insurance.manager');
        Route::post('/insurance/manager/delete/all', [\App\Http\Controllers\Superadmin\SuperAdminInsuranceManagerController::class,'insurance_manager_delete_all'])->name('super.admin.delete.all.insurance.manager');


        //web portal manager
        Route::get('/webportal/manager', [\App\Http\Controllers\Superadmin\SuperAdminWebportalManagerController::class,'webportal_manager'])->name('super.admin.webportal.manager');
        Route::post('/webportal/manager/get', [\App\Http\Controllers\Superadmin\SuperAdminWebportalManagerController::class,'webportal_manager_get'])->name('super.admin.webportal.manager.get');
        Route::post('/webportal/manager/import', [\App\Http\Controllers\Superadmin\SuperAdminWebportalManagerController::class,'webportal_manager_import'])->name('super.admin.import.webportal.manager');
        Route::get('/webportal/manager/export', [\App\Http\Controllers\Superadmin\SuperAdminWebportalManagerController::class,'webportal_manager_export'])->name('super.admin.export.webportal.manager');
        Route::post('/webportal/manager/delete/all', [\App\Http\Controllers\Superadmin\SuperAdminWebportalManagerController::class,'webportal_manager_delete_all'])->name('super.admin.delete.all.webportal.manager');


        //zip file manager
        Route::get('/file/manager', [\App\Http\Controllers\Superadmin\SuperAdminFileManagerController::class,'file_manager'])->name('super.admin.file.manager');
        Route::post('/file/manager/get', [\App\Http\Controllers\Superadmin\SuperAdminFileManagerController::class,'file_manager_get'])->name('super.admin.file.manager.get');
        Route::get('/upload/file', [\App\Http\Controllers\Superadmin\SuperAdminFileManagerController::class,'upload_file'])->name('super.admin.upload.file');
        Route::post('/upload/file/save', [\App\Http\Controllers\Superadmin\SuperAdminFileManagerController::class,'upload_file_save'])->name('super.admin.file.upload.save');


        //ar followup manager
        Route::get('/arfollowup/manager', [\App\Http\Controllers\Superadmin\SuperAdminArFollowupManagerController::class,'arfollowup_manager'])->name('super.admin.arfollowup.manager');
        Route::post('/arfollowup/manager/get', [\App\Http\Controllers\Superadmin\SuperAdminArFollowupManagerController::class,'arfollowup_manager_get'])->name('super.admin.arfollowup.manager.get');
        Route::post('/arfollowup/manager/import', [\App\Http\Controllers\Superadmin\SuperAdminArFollowupManagerController::class,'arfollowup_manager_import'])->name('super.admin.import.arfollowup.manager');
        Route::get('/arfollowup/manager/export', [\App\Http\Controllers\Superadmin\SuperAdminArFollowupManagerController::class,'arfollowup_manager_export'])->name('super.admin.export.arfollowup.manager');
        Route::post('/arfollowup/manager/delete/all', [\App\Http\Controllers\Superadmin\SuperAdminArFollowupManagerController::class,'arfollowup_manager_delete_all'])->name('super.admin.delete.all.arfollowup.manager');








    });
});
