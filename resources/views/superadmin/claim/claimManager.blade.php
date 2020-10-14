@extends('layouts.SuperAdmin')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/autofill/2.3.5/css/autoFill.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css">
@endsection
@section('superadmin')
    <div class="row" style="margin-top: -17px;">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#superadminuploadclaimmanager">Upload Claim Manager</button>
                        <a href="{{route('super.admin.export.claim.manager')}}">
                            <button class="btn btn-success btn-sm" >Export Claim Manager </button>
                        </a>
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#superadmindeleteallclaimmanager">Delete All Claim Manager</button>
                    </h4>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0" id="claimmanager">
                            <thead style="white-space: nowrap; overflow: hidden; text-overflow:ellipsis;">
                            <tr>
                                <th >FILE NAME</th>
                                <th >NPL</th>
                                <th >CHECK DATE</th>
                                <th >PATIENT ID</th>
                                <th >LAST NAME FIRST NAME</th>
                                <th >STATUS</th>
                                <th >PAYER</th>
                                <th>PAYER CLAIM CONTROL NUMBER</th>
                                <th >SVC DATE</th>
                                <th >CPT</th>
                                <th >CHANGE AMOUNT</th>
                                <th >PAYMENT AMOUNT</th>
                                <th >GROUP NAME</th>
                                <th >ADJ AMOUNT</th>
                                <th>TRANSLATED REASON CODE</th>
                                <th >INVOICE DATE</th>
                                <th >INVOICE NAME</th>
                                <th >ISSUE CODE</th>
                                <th >ACTION CODE</th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="superadminuploadclaimmanager" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Upload Claim Manager</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('super.admin.import.claim.manager')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Claim Manager File</label>
                        <input type="file" class="form-control" name="csv_file">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="superadmindeleteallclaimmanager" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete All Claim Manager</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('super.admin.delete.all.claim.manager')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            are you sure to delete all claim manager data ?
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
@section('js')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/autofill/2.3.5/js/dataTables.autoFill.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function()
        {
            $('#claimmanager').DataTable().destroy();
            $('#claimmanager').DataTable({
                "pageLength": 20,
                "lengthMenu": [[25, 50,75, -1], [25, 50,75, "All"]],
                "processing": true,
                "serverSide": true,
                "bSort": false,
                "responsive": true,
                dom: 'Blfrtip',
                buttons: [ 'colvis','csv', 'excel', 'print', { extend: 'pdfHtml5', orientation: 'landscape', pageSize: 'LEGAL' } ],
                "ajax": {
                    method: "POST",
                    url: "{{route('super.admin.claim.manager.get')}}",
                    data:{
                        '_token' : "{{csrf_token()}}",
                    }
                },
                columns: [
                    { data: 'file_name', name: 'file_name',class : 'text-left' },
                    { data: 'npl', name: 'npl',class : 'text-left' },
                    { data: 'check_date', name: 'check_date',class : 'text-left' },
                    { data: 'patient_id', name: 'patient_id',class : 'text-left' },
                    { data: 'last_name_first_name', name: 'last_name_first_name',class : 'text-left' },
                    { data: 'status_1', name: 'status_1',class : 'text-left' },
                    { data: 'payer', name: 'payer',class : 'text-left' },
                    { data: 'payer_claim_control_number', name: 'payer_claim_control_number',class : 'text-left' },
                    { data: 'svc_date', name: 'svc_date',class : 'text-left' },
                    { data: 'cpt', name: 'cpt',class : 'text-left' },
                    { data: 'charge_amount_2', name: 'charge_amount_2',class : 'text-left' },
                    { data: 'payment_amount_2', name: 'payment_amount_2',class : 'text-left' },
                    { data: 'group_name', name: 'group_name',class : 'text-left' },
                    { data: 'adj_amount', name: 'adj_amount',class : 'text-left' },
                    { data: 'translated_reason_code', name: 'translated_reason_code',class : 'text-left' },
                    { data: 'invoice_date', name: 'invoice_date',class : 'text-left' },
                    { data: 'invoice_name', name: 'invoice_name',class : 'text-left' },
                    { data: 'issue_code', name: 'issue_code',class : 'text-left' },
                    { data: 'action_code', name: 'action_code',class : 'text-left' },
                ],
            });

        });
    </script>

@endsection
