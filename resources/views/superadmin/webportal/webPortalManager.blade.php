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
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#superadminuploadwebportalmanager">Upload Web Portal Manager</button>
                        <a href="{{route('super.admin.export.webportal.manager')}}">
                            <button class="btn btn-success btn-sm" >Export Web Portal Manager </button>
                        </a>
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#superadmindeleteallwebportalmanager">Delete All Web Portal Manager</button>
                    </h4>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0" id="webportalmanager">
                            <thead style="white-space: nowrap; overflow: hidden; text-overflow:ellipsis;">
                            <tr>
                                <th >SHORT CODE</th>
                                <th >FACILITY NAME</th>
                                <th >INS NAME</th>
                                <th >STATUS</th>
                                <th>WEB LINK</th>
                                <th >USER NAME</th>
                                <th >PASSWORD</th>
                                <th >SECURITY QUESTION ANSWERS</th>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="superadminuploadwebportalmanager" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Upload Web Portal Manager</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('super.admin.import.webportal.manager')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Web Porta Manager File</label>
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

    <div class="modal fade" id="superadmindeleteallwebportalmanager" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete All Web Portal Manager</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('super.admin.delete.all.webportal.manager')}}" method="post" enctype="multipart/form-data">
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
            $('#webportalmanager').DataTable().destroy();
            $('#webportalmanager').DataTable({
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
                    url: "{{route('super.admin.webportal.manager.get')}}",
                    data:{
                        '_token' : "{{csrf_token()}}",
                    }
                },
                columns: [
                    { data: 'short_code', name: 'short_code',class : 'text-left' },
                    { data: 'facility_name', name: 'facility_name',class : 'text-left' },
                    { data: 'ins_name', name: 'ins_name',class : 'text-left' },
                    { data: 'status', name: 'status',class : 'text-left' },
                    { data: 'web_link', name: 'web_link',class : 'text-left' },
                    { data: 'user_name', name: 'user_name',class : 'text-left' },
                    { data: 'pass_word', name: 'pass_word',class : 'text-left' },
                    { data: 'security_questions_answers', name: 'security_questions_answers',class : 'text-left' },
                ],
            });

        });
    </script>

@endsection
