@extends("public.layouts.main")

@section("title_content", "Data Gabah")

@section("page_title" , "Data Gabah")

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
        Data Gabah
    </li>
</ol>
@endsection

@section('content')
<section class="section dashboard">
    <div class="row">
        
        <main class="container">
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
            
            <div class="col-6 alert alert-info alert-dismissible fade show" role="alert">
                Klik <b>...</b> untuk memfilter data yang ingin ditampilkan
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            
            <!-- Data Sensor -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                    
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>
                            
                            <li><a class="dropdown-item" href="#">All</a></li>
                            <li><a class="dropdown-item" href="#">Gapoktan</a></li>
                            <li><a class="dropdown-item" href="#">Penyewa</a></li>
                        </ul>
                    </div>
                    
                    <div class="card-body">
                        <h5 class="card-title">Data Gabah <span>| All Data</span></h5>
                        <div>
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                                + Tambahkan Data Gabah
                            </button>
                            {{-- <a href="{{url('/klasifikasi-gabah')}}" class="btn btn-success btn-sm">
                                Klasifikasi Gabah
                            </a> --}}
                        </div>
                        <br>
                        
                        <table class="table table-striped" id="datatable">
                            <thead>
                                <tr>
                                    <th class="col-md-1">No</th>
                                    <th class="col-md-3">Pemilik</th>
                                    <th class="col-md-2">Jenis Gabah</th>
                                    <th class="col-md-1">Berat</th>
                                    <th class="col-md-3">Tanggal</th>
                                    <th class="col-md-4">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    
                </div>
            </div><!-- End Data Sensor -->
            
        </main>
        
    </div>
    
    {{-- Modal Tambah Data --}}
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        <b>Tambah Data Gabah</b> 
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/gabah') }}" method="POST" id="formulir-tambah-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mb-2">
                            <label for="namaC"> Nama </label>
                            <input type="text" class="form-control" name="namaC" id="namaC" placeholder="Masukkan Nama">
                        </div>
                        <div class="form-group mb-2">
                            <label for="no_hpC"> Nomer Handphone </label>
                            <input type="number" class="form-control" name="no_hpC" id="no_hpC" placeholder="0" min="1">
                        </div>
                        <div class="form-group mb-2">
                            <label for="alamatC"> Alamat </label>
                            <textarea name="alamatC" class="form-control" id="alamatC" rows="5"></textarea>
                        </div>
                        <div class="form-group mb-2">
                            <label for="beratC"> Berat Gabah </label>
                            <input type="text" class="form-control" name="beratC" id="beratC" placeholder="Masukkan Berat Gabah" >
                        </div>
                        <div class="form-group mb-2">
                            <label for="jenisC"> Jenis Gabah </label>
                            <input type="text" class="form-control" name="jenisC" id="jenisC" placeholder="Masukkan Jenis Gabah" >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger btn-sm">Kembali</button>
                        <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    {{-- Modal Edit Gabah --}}
    @foreach ($pemilik as $item)
    <div class="modal fade" id="gabahEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        <b>Edit Gabah</b> 
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" id="editFormID">
                    @method('PUT')
                    @csrf
                    
                    <input type="hidden" name="id" id="id" value="{{ $item->id }}">
                    <div class="modal-body">
                        <div class="form-group mb-2">
                            <label for="nama"> Pemilik </label>
                            <input type="text" class="form-control" name="nama" id="nama">
                        </div>
                        <div class="form-group mb-2">
                            <label for="jenis"> Jenis Gabah </label>
                            <input type="text" class="form-control" name="jenis" disabled id="jenis" placeholder="Masukkan jenis"  readonly>
                        </div>
                        <div class="form-group mb-2">
                            <label for="berat"> Berat </label>
                            <input type="text" class="form-control" name="berat" disabled id="berat" placeholder="Masukkan berat"  readonly>
                        </div>
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Kembali</button>
                        <button class="btn btn-primary btn-sm" id="btnSave">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

