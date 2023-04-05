@extends('public.layouts.main')

@section('title', 'Validator')

@section('css')

@endsection

@section('breadcumb')
<div class="breadcrumb-header justify-content-between">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a   href="javascript:void(0);"></a></li>
                <li class="breadcrumb-item active" aria-current="page">Akun Validator</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 col-md-12">
        <div class="card blog-edit">
            <form id="form" action="{{ route('validator.store') }}" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    <input id="id" name="id" type="hidden" value="">
                    <div class="form-group">
                        <label class="form-label text-dark">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Username</label>
                        <input type="text" name="username" class="form-control" value="{{ old('username') }}" required>
                    </div>
                    <input type="text" name="password" class="form-control" value="{{ old('password') }}" hidden>

                </div>
                <div class="card-footer">
                    <button id="btn-submit" class="btn btn-primary float-end my-2">Create Now</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection



@section('script')
<script src="{{ asset('virtual/assets/js/script.js') }}"></script>

<!-- INTERNAL Select2 js -->
<script src="{{ asset('virtual/assets/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('virtual/assets/js/select2.js') }}"></script>

<!-- INTERNAL Summernote Editor js -->
<script src="{{ asset('virtual/assets/plugins/summernote-editor/summernote1.js') }}"></script>

<!-- FILE UPLOADES JS -->
<script src="{{ asset('virtual/assets/plugins/fileuploads/js/fileupload.js') }}"></script>

<script src="{{ asset('virtual/assets/plugins/select2/js/select2.full.min.js') }}"></script>

<script>
    $(document).ready(function () {
        $('.dropify').dropify();
        // $('#summernote').summernote();


        $('#btn-submit').on('click', function(e) {
            e.preventDefault();
  
            $('#form').submit();
            // if($('#summernote').summernote('isEmpty'))  alert('Sponsors content cannot be null!');
            // else $('#form').submit();
        })

    });
</script>
@endsection