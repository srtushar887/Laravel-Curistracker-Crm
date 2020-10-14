@extends('layouts.SuperAdmin')
@section('superadmin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Update Account Manager Account</h4>

                <div class="page-title-right">
                    <a href="{{route('super.admin.all.admin')}}">
                        <button class="btn btn-success btn-sm"><i class="fas fa-long-arrow-alt-left"></i> Go Back</button>
                    </a>
                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" novalidate="" action="{{route('super.admin.accountmanager.update')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01">User Full Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$user->name}}">
                                    <input type="hidden" class="form-control" name="edit_id" value="{{$user->id}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01">User Email</label>
                                    <input type="text" class="form-control" name="email" value="{{$user->email}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01">User Phone Number</label>
                                    <input type="text" class="form-control" name="phone_number" value="{{$user->phone_number}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01">User Account Password</label>
                                    <input type="text" class="form-control" name="password" value="{{$user->show_pass}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01">User Account Status</label>
                                    <select class="form-control" name="account_status">
                                        <option value="0">select any</option>
                                        <option value="1" {{$user->account_status == 1 ? 'selected' : ''}}>Active</option>
                                        <option value="2" {{$user->account_status == 2 ? 'selected' : ''}}>Blocked</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01">User Account Type</label>
                                    <select class="form-control" name="account_type">
                                        <option value="2" {{$user->account_type == 2 ? 'selected' : ''}}>Account Manager</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">Update User</button>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->


    </div>

@endsection
