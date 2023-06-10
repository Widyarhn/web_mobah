@extends("public.layouts.main")

@section("title_content", "Kelola Gapoktan")

@section("page_title", "Gapoktan")

{{-- @section("component_css")
<link src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link src="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">

<style>
    span .teks-span {
        color: red;
        font-size: 12px;
    }
</style>
@endsection --}}

@section("breadcrumb")
<ol class="breadcrumb">
    <li class="breadcrumb-item ">
        Home
    </li>
    <li class="breadcrumb-item active">
        Kelola Akun Gapoktan
    </li>
</ol>
@endsection

@section('content')
<section class="section dashboard">
    <div class="row"> 
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Gapoktan</h5>
                    <div>
                        <a class="btn btn-primary modal-effect mb-3 data-table-btn" data-bs-effect="effect-super-scaled" onclick="create()">
                            <span class="fe fe-plus"> Tambah Data Baru</span>
                        </a>
                    </div>
                    <br>
                    <table class="table table-striped" id="myTable" data-toggle="table">
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

        <!-- Modal -->
        
        <div class="modal fade " id="modalTambahMitra">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <b><h5 class="modal-tittle"></h5></b>
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formTambahMitra" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="hidden" id="id" name="id">
                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="text"  value="" name="nama" class="form-control" id="nama" value="{{ old('nama') }}">
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
                                            <label for="username" id="username_label" class="form-label">Username</label>
                                            <input type="text" name="username" class="form-control" id="username" value="{{ old('username') }}">
                                        </div>
                                    </div>
                                    <div clas="form-group">
                                        <label class="form-label text-dark">Image</label>
                                        <div class="p-4 border mb-4">
                                            <input id="image" class="dropify" type="file" name="image[]" data-max-file-size="2M" data-allowed-file-extensions="jpeg jpg png webp svg" />
                                        </div>
                                    </div>
                                    
                                    <div class="form-group ">
                                        <div class="mb-3 ">
                                            <label for="alamat" class="col-lg-12 form-label">Alamat</label>
                                            <div class="col-lg-12">
                                                <textarea name="alamat" id="alamat" class="form-control" ></textarea>
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

    </div>
</section>

@endsection
@section('component_js')
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/dropify/dist/js/dropify.min.js"></script>

<script>
    $(document).ready(function(){
        
        table = $("#myTable").DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: "{{ route('kelola-gapoktan.datatable') }}",
            columnDefs: [
            {
                targets: 0,
                render: function(data, type, full, meta) {
                    return (meta.row + 1);
                }
            },
            {
                targets: 1,
                createdCell: function(td, cellData, rowData, row, col) {
                    if($(td).text().length > 50) {
                        let txt = $(td).text()
                        $(td).text(txt.substr(0, 50) + '...')
                    }
                },
                
            },
            {
                targets: 2,
                createdCell: function(td, cellData, rowData, row, col) {
                    if($(td).text().length > 50) {
                        let txt = $(td).text()
                        $(td).text(txt.substr(0, 50) + '...')
                    }
                },
                
            },
            {
                targets: 3,
                render: function(data, type, full, meta) {
                    return data ? `<img class="img-thumbnail wd-50p wd-sm-100" src="${data}">` : `<img class="img-thumbnail wd-50p wd-sm-100" src="/admin/assets/img/default_gambar.png" >`;
                }
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
                targets: -1,
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

        //nama form di modal
        $('#formTambahMitra').on('submit', function(e){
            e.preventDefault();

            submit();
        })

    })
    function create(){
        submit_method = 'create';

        $('#id').val('');
        $('#formTambahMitra')[0].reset();


        $('#modalTambahMitra').modal('show');
        
        $('.dropify').dropify();
        $('.modal-tittle').text('Tambah Data Akun Mitra');
        $('#btnSave').on('click', function(){
            submit();
        })

    }

    // function edit(id){
    //     submit_method = 'edit';
        

    //     $('#editFormID')[0].reset();
    //     var url = "{{ route('data-gabah.edit',":id") }}";
    //     url = url.replace(':id', id);
        
    //     $.get(url, function (response) {
    //         response = response.data;
    //         console.log(response);
            
    //         $('#id').val(response.id);
    //         $('#gabahEditModal').modal('show');
    //         $('.modal-title').text('Edit Data Gabah');

    //         $('#nama').val(response.nama);
    //         $('#jenis').val(response.gabah.jenis);
    //         $('#berat').val(response.gabah.berat);
    //     });
    // }

    // function submit(){
    //     var id = $('#id').val();
    //     var nama = $('#nama').val();
    //     console.log(submit_method);
    //     console.log("submit");

    //     if (submit_method == 'edit') {
    //         url = "{{ route('data-gabah.update', ':id') }}";
    //         url = url.replace(':id', id);
    //     }

    //     $.ajax({
    //         url: url,
    //         type: submit_method == 'create' ? 'POST' : 'PUT',
    //         dataType: 'json',
    //         data: {
    //             _token: $('meta[name="csrf-token"]').attr('content'),
    //             id: id,
    //             nama: nama
    //         },
    //         success: function(data) {
    //             if (data.status) {
    //                 $('#gabahEditModal').modal('hide');
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
    //             }

    //             $('#btnSave').text('Simpan');
    //             $('#btnSave').attr('disabled', false);
    //         },
    //         error: function(data) {
    //             var error_message = "";
    //             error_message += " ";

    //             $.each(data.responseJSON.errors, function(key, value) {
    //                 error_message += " " + value + " ";
    //             });

    //             error_message += " ";
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
    //         }
    //     });
    // }

    // function destroy(id) {
    //     var url = "{{ route('data-gabah.destroy',":id") }}";
    //     url = url.replace(':id', id);
        
    //     Swal.fire({
    //         title: "Yakin ingin menghapus data ini?",
    //         text: "Ketika data terhapus, anda tidak bisa mengembalikan data tersbut!",
    //         icon: "warning",
    //         showCancelButton  : true,
    //         confirmButtonColor: "#3085d6",
    //         cancelButtonColor : "#d33",
    //         confirmButtonText : "Ya, Hapus!"
    //     }).then((result) => {
    //         if (result.value) {
    //             $.ajax({
    //                 url    : url,
    //                 type   : "delete",
    //                 data: { "id":id },
    //                 dataType: "JSON",
    //                 data: {
    //                     _token: $('meta[name="csrf-token"]').attr('content'),
    //                     id: id
    //                 },
    //                 success: function(data) {
    //                     table.ajax.reload();
    //                     Swal.fire({
    //                         toast: false,
    //                         // position: 'top-end',
    //                         icon: 'success',
    //                         title: 'Data berhasil dihapus',
    //                         showConfirmButton: false,
    //                         timer: 1500
    //                     });
    //                 }
    //             })
    //         }
    //     })
    // } 
</script>

@endsection

