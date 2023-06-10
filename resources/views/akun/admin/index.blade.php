@extends("public.layouts.main")

@section("title_content", "Kelola Admin")

@section("page_title" , "Admin Gapoktan")

@section("breadcrumb")
<ol class="breadcrumb">
    <li class="breadcrumb-item ">
        Home
    </li>
    <li class="breadcrumb-item active">
        Kelola Akun Admin Gapoktan
    </li>
</ol>
@endsection

@section('content')
<section class="section dashboard">
    <!-- Row -->
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                
                <div class="card-body">
                    <h5 class="card-title" style="margin-bottom: 0px;">Data Admin Gapoktan</h5>
                    <div>
                        <a class="btn btn-primary modal-effect mb-3 data-table-btn" data-bs-effect="effect-super-scaled" onclick="create()">
                            <span class="fe fe-plus"> </span>Tambah Data Baru
                        </a>
                    </div>
                    <br>
                    <div class="table-responsive text-nowrap">
                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse;">
                            <thead>
                                <tr>
                                    <th style="width: 5%">No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th style="width: 1%">Image</th>
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
        </div>
        <!-- COL END -->

        <div class="modal fade" id="modal_form">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <b><h5 class="modal-title"></h5></b>
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form id="form" method="POST" enctype="multipart/form-data">
                        
                            @csrf
                            <input type="hidden" name="image_lama" id="image_lama">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        
                                        <div class="mb-3">
                                            <input type="hidden" id="id" name="id">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="text"  name="nama" class="form-control" id="nama" value="{{ old('nama') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="mb-3">
                                            <label for="no_hp" class="form-label">No Hp</label>
                                            <input type="number" id="no_hp" class="form-control" name="no_hp"value="{{ old('no_hp') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" name="username" class="form-control" id="username" value="{{ old('username') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label text-dark">Image</label>
                                        <div class="p-4 border mb-4">
                                            
                                            @if(empty($admin->image))
                                                <input type="file" class="dropify" name="image" id="image" multiple data-max-file-size="2M" data-allowed-file-extensions="jpeg jpg png webp svg" value="{{ old('image') }}">
                                            @else
                                                <img src="{{ url('/storage/'. $admin->image) }}" class="img-fluid gambar-preview mb-3" >
                                                <div class="pt-2">
                                                    <input type="file" class="form-control" name="image" id="images" multiple data-max-file-size="2M" data-allowed-file-extensions="jpeg jpg png webp svg" value="{{ old('image') }}">
                                                </div>
                                            @endif
                                            
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="mb-3 ">
                                            <label for="alamat" class="col-lg-12 form-label">Alamat</label>
                                            <div class="col-lg-12">
                                                <textarea name="alamat" id="alamat" class="form-control" >{{ old('alamat') }}</textarea>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button  id="btnSave" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>  <!-- End Row -->
</section>
@endsection

@section('component_js')

<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/dropify/dist/js/dropify.min.js"></script>

<!-- DATA TABLE JS-->


<!-- INTERNAL Summernote Editor js -->
<script>
    function previewImage() {
        const image = document.querySelector("#image");
        const imgPreview = document.querySelector(".image-preview");
        imgPreview.style.display = "block";
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
            $("#tampilGambar").addClass('mb-3');
            $("#tampilGambar").width("100%");
            $("#tampilGambar").height("300");
        }
    }
