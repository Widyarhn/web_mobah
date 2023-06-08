@extends('public.layouts.main')

@section('title', 'Roadmap')

@section('css')
    {{-- Custom CSS --}}
@endsection

@section('breadcumb')
<!-- PAGE-HEADER Breadcrumbs -->
<div class="breadcrumb-header justify-content-between">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a   href="javascript:void(0);"></a></li>
                <li class="breadcrumb-item active" aria-current="page">Roadmap</li>
            </ol>
        </nav>
    </div>
</div>
<!-- PAGE-HEADER Breadcumbs END -->
@endsection

@section('content')
<!-- Row -->
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Admin</h3>
            </div>
            <div class="card-body">
                <a class="btn btn-primary modal-effect mb-3 data-table-btn ms-4" data-bs-effect="effect-super-scaled" onclick="create()">
                    <span class="fe fe-plus"> </span>Add new data
                </a>
                <table id="datatable" class="table table-bordered text-nowrap border-bottom">
                    <thead>
                        <tr>
                            <th style="width: 5%">No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Image</th>
                            <th>No Hp</th>
                            <th>Alamat</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- COL END -->

    <div class="modal fade" id="modal_form">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Add new data</h6>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                        <form id="form" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="form-group">
                            <input type="hidden" id="id" name="id">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text"  value="" name="nama" class="form-control" id="nama" value="{{ old('nama') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="username" id="username_label" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" id="username" value="{{ old('username') }}">
                            </div>
                        </div>
                        <div class="p-4 border mb-4 form-group">
                            <label class="form-label text-dark">Image</label>
                            <div>
                                <input id="image" class="dropify" type="file" name="image[]" data-max-file-size="2M" data-allowed-file-extensions="jpeg jpg png webp svg" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">No Hp</label>
                                <input type="number" id="no_hp" name="no_hp"value="{{ old('no_hp') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" value="" name="alamat" class="form-control" id="alamat" value="{{ old('alamat') }}">
                            </div>
                        </div>
                    </div>
                </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button  id="btnSave" class="btn btn-primary">Simpan</button>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- End Row -->
@endsection

@section('component_js')

<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/dropify/dist/js/dropify.min.js"></script>

<!-- DATA TABLE JS-->


<!-- INTERNAL Summernote Editor js -->


<script>
    var $table;

    $(document).ready(function() {
        // Contoh Inisiator datatable severside
        table = $("#datatable").DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: "{{ route('tambah-admin.datatable') }}",
            columnDefs: [
            {
                targets: 0,
                render: function(data, type, full, meta) {
                    return (meta.row + 1);
                }
            },
            {
                targets: 3,
                render: function(data, type, full, meta) {
                    return data ? `<img class="img-thumbnail wd-100p wd-sm-200" src="${data}">` : `<img class="img-thumbnail wd-100p wd-sm-200" src="virtual/assets/img/default.png">`;
                }
            },

            {
                targets: 5,
                createdCell: function(td, cellData, rowData, row, col) {
                    $(td).html($(td).text())
                    if($(td).text().length > 150) {
                        let txt = $(td).text()
                        $(td).text(txt.substr(0, 150) + '...')
                    }
                },

            },
            {
                targets: 4,
                createdCell: function(td, cellData, rowData, row, col) {
                    $(td).html($(td).text())
                    if($(td).text().length > 150) {
                        let txt = $(td).text()
                        $(td).text(txt.substr(0, 150) + '...')
                    }
                },

            },
            {
                targets: 5,
                createdCell: function(td, cellData, rowData, row, col) {
                    $(td).html($(td).text())
                    if($(td).text().length > 150) {
                        let txt = $(td).text()
                        $(td).text(txt.substr(0, 150) + '...')
                    }
                },

            },
            {
                targets: 6,
                render: function(data, type, full, meta) {
                    return `
                    <div class="btn-list">
                        <a href="javascript:void(0)" onclick="edit('${data}')" class="btn btn-sm btn-primary modal-effect btn-edit" data-bs-effect="effect-super-scaled"><span class="fe fe-edit"> </span></a>
                        <a href="javascript:void(0)" onclick="destroy('${data}')" class="btn btn-sm btn-danger btn-delete"><span class="fe fe-trash-2"> </span></a>
                    </div>
                    `;
                },
            }, ],
            columns: [
                { data: null },
                { data: 'nama'},
                { data: 'username'},
                { data: 'image'},
                { data: 'no_hp'},
                { data: 'alamat'},
                { data: 'user_id'}, 
            ]
        });

        // $('#btnSave').on('click', function () {
        //     submit();
        // })
        
        $('#form').on('submit', function(e){
            e.preventDefault();

            submit();
        })
   
    });

    function create(){
        submit_method = 'create';

        $('#id').val('');
        $('#form')[0].reset();


        $('#modal_form').modal('show');
         
        $('.dropify').dropify();
        $('.modal-title').text('Add Data Roadmap');
        $('#btnSave').on('click', function(){
            submit();
        })

    }
    
    function edit(id) {
    submit_method = 'edit';
    var url = "{{ route('tambah-admin.edit', ':user_id') }}";
    url = url.replace(':user_id', id);
    
    $.get(url, function (response) {
        var data = response.data;
        console.log(data);
        
        $('#id').val(data.id);
        $('#modal_form').modal('show');
        $('.dropify').dropify();
        $('.modal-title').text('Edit Data Admin');
        $('#nama').val(data.nama);
        $('#username').val(data.username).hide(); 
        $('#username_label').hide();
        $('#image').attr('src', data.image ? data.image : '{{ asset('virtual/assets/img/default.png') }}');
        $('#no_hp').val(data.no_hp);
        $('#alamat').val(data.alamat);
    });
    }


    function submit() {
        var id = $('#id').val();
        var form = $('#form')[0];
        var nama = $('#nama').val();
        var username = $('#username').val();
        var image = $('#image').prop('files')[0];
        var no_hp = $('#no_hp').val();
        var alamat = $('#alamat').val();

        var formData = new FormData(form);
        formData.append('id', id);
        formData.append('nama', nama);
        formData.append('username', username);
        formData.append('image', image);
        formData.append('no_hp', no_hp);
        formData.append('alamat', alamat);

        var url = "{{ route('tambah-admin.store') }}";

        $('#btnSave').text('Menyimpan...');
        $('#btnSave').attr('disabled', true);

        if (submit_method == 'edit') {
            url = "{{ route('tambah-admin.update', ":user_id") }}";
            url = url.replace(':user_id', id);
        }

        $.ajax({
            url: url,
            type: submit_method == 'create' ? 'POST' : 'PUT',
            dataType: 'json',
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            processData: false,
            contentType: false,
            data: formData,
            success: function(data) {
            if (data.status) {
                $('#modal_form').modal('hide');
                Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: data.message,
                showConfirmButton: false,
                timer: 1500
                });
                table.ajax.reload();

                $('#btnSave').text('Simpan');
                $('#btnSave').attr('disabled', false);
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                }
            }

            $('#btnSave').text('Simpan');
            $('#btnSave').attr('disabled', false);
            },
            error: function(data) {
            var error_message = "";

            $.each(data.responseJSON.errors, function(key, value) {
                error_message += value + " ";
            });

            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: 'ERROR!',
                text: error_message,
                showConfirmButton: false,
                timer: 2000
            });
            $('#btnSave').text('Simpan');

            $('#btnSave').attr('disabled', false);
            },
        });
}

    function destroy(id) {
        var url = "{{ route('tambah-admin.destroy',":user_id") }}";
        url = url.replace(':user_id', id);
    
        Swal.fire({
            title: "Yakin ingin menghapus data ini?",
            text: "Ketika data terhapus, anda tidak bisa mengembalikan data tersbut!",
            icon: "warning",
            showCancelButton  : true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor : "#d33",
            confirmButtonText : "Ya, Hapus!"
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url    : url,
                    type   : "delete",
                    data: { 
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        "id":id },
                    dataType: "JSON",
                    success: function(data) {
                        table.ajax.reload();
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: 'Data berhasil dihapus',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                })
            }
        })
    } 
</script>
@endsection