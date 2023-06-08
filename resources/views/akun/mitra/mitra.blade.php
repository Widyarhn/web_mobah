@extends("public.layouts.main")

@section("title_content", "Akun Mitra")

@section("page_title", "Akun Mitra")

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
        Data Akun Mitra
    </li>
</ol>
@endsection

@section('content')
<section class="section dashboard">
    <div class="row">
        
        {{-- @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (session()->has('updateGagal'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('updateGagal') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif --}}
        
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Mitra</h5>
                    <div>
                        
                        <a class="btn btn-primary modal-effect mb-3 data-table-btn" data-bs-effect="effect-super-scaled" onclick="create()">
                            <span class="fe fe-plus"> Tambah Akun Baru</span>
                        </a>
                    </div>
                    <br>
                    <table class="table table-striped" id="myTable" data-toggle="table">
                        <thead>
                            <tr>
                                <th class="col-md-1">No</th>
                                <th class="col-md-3">Nama</th>
                                <th class="col-md-2">Username</th>
                                <th class="col-md-4">Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalTambahMitra" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Form</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- START FORM -->
                        <form id="formTambahMitra" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="alert alert-danger d-none"></div>
                        <div class="alert alert-success d-none"></div>
                        
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name='name' id="name">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name='username' id="uname">
                            </div>
                        </div>
                        </form>
                        <!-- AKHIR FORM -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary tombol-tambah">Simpan</button>
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


<script>
    // $(document).ready(function() {
    //     $('#myTable').DataTable({
    //         processing: true,
    //         serverSide: true,
    //         autoWidth: false,
    //         ajax: "{{ url('tambah-mitra/mitra') }}",
    //         columns: [
    //             {
    //                 data: 'DT_RowIndex',
    //                 name: 'DT_RowIndex',
    //                 orderable: false,
    //                 searchable: false
    //             },
    //             {
    //                 data: 'name',
    //                 name: 'Nama'
    //             },
    //             {
    //                 data: 'username',
    //                 name: 'Username'
    //             },
    //             {
    //                 data: 'aksi',
    //                 name: 'Aksi'
    //             }
    //         ]
    //     });

    //     // GLOBAL SETUP 
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });

    //     // 02_PROSES SIMPAN 
    //     $('body').on('click', '.tombol-tambah', function(e) {
    //         e.preventDefault();
    //         $('#exampleModal').modal('show');
    //         $('.tombol-simpan').click(function() {
    //             simpan();
    //         });
    //     });

    //     // 03_PROSES EDIT 
    //     $('body').on('click', '.tombol-edit', function(e) {
    //         var id = $(this).data('id');
    //         $.ajax({
    //             url: 'tambah-mitra/mitra/' + id + '/edit',
    //             type: 'GET',
    //             success: function(response) {
    //                 $('#exampleModal').modal('show');
    //                 $('#name').val(response.result.nama);
    //                 $('#uname').val(response.result.username);
    //                 console.log(response.result);
    //                 $('.tombol-simpan').click(function() {
    //                     simpan(id);
    //                 });
    //             }
    //         });
    //     });

    //     // 04_PROSES Delete 
    //     $('body').on('click', '.tombol-del', function(e) {
    //         Swal.fire({
    //             title: "Yakin ingin menghapus data ini?",
    //             text: "Ketika data terhapus, anda tidak bisa mengembalikan data tersebut!",
    //             icon: "warning",
    //             showCancelButton: true,
    //             confirmButtonColor: "#3085d6",
    //             cancelButtonColor: "#d33",
    //             confirmButtonText: "Ya, Hapus!"
    //         }).then((result) => {
    //             if (result.value) {
    //                 var id = $(this).data('id');
    //                 $.ajax({
    //                     url: 'tambah-mitra/mitra/' + id,
    //                     type: 'DELETE',
    //                     success: function() {
    //                         $('#myTable').DataTable().ajax.reload();
    //                         Swal.fire({
    //                             toast: true,
    //                             position: 'top-end',
    //                             icon: 'success',
    //                             title: 'Data berhasil dihapus',
    //                             showConfirmButton: false,
    //                             timer: 1500
    //                         });
    //                     }
    //                 });
    //             }
    //         });
    //     });

    //     // fungsi simpan dan update
    //     function simpan(id = '') {
    //         if (id == '') {
    //             var var_url = 'tambah-mitra/mitra';
    //             var var_type = 'POST';
    //         } else {
    //             var var_url = 'tambahmitra/mitra/' + id;
    //             var var_type = 'PUT';
    //         }
    //         $.ajax({
    //             url: var_url,
    //             type: var_type,
    //             data: {
    //                 nama: $('#name').val(),
    //                 username: $('#uname').val()
    //             },
    //             success: function(response) {
    //                 if (response.errors) {
    //                     console.log(response.errors);
    //                     $('.alert-danger').removeClass('d-none');
    //                     $('.alert-danger').html("<ul>");
    //                     $.each(response.errors, function(key, value) {
    //                         $('.alert-danger').find('ul').append("<li>" + value +
    //                             "</li>");
    //                     });
    //                     $('.alert-danger').append("</ul>");
    //                 } else {
    //                     $('.alert-success').removeClass('d-none');
    //                     $('.alert-success').html(response.success);
    //                 }
    //                 $('#myTable').DataTable().ajax.reload();
    //             }
    //         });
    //     }

    //     $('#exampleModal').on('hidden.bs.modal', function() {
    //         $('#name').val('');
    //         $('#uname').val('');

    //         $('.alert-danger').addClass('d-none');
    //         $('.alert-danger').html('');

    //         $('.alert-success').addClass('d-none');
    //         $('.alert-success').html('');
    //     });
    // });

    $(document).ready(function() {
        
        table = $("#myTable").DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: "{{ route('tambah-mitra.datatable') }}",
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
                targets: -1,
                render: function(data, type, full, meta) {
                    let btn = `
                    <div class="btn-list">
                        
                        <a href="javascript:void(0)" onclick="edit('${data}')" class="btn btn-sm btn-primary btn-edit"><i class="bi bi-pencil"></i></a>
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
            { data: 'id'}, 
            
            ],
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
            }
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
        $('#form')[0].reset();

        //nama modal
        $('#modalTambahMitra').modal('show');
        
        $('.dropify').dropify();
        $('.modal-title').text('Tambah Data Mitra');
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

