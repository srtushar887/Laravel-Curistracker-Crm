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
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#superadminuploadarfollowupmanager">Upload Ar Followup Manager</button>
                        <a href="{{route('super.admin.export.arfollowup.manager')}}">
                            <button class="btn btn-success btn-sm" >Export Ar Followup Manager </button>
                        </a>
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#superadmindeleteallarfollowupmanager">Delete All Ar Followup Manager</button>
                    </h4>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0" id="arfollowupmanager">
                            <thead style="white-space: nowrap; overflow: hidden; text-overflow:ellipsis;">
                            <tr>
                                <th >Short Code</th>
                                <th >Status</th>
                                <th >FileID</th>
                                <th >PayerID</th>
                                <th >ClaimID</th>
                                <th >FIRST</th>
                                <th > LAST</th>
                                <th >PatAcctNum</th>
                                <th >FromDOS</th>
                                <th >ToDos</th>
                                <th >TotalCharge</th>
                                <th >MasterVendor</th>
                                <th >StateLicenseID</th>
                                <th >PrintClaim</th>
                                <th >InsuredID</th>
                                <th >ReceivedDate</th>
                                <th ErrorDescription</th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="superadminuploadarfollowupmanager" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Upload Ar Followup Manager</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('super.admin.import.arfollowup.manager')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Ar Followup Manager File</label>
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

    <div class="modal fade" id="superadmindeleteallarfollowupmanager" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete All Ar Followup Manager</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('super.admin.delete.all.arfollowup.manager')}}" method="post" enctype="multipart/form-data">
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
            $('#arfollowupmanager').DataTable().destroy();
            $('#arfollowupmanager').DataTable({
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
                    url: "{{route('super.admin.arfollowup.manager.get')}}",
                    data:{
                        '_token' : "{{csrf_token()}}",
                    }
                },
                columns: [
                    { data: 'short_code', name: 'short_code',class : 'text-left' },
                    { data: 'status', name: 'status',class : 'text-left' },
                    { data: 'fileid', name: 'fileid',class : 'text-left' },
                    { data: 'payerid', name: 'payerid',class : 'text-left' },
                    { data: 'claimid', name: 'claimid',class : 'text-left' },
                    { data: 'first', name: 'first',class : 'text-left' },
                    { data: 'last', name: 'last',class : 'text-left' },
                    { data: 'patacctnum', name: 'patacctnum',class : 'text-left' },
                    { data: 'fromdos', name: 'fromdos',class : 'text-left' },
                    { data: 'todos', name: 'todos',class : 'text-left' },
                    { data: 'totalcharge', name: 'totalcharge',class : 'text-left' },
                    { data: 'mastervendor', name: 'mastervendor',class : 'text-left' },
                    { data: 'statelicenseid', name: 'statelicenseid',class : 'text-left' },
                    { data: 'printclaim', name: 'printclaim',class : 'text-left' },
                    { data: 'insuredid', name: 'insuredid',class : 'text-left' },
                    { data: 'receiveddate', name: 'receiveddate',class : 'text-left' },
                    { data: 'errordescription', name: 'errordescription',class : 'text-left' },
                ],
            });

        });
    </script>

@endsection
