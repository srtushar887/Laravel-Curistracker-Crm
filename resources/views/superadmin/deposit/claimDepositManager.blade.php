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
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#superadminuploadclaimdepositmanager">Upload Claim Deposit Manager</button>
                        <a href="{{route('super.admin.export.claim.deposit.manager')}}">
                            <button class="btn btn-success btn-sm" >Export Claim Deposit Manager </button>
                        </a>
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#superadmindeleteallclaimdepositmanager">Delete All Claim Deposit Manager</button>
                    </h4>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0" id="claimddepositmanager">
                            <thead style="white-space: nowrap; overflow: hidden; text-overflow:ellipsis;">
                            <tr>
                                <th >PAYER</th>
                                <th >CHECK DATE</th>
                                <th >DEPOSIT CHECK ID</th>
                                <th >AMOUNT</th>
                                <th >FILE NAME</th>
                                <th >CLAIMS</th>
                                <th >NPI</th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="superadminuploadclaimdepositmanager" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Upload Claim Deposit Manager</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('super.admin.import.claim.deposit.manager')}}" method="post" enctype="multipart/form-data">
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

    <div class="modal fade" id="superadmindeleteallclaimdepositmanager" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete All Claim Deposit Manager</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('super.admin.delete.all.claim.deposit.manager')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            are you sure to delete all claim deposit manager data ?
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
            $('#claimddepositmanager').DataTable().destroy();
            $('#claimddepositmanager').DataTable({
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
                    url: "{{route('super.admin.claim.deposit.manager.get')}}",
                    data:{
                        '_token' : "{{csrf_token()}}",
                    }
                },
                columns: [
                    { data: 'payer', name: 'payer',class : 'text-left' },
                    { data: 'check_date_order', name: 'check_date_order',class : 'text-left' },
                    { data: 'deposit_check_id', name: 'deposit_check_id',class : 'text-left' },
                    { data: 'amount', name: 'amount',class : 'text-left' },
                    { data: 'file_name', name: 'file_name',class : 'text-left' },
                    { data: 'claims', name: 'claims',class : 'text-left' },
                    { data: 'npl', name: 'npl',class : 'text-left' },
                ],
            });

        });
    </script>

@endsection
