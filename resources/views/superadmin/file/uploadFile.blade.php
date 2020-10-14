@extends('layouts.SuperAdmin')
@section('css')

@stop
@section('superadmin')
    <div class="row" style="margin-top: -17px;">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="{{route('super.admin.file.manager')}}">
                            <button class="btn btn-success btn-sm" >Go Back</button>
                        </a>
                    </h4>
                    <form action="{{route('super.admin.file.upload.save')}}" method="post" enctype="multipart/form-data" class="dropzone">
                        @csrf
                        <div class="fallback">
                            <input name="file" type="file" multiple="multiple">
                        </div>
                        <div class="dz-message needsclick">
                            <div class="mb-3">
                                <i class="display-4 text-muted ri-upload-cloud-2-line"></i>
                            </div>

                            <h4>Drop files here or click to upload.</h4>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')


    <script>
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone(".dropzone",{
            maxFilesize: 10,  // 10 mb
            acceptedFiles: ".txt",
        });
        myDropzone.on("sending", function(file, xhr, formData) {
            formData.append("_token", CSRF_TOKEN);
        });
    </script>
@stop
