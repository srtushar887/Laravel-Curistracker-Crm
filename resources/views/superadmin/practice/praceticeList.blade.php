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
                        <a href="{{route('super.admin.create.pracetice')}}">
                            <button class="btn btn-success btn-sm" >Create New Practice </button>
                        </a>
                    </h4>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0" id="practicemanagement">
                            <thead style="white-space: nowrap; overflow: hidden; text-overflow:ellipsis;">
                            <tr>
                                <th>Practice Name</th>
                                <th>Practice Short code</th>
                                <th>Practice Tax ID</th>
                                <th>Practice Address</th>
                                <th>Billing Address</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="superadmindeletepractice" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Practice</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('super.admin.delete.practice')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            are you sure to delete this practice ?
                            <input type="hidden" class="practice_delete_id" name="practice_delete_id">
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

        function deleteprac(id) {
            $('.practice_delete_id').val(id);
        }

        $(document).ready(function()
        {
            $('#practicemanagement').DataTable().destroy();
            $('#practicemanagement').DataTable({
                "pageLength": 20,
                "lengthMenu": [[25, 50,75, -1], [25, 50,75, "All"]],
                "processing": true,
                "serverSide": true,
                "bSort": false,
                "responsive": true,
                "ajax": {
                    method: "POST",
                    url: "{{route('super.admin.practice.management.get')}}",
                    data:{
                        '_token' : "{{csrf_token()}}",
                    }
                },
                columns: [
                    { data: 'practice_name', name: 'practice_name',class : 'text-left' },
                    { data: 'short_code', name: 'short_code',class : 'text-left' },
                    { data: 'practice_tax_id', name: 'practice_tax_id',class : 'text-left' },
                    { data: 'practice_address', name: 'practice_address',class : 'text-left' },
                    { data: 'billing_address', name: 'billing_address',class : 'text-left' },
                    {data: 'action', name: 'action', orderable: false, searchable: false,class: 'text-center'},
                ],
            });

        });
    </script>

@endsection