</script>
{{-- <script>
    function previewImage2() {
        var input = document.getElementById('image');
        var preview = document.querySelector('.gambar-preview');
    
        if (input.files && input.files[0]) {
            var reader = new FileReader();
    
            reader.onload = function(e) {
                preview.src = e.target.result;
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
</script> --}}

<script>
    var $table;

    $(document).ready(function() {
        // Contoh Inisiator datatable severside
        table = $("#datatable").DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: "{{ route('kelola-admin.datatable') }}",
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
                    var imagePath = full.image;
                    var imageUrl = imagePath ? "{{ url('/storage/') }}/" + imagePath : "/admin/assets/img/default_gambar.png";
                    return `<img class="img-thumbnail wd-50p wd-sm-100" src="${imageUrl}">`;
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
                        <a href="javascript:void(0)" onclick="edit('${data}')" class="btn btn-sm btn-primary modal-effect btn-edit" data-bs-effect="effect-super-scaled"><i class="bi bi-pencil"></i></a>
                        <a href="javascript:void(0)" onclick="destroy('${data}')" class="btn btn-sm btn-danger btn-delete"><i class="bi bi-trash"></i></a>
                    </div>
                    `;

                    btn = btn.replace(':id', data);
                    
                    return btn;
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
        $('.modal-title').text('Tambah Data Admin');
        $('#btnSave').on('click', function(){
            submit();
        })

    }
    
    // function edit(id) {
    //     submit_method = 'edit';
    //     var url = "{{ route('kelola-admin.edit', ':user_id') }}";
    //     url = url.replace(':user_id', id);
        
    //     $.get(url, function (response) {
    //         var data = response.data;
    //         console.log(data);
            
    //         $('#id').val(data.id);
    //         $('#modal_form').modal('show');
    //         $('.dropify').dropify();
    //         $('.modal-title').text('Edit Data Admin');
    //         $('#nama').val(data.nama);
    //         $('#username').val(data.username).hide(); 
    //         $('#username_label').hide();
    //         $('#image').attr('src', data.image ? "{{ url('/storage/') }}/" + data.image : "{{ asset('admin/assets/img/default_gambar.png') }}");
    //         $('#no_hp').val(data.no_hp);
    //         $('#alamat').val(data.alamat);
    //     });
    //     $('#btnSave').on('click', function(){
    //         submit();
    //     })
    // }
    
    function edit(id) {
        submit_method = 'edit';
        var url = "{{ route('kelola-admin.edit', ':user_id') }}";
        url = url.replace(':user_id', id);
        
        $.get(url, function (response) {
            var data = response.data;
            console.log(data);
            
            $('#id').val(data.id);
            $('#modal_form').modal('show');
            $('.dropify').dropify();
            $('.modal-title').text('Edit Data Admin');
            $('#nama').val(data.admin.nama);
            $('#username').val(data.username); 
            // $('#username_label').hide();
            // Tampilkan gambar lama jika ada
            var imageName = data.admin.image;
            if (imageName) {
                var imageUrl = "{{ url('storage') }}/" + imageName;
                $('#image').attr('src', imageUrl);
            } else {
                $('#image').attr('src', "{{ asset('admin/assets/img/default_gambar.png') }}");
            }
            $('#no_hp').val(data.admin.no_hp);
            $('#alamat').val(data.admin.alamat);
            
        });
        
        $('#btnSave').on('click', function(){
            submit();
        })
    }


    // function submit() {
    //     var id = $('#id').val();
    //     var form = $('#form')[0];
    //     var nama = $('#nama').val();
    //     var username = $('#username').val();
    //     var image = $('#image').prop('files')[0];
    //     var no_hp = $('#no_hp').val();
    //     var alamat = $('#alamat').val();

    //     var formData = new FormData(form);
    //     formData.append('id', id);
    //     formData.append('nama', nama);
    //     formData.append('username', username);
    //     formData.append('image', image);
    //     formData.append('no_hp', no_hp);
    //     formData.append('alamat', alamat);

    //     var url = "{{ route('kelola-admin.store') }}";

    //     $('#btnSave').text('Menyimpan...');
    //     $('#btnSave').attr('disabled', true);

    //     if (submit_method == 'edit') {
    //         url = "{{ route('kelola-admin.update', ":user_id") }}";
    //         url = url.replace(':user_id', id);
    //     }

    //     $.ajax({
    //         url: url,
    //         type: submit_method == 'create' ? 'POST' : 'PUT',
    //         dataType: 'json',
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         processData: false,
    //         contentType: false,
    //         data: formData,
    //         success: function(data) {
    //         if (data.status) {
    //             $('#modal_form').modal('hide');
    //             Swal.fire({
    //             toast: false,
    //             // position: 'top-end',
    //             icon: 'success',
    //             title: data.message,
    //             showConfirmButton: false,
    //             timer: 1500
    //             });
    //             table.ajax.reload();

    //             $('#btnSave').text('Simpan');
    //             $('#btnSave').attr('disabled', false);
    //         } else {
    //             for (var i = 0; i < data.inputerror.length; i++) {
    //             $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
    //             $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
    //             }
    //         }

    //         $('#btnSave').text('Simpan');
    //         $('#btnSave').attr('disabled', false);
    //         },
    //         error: function(data) {
    //         var error_message = "";

    //         $.each(data.responseJSON.errors, function(key, value) {
    //             error_message += value + " ";
    //         });

    //         Swal.fire({
    //             toast: true,
    //             position: 'top-end',
    //             icon: 'error',
    //             title: 'ERROR!',
    //             text: error_message,
    //             showConfirmButton: false,
    //             timer: 2000
    //         });
    //         $('#btnSave').text('Simpan');

    //         $('#btnSave').attr('disabled', false);
    //         },
    //     });
    // }

    // function submit() {
    //     var id = $('#id').val();
    //     var form = $('#form')[0];
    //     var nama = $('#nama').val();
    //     var username = $('#username').val();
    //     var image = $('#image').prop('files')[0];
    //     var no_hp = $('#no_hp').val();
    //     var alamat = $('#alamat').val();

    //     var formData = new FormData(form);
    //     formData.append('nama', nama);
    //     formData.append('no_hp', no_hp);
    //     formData.append('alamat', alamat);

    //     var url = "{{ route('kelola-admin.store') }}";
    //     var requestType = 'POST'; // Set default request type to create (POST)
        
    //     console.log(submit_method);
    //     console.log("submit");
        
    //     if (submit_method === 'edit') {
    //         var id = $('#id').val();
    //         url = "{{ route('kelola-admin.update', ':user_id') }}";
    //         url = url.replace(':user_id', id); 
    //         formData.append('_method', 'PUT');
    //         requestType = 'PUT';
    //     }

    //     // Add condition to append username to formData only if input is provided
    //     if (username.trim() !== '') {
    //         formData.append('username', username);
    //     }

    //     // Add condition to append image to formData only if an image is selected
    //     if (image) {
    //         formData.append('image', image);
    //     }

    //     $.ajax({
    //         url: url,
    //         type: requestType,
    //         dataType: 'json',
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         processData: false,
    //         contentType: false,
    //         data: formData,
    //         success: function(data) {
    //             if (data.status) {
    //                 var admin = data.admin;
    //                 console.log("Admin:", admin);
    //                 $('#modal_form').modal('hide');
    //                 Swal.fire({
    //                     toast: false,
    //                     icon: 'success',
    //                     title: data.message,
    //                     showConfirmButton: false,
    //                     timer: 1500
    //                 });
    //                 table.ajax.reload();

    //                 $('#btnSave').text('Simpan');
    //                 $('#btnSave').attr('disabled', false);
    //             } else {
    //                 for (var i = 0; i < data.inputerror.length; i++) {
    //                     $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
    //                     $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
    //                 }

    //                 $('#btnSave').text('Simpan');
    //                 $('#btnSave').attr('disabled', false);
    //             }
    //         },
    //         error: function(data) {
    //             var error_message = "";

    //             $.each(data.responseJSON.errors, function(key, value) {
    //                 error_message += value + " ";
    //             });

    //             Swal.fire({
    //                 toast: true,
    //                 position: 'top-end',
    //                 icon: 'error',
    //                 title: 'ERROR!',
    //                 text: error_message,
    //                 showConfirmButton: false,
    //                 timer: 2000
    //             });

    //             $('#btnSave').text('Simpan');
    //             $('#btnSave').attr('disabled', false);
    //         },
    //     });
    // }

    function submit() {
        var id = $('#id').val();
        var form = $('#form')[0];
        var nama = $('#nama').val();
        var username = $('#username').val();
        var image = $('#image').prop('files')[0];
        var no_hp = $('#no_hp').val();
        var alamat = $('#alamat').val();

        console.log("ID:", id);
        console.log("Nama:", nama);
        console.log("Username:", username);
        console.log("Image:", image);
        console.log("No HP:", no_hp);
        console.log("Alamat:", alamat);

        var formData = new FormData(form);
        formData.append('nama', nama);
        formData.append('no_hp', no_hp);
        formData.append('username', username);
        formData.append('alamat', alamat);

        console.log("FormData:", formData);

        var url = "";

        if (submit_method === 'create') {
            url = "{{ route('kelola-admin.store') }}";
        } else if (submit_method === 'edit') {
            url = "{{ route('kelola-admin.update', ':user_id') }}";
            url = url.replace(':user_id', id);
            formData.append('_method', 'PUT');
        }

        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            processData: false,
            contentType: false,
            data: formData,
            success: function(data) {
                if (data.status) {
                    var admin = data.admin;
                    console.log("Admin:", admin);
                    $('#modal_form').modal('hide');
                    Swal.fire({
                        toast: false,
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

                    $('#btnSave').text('Simpan');
                    $('#btnSave').attr('disabled', false);
                }
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
        var url = "{{ route('kelola-admin.destroy',":user_id") }}";
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