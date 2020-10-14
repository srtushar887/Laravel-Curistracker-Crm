@extends('layouts.SuperAdmin')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

@endsection
@section('superadmin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">All Mis Users</h4>

                <div class="page-title-right">

                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Mis List</h4>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0" id="adminusers">

                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Account Password</th>
                                <th>Account Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>


    <div class="modal fade" id="deletemis" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Admin Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('super.admin.delete.mis')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            are you sure to delete this admin account ?
                            <input type="hidden" class="misdelaccount" name="delete_mis_account">
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

        function delmis(id) {
            $('.misdelaccount').val(id);
        }

        $(document).ready(function () {
            $('#adminusers').DataTable({
                "pageLength": 20,
                "lengthMenu": [[25, 50,75, -1], [25, 50,75, "All"]],
                "processing": true,
                "serverSide": true,
                "bSort": false,
                "responsive": true,
                "ajax": {
                    "type": "GET",
                    "url": "{{route('super.admin.get.all.mis')}}"
                },
                columns: [
                    { data: 'name', name: 'name',class : 'text-left' },
                    { data: 'email', name: 'email',class : 'text-left' },
                    { data: 'phone_number', name: 'phone_number',class : 'text-left' },
                    { data: 'show_pass', name: 'show_pass',class : 'text-left' },
                    {
                        data: 'account_status',
                        render: function(data) {
                            if(data == 1) {
                                return "<div class='badge badge-soft-success font-size-12'>Active</div>";
                            }
                            else {
                                return "<div class='badge badge-soft-danger font-size-12'>Blocked</div>";
                            }

                        },
                        defaultContent: '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0okZSQTV10ebVN9GwLfr45wbCB9tyUK_oFjmRrP9Uo000e9sU" alt="" img style="width:100%; height:100px">'
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
            });
        })
    </script>


@endsection