</section>
@endsection

@section("component_js")
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>



<script>
    $("#formulir-tambah-data").validate({
        rules: {
            namaC:"required",
            no_hpC: {
                required: true,
                number: true,
                minlength: 12,
                maxlength: 14
            },
            alamatC:"required",
            jenisC:"required",
            beratC:"required"
        },
        messages: {
            namaC: "<span class='teks-span'> Nama Tidak Boleh Kosong </span>",
            no_hpC:
            {
                required: "<span class='teks-span'> Nomor Telepon Tidak Boleh Kosong </span>",
                number: "<span class='teks-span'> Nomor Telepon Harus menggunakan Angka </span>",
                minlength: "<span class='teks-span'> Nomor Telepon Kurang dari 12 Angka</span>",
                maxlength: "<span class='teks-span'> Nomor Telepon Tidak boleh Lebih dari 14 Angka</span>"
            },
            alamatC: "<span class='teks-span'> Alamat Tidak Boleh Kosong </span>",
            jenisC: "<span class='teks-span'> Jenis Gabah Tidak Boleh Kosong </span>",
            beratC: "<span class='teks-span'> Berat Gabah Tidak Boleh Kosong </span>"
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
            ajax: "{{ route('data-gabah.datatable') }}",
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
                createdCell: function(td, cellData, rowData, row, col) {
                    if($(td).text().length > 50) {
                        let txt = $(td).text()
                        $(td).text(txt.substr(0, 50) + '...')
                    }
                },
                
            },
            {
                targets: 4,
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
                        <a href="{{ route('data-gabah.show', ':id') }}" class="btn btn-sm btn-secondary"><i class="bi bi-eye"></i></a>
                    </div>
                    `;
                    
                    btn = btn.replace(':id', data);
                    
                    return btn;
                
                },
            }, ],
            columns: [
            { data: null },
            { data: 'nama'},
            { data: 'jenis'},
            { data: 'berat'},
            { data: 'updated_at'},
            { data: 'id'}, 
            
            ],
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
            }
        });

        $('#btnSave').on('click', function(){
            submit();
        })

        $('#editFormID').on('submit', function(e){
            e.preventDefault();

            submit();
        })

    })

    function edit(id){
        submit_method = 'edit';
        

        $('#editFormID')[0].reset();
        var url = "{{ route('data-gabah.edit',":id") }}";
        url = url.replace(':id', id);
        
        $.get(url, function (response) {
            response = response.data;
            console.log(response);
            
            $('#id').val(response.id);
            $('#gabahEditModal').modal('show');
            $('.modal-title').text('Edit Data Gabah');

            $('#nama').val(response.nama);
            $('#jenis').val(response.gabah.jenis);
            $('#berat').val(response.gabah.berat);
        });
    }

    function submit(){
        var id = $('#id').val();
        var nama = $('#nama').val();
        console.log(submit_method);
        console.log("submit");

        if (submit_method == 'edit') {
            url = "{{ route('data-gabah.update', ':id') }}";
            url = url.replace(':id', id);
        }

        $.ajax({
            url: url,
            type: submit_method == 'create' ? 'POST' : 'PUT',
            dataType: 'json',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: id,
                nama: nama
            },
            success: function(data) {
                if (data.status) {
                    $('#gabahEditModal').modal('hide');
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
                }

                $('#btnSave').text('Simpan');
                $('#btnSave').attr('disabled', false);
            },
            error: function(data) {
                var error_message = "";
                error_message += " ";

                $.each(data.responseJSON.errors, function(key, value) {
                    error_message += " " + value + " ";
                });

                error_message += " ";
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
            }
        });
    }

    function destroy(id) {
        var url = "{{ route('data-gabah.destroy',":id") }}";
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
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        id: id
                    },
                    success: function(data) {
                        table.ajax.reload();
                        Swal.fire({
                            toast: false,
                            // position: 'top-end',
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