@extends('layouts.SuperAdmin')
@section('superadmin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">General Settings</h4>

                <div class="page-title-right">

                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" novalidate="" action="{{route('super.admin.general.settings.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="validationCustom01">Site Name</label>
                                    <input type="text" class="form-control" name="site_name" value="{{$gen->site_name}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="validationCustom01">Site Email</label>
                                    <input type="text" class="form-control" name="site_email" value="{{$gen->site_email}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="validationCustom01">Site Phone Number</label>
                                    <input type="number" class="form-control" name="site_phone_number" value="{{$gen->site_phone_number}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01">Site Address</label>
                                    <input type="text" class="form-control" name="site_address" value="{{$gen->site_address}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01">Site Under Maintenance</label>
                                    <select class="form-control" name="is_under_maintenance">
                                        <option value="1" {{$gen->is_under_maintenance == 1 ?'selected' : ''}}>On</option>
                                        <option value="2" {{$gen->is_under_maintenance == 2 ?'selected' : ''}}>Off</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="validationCustom01">Site Logo</label>
                                    <br>
                                    <img src="{{asset($gen->logo)}}" style="height: 100px;width: 100px;">
                                    <input type="file" class="form-control" name="logo">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="validationCustom01">Site Icon</label>
                                    <br>
                                    <img src="{{asset($gen->icon)}}" style="height: 100px;width: 100px;">
                                    <input type="file" class="form-control" name="icon">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="validationCustom01">Login Page Image</label>
                                    <br>
                                    <img src="{{asset($gen->login_page_image)}}" style="height: 100px;width: 100px;">
                                    <input type="file" class="form-control" name="login_page_image">
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">Update</button>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->


    </div>

@endsection
