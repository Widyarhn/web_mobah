@extends("public.layouts.main")

@section("title_content", "Akun Mitra")

@section("page_title" , "Akun Mitra")

@section("component_css")

<link src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link src="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
<style>
    span .teks-span {
        color: red;
        font-size: 12px;
    }
</style>
@endsection

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

    @if (session()->has('success'))
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
    @endif
<div class="col-12">
    <div class="card recent-sales overflow-auto">
        <div class="card-body">
            <h5 class="card-title">Data Akun</h5>
        <div>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                + Tambahkan Akun Mitra
            </button>
        </div>
    <br>
    
    <table class="table table-striped" id="datatable">
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-3">Nama</th>
                <th class="col-md-4">Username</th>
                <th class="col-md-3">Action</th>
            </tr>
        </thead>
    </table>
</div>


{{-- Modal Tambah Data --}}
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    <b>Tambah Akun Mitra</b> 
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/mitra') }}" method="POST" id="tambah-akun">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label for="name"> Nama </label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group mb-2">
                        <label for="username"> Username </label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username" >
                    </div>
                        <input type="password" name="password" id="password" hidden>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">kembali</button>
                    <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
</section>
@endsection


@section("component_js")
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<!-- DATA TABLE JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    $(document).ready( function () {
        $('#myTable').DataTable();
    });
</script>

<script>
    $("#tambah-akun").validate({
        rules: {
            name:"required",
            username:"required"
        },
        messages: {
            name: "<span class='teks-span'> Nama Tidak Boleh Kosong </span>",
            username: "<span class='teks-span'> Username Tidak Boleh Kosong </span>"
        },
        errorElement: "span"
    });

    
</script>

<script>
    var $table;
    
    $(document).ready(function() {
        
        table = $("#datatable").DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: "{{ route('mitra.datatable') }}",
            columnDefs: [
            {
                targets: 0,
                render: function(data, type, full, meta) {
                    return (meta.row + 1);
                }
            }, {
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
                        <a href="{{ route('mitra.edit', ':id') }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
                        <a href="javascript:void(0)" onclick="destroy('${data}')" class="btn btn-sm btn-danger btn-delete"><i class="bi bi-trash"></i></a>
                    </div>
                    `;

                    btn = btn.replace(':id', data);

                    return btn;
                },
            }, ],
            columns: [
                { data: null },
                { data: 'name'},
                { data: 'username'},
                { data: 'id'}, 

            ],
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
            }
        });
    })

    function destroy(id) {
        var url = "{{ route('mitra.destroy',":id") }}";
        url = url.replace(':id', id);
    
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
                    data: { "id":id },
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