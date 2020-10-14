@extends('layouts.SuperAdmin')
@section('superadmin')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation"  novalidate="" action="{{route('super.admin.update.pracetice')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="form-group col-md-4">
                                <label>Practice Name</label>
                                <input type="text" id="prac-name1" class="form-control" name="practice_name" value="{{$prac_edit->practice_name}}">
                                <input type="hidden" id="prac-name1" class="form-control" name="practice_edit_id" value="{{$prac_edit->id}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Short code</label>
                                <input type="text" id="prac-name1" class="form-control" name="short_code" value="{{$prac_edit->short_code}}">
                            </div>

                            <div class="form-group col-md-4">
                                <label>TAX ID</label>
                                <input type="text" class="form-control" name="practice_tax_id" value="{{$prac_edit->practice_tax_id}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Practice SOP</label>
                                <br>
                                Location : {{$prac_edit->practice_sop}}
                                <input type="file" class="form-control" name="practice_sop">
                            </div>
                            <div class="form-group col-md-4">
                                <label> Rate List</label>
                                Location : {{$prac_edit->rate_list}}
                                <input type="file" class="form-control" name="rate_list">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Auth Sop</label>
                                Location : {{$prac_edit->auth_shop}}
                                <input type="file" class="form-control" name="auth_shop">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Insurance Update</label>
                                Location : {{$prac_edit->insurance_update}}
                                <input type="file" class="form-control" name="insurance_update">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Voided Check</label>
                                Location : {{$prac_edit->voided_check}}
                                <input type="file" class="form-control" name="voided_check">
                            </div>
                            <div class="form-group col-md-4">
                                <label>EFT</label>
                                Location : {{$prac_edit->eft}}
                                <input type="file" class="form-control" name="eft">
                            </div>
                            <div class="form-group col-md-4">
                                <label>ERA Forms</label>
                                Location : {{$prac_edit->era_forms}}
                                <input type="file" class="form-control" name="era_forms">
                            </div>
                            <div class="form-group col-md-4">
                                <label> Email Update</label>
                                Location : {{$prac_edit->email_updated}}
                                <input type="file" class="form-control" name="email_updated">
                            </div>
                            <div class="form-group col-md-4">
                                <label>NPI Roster </label>
                                Location : {{$prac_edit->npi_roster}}
                                <input type="file" class="form-control" name="npi_roster">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Onboarding Sheet</label>
                                Location : {{$prac_edit->onboarding_sheet}}
                                <input type="file" class="form-control" name="onboarding_sheet">
                            </div>
                            <div class="form-group col-md-6">
                                <label>W9</label>
                                Location : {{$prac_edit->w9}}
                                <input type="file" class="form-control" name="w9">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Practice Address</label>
                                <input type="text" id="prac-address1" class="form-control" name="practice_address" value="{{$prac_edit->practice_address}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Practice File</label>
                                Location : {{$prac_edit->practice_file}}
                                <input type="file" id="prac-address1" class="form-control" name="practice_file">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Billing Address</label>
                                <textarea type="text" id="bill-address1" class="form-control" name="billing_address">{!! $prac_edit->billing_address !!}</textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Privider Name</label>
                                <textarea type="text" id="bill-address1" class="form-control" name="provider_name">{!! $prac_edit->provider_name !!}</textarea>
                            </div>

                            <div class="form-group col-md-4">
                                <label>SFTP Url</label>
                                <input type="text" id="prac-address1" class="form-control" name="sftp_url" value="{{$prac_edit->sftp_url}}">
                            </div>

                            <div class="form-group col-md-4">
                                <label>SFTP Username</label>
                                <input type="text" id="prac-address1" class="form-control" name="sfpt_username" value="{{$prac_edit->sfpt_username}}">
                            </div>

                            <div class="form-group col-md-4">
                                <label>SFTP Password</label>
                                <input type="text" id="prac-address1" class="form-control" name="sftp_password" value="{{$prac_edit->sftp_password}}">
                            </div>







                            <?php
                            $prac_npls = \App\Models\practice_npl_number::where('practice_id',$prac_edit->id)->get()
                            ?>
                            <label style="margin-left: 10px;">NPI  <button type="button" id="addtinbtn"   class="btn btn-success" style="margin-left: 10px;" >Add New NPL</button></label>
                            <br>
                            @if (count($prac_npls) > 0)
                                @foreach($prac_npls as $pracnl)
                                    <div class="form-group col-md-12 remveprcedit">

                                        <input type="text" id="bill-address1" class="form-control" style="width: 83%;float: left;padding: 5px;" name="practice_npl_edit[]" value="{{$pracnl->npl_number}}">
                                        <input type="hidden" class="form-control" name="practice_npl_edit_id[]" value="{{$pracnl->id}}">
                                        <button type="button"  class="btn btn-danger removenplexist" data-id="{{$pracnl->id}}"  style="float: left;margin-left: 31px;">Delete NPL</button>
                                    </div>
                                @endforeach
                            @endif
                            <div class="addNpl"></div>





                            <?php
                            $ins_code = \App\Models\practice_insurance_sort_code::where('practice_id',$prac_edit->id)->get()
                            ?>
                            <label style="margin-left: 10px;">Insurance Code  <button type="button" id="addcodetinbtn"   class="btn btn-success" style="margin-left: 10px;" >Add New code</button></label>
                            <br>
                            @if (count($ins_code) > 0)
                                @foreach($ins_code as $incode)
                                    <div class="form-group col-md-12 remveprcodeedit">

                                        <input type="text" id="bill-address1" class="form-control" style="width: 83%;float: left;padding: 5px;" name="insurance_code_edit[]" value="{{$incode->insurance_sort_code}}">
                                        <input type="hidden" class="form-control" name="insurance_code_edit_id[]" value="{{$incode->id}}">
                                        <button type="button"  class="btn btn-danger removepcodeexist" data-id="{{$incode->id}}"   style="float: left;margin-left: 31px;">Delete Code</button>
                                    </div>
                                @endforeach
                            @endif



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


            $('.removepcodeexist').click(function () {
                var id = $(this).data('id');
                $(this).closest('.remveprcodeedit').remove();
                $.ajax({
                    type : "POST",
                    url: "{{route('super.admin.delete.exist.practicecode')}}",
                    data : {
                        '_token' : "{{csrf_token()}}",
                        'id' : id
                    },
                    success:function(data){

                    }
                });
            })




            //practice npl

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







            $('.removenplexist').click(function () {
                var id = $(this).data('id');
                $(this).closest('.remveprcedit').remove();
                $.ajax({
                    type : "POST",
                    url: "{{route('super.admin.delete.exist.npl')}}",
                    data : {
                        '_token' : "{{csrf_token()}}",
                        'id' : id
                    },
                    success:function(data){

                    }
                });
            })








        })
    </script>
@stop
