@extends('layouts.SuperAdmin')
@section('superadmin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Create User Account</h4>

                <div class="page-title-right">

                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" novalidate="" action="{{route('super.admin.create.user.save')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01">User Full Name</label>
                                    <input type="text" class="form-control" name="name" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01">User Email</label>
                                    <input type="text" class="form-control" name="email" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01">User Phone Number</label>
                                    <input type="text" class="form-control" name="phone_number" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01">User Account Password</label>
                                    <input type="text" class="form-control" name="password" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01">User Account Status</label>
                                    <select class="form-control" name="account_status">
                                        <option value="0">select any</option>
                                        <option value="1">Active</option>
                                        <option value="2">Blocked</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01">User Account Type</label>
                                    <select class="form-control" name="account_type">
                                        <option value="0">select any</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Account Manager</option>
                                        <option value="3">Base Staff</option>
                                        <option value="4">Mis</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">Create User</button>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->


    </div>

@endsection
