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
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#superadminuploadinsurancemanager">Upload Insurance Manager</button>
                        <a href="{{route('super.admin.export.insurance.manager')}}">
                            <button class="btn btn-success btn-sm" >Export Insurance Manager </button>
                        </a>
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#superadmindeleteallinsurancemanager">Delete All Insurance Manager</button>
                    </h4>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0" id="insurancemanager">
                            <thead style="white-space: nowrap; overflow: hidden; text-overflow:ellipsis;">
                            <tr>
                                <th >SHORT CODE</th>
                                <th >INSURANCE NAME</th>
                                <th >INSURANCE NO</th>
                                <th >FACSIMILE NO</th>
                                <th >PAYER_ID</th>
                                <th >TFL_DAYS</th>
                                <th >APPEAL_LIMIT</th>
                                <th >MAILING_ADDRESS </th>
                                <th >CUSTOM 1</th>
                                <th >CUSTOM 2</th>
                                <th >CUSTOM 3</th>
                                <th >CUSTOM 4</th>
                                <th >CUSTOM 5</th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="superadminuploadinsurancemanager" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Upload Insurance Manager</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('super.admin.import.insurance.manager')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Insurance Manager File</label>
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

    <div class="modal fade" id="superadmindeleteallinsurancemanager" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete All Insurance Manager</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('super.admin.delete.all.insurance.manager')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            are you sure to delete all insurance manager data ?
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
            $('#insurancemanager').DataTable().destroy();
            $('#insurancemanager').DataTable({
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
                    url: "{{route('super.admin.insurance.manager.get')}}",
                    data:{
                        '_token' : "{{csrf_token()}}",
                    }
                },
                columns: [
                    { data: 'short_code', name: 'short_code',class : 'text-left' },
                    { data: 'insurance_name', name: 'insurance_name',class : 'text-left' },
                    { data: 'insurance_no', name: 'insurance_no',class : 'text-left' },
                    { data: 'facsimile_no', name: 'facsimile_no',class : 'text-left' },
                    { data: 'payer_id', name: 'payer_id',class : 'text-left' },
                    { data: 'tfl_days', name: 'tfl_days',class : 'text-left' },
                    { data: 'appeal_limit', name: 'appeal_limit',class : 'text-left' },
                    { data: 'mailing_address', name: 'mailing_address',class : 'text-left' },
                    { data: 'custom_1', name: 'custom_1',class : 'text-left' },
                    { data: 'custom_2', name: 'custom_2',class : 'text-left' },
                    { data: 'custom_3', name: 'custom_3',class : 'text-left' },
                    { data: 'custom_4', name: 'custom_4',class : 'text-left' },
                    { data: 'custom_5', name: 'custom_5',class : 'text-left' },
                ],
            });

        });
    </script>

@endsection
