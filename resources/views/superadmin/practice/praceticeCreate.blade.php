@extends('layouts.SuperAdmin')
@section('superadmin')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                   <form class="needs-validation"  novalidate="" action="{{route('super.admin.create.pracetice.save')}}" method="post" enctype="multipart/form-data">
                       @csrf
                        <div class="row">

                            <div class="form-group col-md-4">
                                <label>Practice Name</label>
                                <input type="text" id="prac-name1" class="form-control" name="practice_name">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Short code</label>
                                <input type="text" id="prac-name1" class="form-control" name="short_code">
                            </div>

                            <div class="form-group col-md-4">
                                <label>TAX ID</label>
                                <input type="text" class="form-control" name="practice_tax_id">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Practice SOP</label>
                                <input type="file" class="form-control" name="practice_sop">
                            </div>
                            <div class="form-group col-md-4">
                                <label> Rate List</label>
                                <input type="file" class="form-control" name="rate_list">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Auth Sop</label>
                                <input type="file" class="form-control" name="auth_shop">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Insurance Update</label>
                                <input type="file" class="form-control" name="insurance_update">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Voided Check</label>
                                <input type="file" class="form-control" name="voided_check">
                            </div>
                            <div class="form-group col-md-4">
                                <label>EFT</label>
                                <input type="file" class="form-control" name="eft">
                            </div>
                            <div class="form-group col-md-4">
                                <label>ERA Forms</label>
                                <input type="file" class="form-control" name="era_forms">
                            </div>
                            <div class="form-group col-md-4">
                                <label> Email Update</label>
                                <input type="file" class="form-control" name="email_updated">
                            </div>
                            <div class="form-group col-md-4">
                                <label>NPI Roster </label>
                                <input type="file" class="form-control" name="npi_roster">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Onboarding Sheet</label>
                                <input type="file" class="form-control" name="onboarding_sheet">
                            </div>
                            <div class="form-group col-md-6">
                                <label>W9</label>
                                <input type="file" class="form-control" name="w9">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Practice Address</label>
                                <input type="text" id="prac-address1" class="form-control" name="practice_address">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Practice File</label>
                                <input type="file" id="prac-address1" class="form-control" name="practice_file">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Billing Address</label>
                                <textarea type="text" id="bill-address1" class="form-control" name="billing_address"></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Privider Name</label>
                                <textarea type="text" id="bill-address1" class="form-control" name="provider_name"></textarea>
                            </div>


                            <div class="form-group col-md-4">
                                <label>SFTP Url</label>
                                <input type="text" id="prac-address1" class="form-control" name="sftp_url">
                            </div>

                            <div class="form-group col-md-4">
                                <label>SFTP Username</label>
                                <input type="text" id="prac-address1" class="form-control" name="sfpt_username">
                            </div>

                            <div class="form-group col-md-4">
                                <label>SFTP Password</label>
                                <input type="text" id="prac-address1" class="form-control" name="sftp_password">
                            </div>


                            <div class="form-group col-md-10">
                                <label>NPI</label>
                                <input type="text" id="bill-address1" class="form-control" name="practice_npl[]">
                            </div>

                            <div class="form-group col-md-2">
                                <button type="button" id="addtinbtn" class="btn btn-success"  style="margin-top: 28px;">Add New NPL</button>
                            </div>

                            <div class="addNpl"></div>



                            <div class="form-group col-md-10">
                                <label>Insurance Short code</label>
                                <input type="text" id="bill-address1" class="form-control" name="insurance_code[]">
                            </div>

                            <div class="form-group col-md-2">
                                <button type="button" id="addcodetinbtn" class="btn btn-success"  style="margin-top: 28px;">Add New code</button>
                            </div>


                            <div class="addpracticecode">

                            </div>
                            <br>

                        </div>

                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->


    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {

            $('#addcodetinbtn').click(function () {
                $( `
                                    <div class="form-group col-md-12 remdvpcode">
                                        <label>Code</label>
<br>
                                        <input type="text" id="bill-address1" class="form-control" style="width: 83%;float: left;padding: 5px;" name="insurance_code[]">
                                        <button type="button"  class="btn btn-danger removepcode"  style="float: left;margin-left: 31px;">Remove Code</button>
                                    </div>



`).insertBefore('.addpracticecode');

                $('.removepcode').click(function () {
                    console.log('paisi')
                    $(this).closest('.remdvpcode').remove();
                    return false;
                })

            })



            $('#addtinbtn').click(function () {

                $( `
                                    <div class="form-group col-md-12 remdv">
                                        <label>NPI</label>
<br>
                                        <input type="text" id="bill-address1" class="form-control" style="width: 83%;float: left;padding: 5px;" name="practice_npl[]">
                                        <button type="button"  class="btn btn-danger removenpl"  style="float: left;margin-left: 31px;">Remove NPL</button>
                                    </div>



`).insertBefore('.addNpl');

                $('.removenpl').click(function () {
                    console.log('paisi')
                    $(this).closest('.remdv').remove();
                    return false;
                })


            });







        })
    </script>
@stop
