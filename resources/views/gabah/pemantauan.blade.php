@extends("public.layouts.main")

@section("title_content", "Pemantauan")

@section("page_title" , "Pemantauan Gabah")

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
        Pemantauan Gabah
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
                    <div class="card-body">
                        <h5 class="card-title">Pemantauan Gabah dari Alat <span>| Saat ini</span></h5>
                        <div>
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                                + Tambahkan Data Gabah
                            </button>
                            <a href="{{url('/estimasi-gabah')}}" class="btn btn-success btn-sm">
                                Estimasi Gabah
                            </a>
                        </div>
                        <br>
                        <table class="table table-borderless datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Jenis Gabah</th>
                                    <th scope="col">Massa (Kg)</th>
                                    <th scope="col">Suhu (C)</th>
                                    <th scope="col">Kadar Air (%)</th>
                                    <th scope="col">Durasi</th>
                                    <th scope="col">Keterangan</th>
                                    {{-- <th scope="col">Waktu</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pemilik as $p)
                                <tr>
                                    <th>{{ $p->gabah->jenis }}</th>
                                    <td>{{ $p->gabah->berat }}</td>
                                    <td>{{ $p->gabah->suhu1 }}</td>
                                    <td>{{ $p->gabah->kadar_air1 }}</td>
                                    <td>{{ $p->gabah->waktu }}</td>
                                    <td>{{ $p->gabah->klasifikasi }}</td>
                                </tr>
                                @endforeach
                            </tbody>
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
                            <label for="nama"> Nama </label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama">
                        </div>
                        <div class="form-group mb-2">
                            <label for="no_hp"> Nomer Handphone </label>
                            <input type="number" class="form-control" name="no_hp" id="no_hp" placeholder="0" min="1">
                        </div>
                        <div class="form-group mb-2">
                            <label for="alamat"> Alamat </label>
                            <textarea name="alamat" class="form-control" id="alamat" rows="5"></textarea>
                        </div>
                        <div class="form-group mb-2">
                            <label for="berat"> Berat Gabah </label>
                            <input type="text" class="form-control" name="berat" id="berat" placeholder="Masukkan Berat Gabah" >
                        </div>
                        <div class="form-group mb-2">
                            <label for="jenis"> Jenis Gabah </label>
                            <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Masukkan Jenis Gabah" >
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
    
</section>
@endsection

@section("component_js")
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

<script type="text/javascript">
    $(document).ready( function () {
        $('#myTable').DataTable();
    });
</script>


<script>
    $("#formulir-tambah-data").validate({
        rules: {
            nama:"required",
            no_hp: {
                required: true,
                number: true,
                minlength: 12,
                maxlength: 14
            },
            alamat:"required",
            jenis:"required",
            berat:"required"
        },
        messages: {
            nama: "<span class='teks-span'> Nama Tidak Boleh Kosong </span>",
            no_hp:
            {
                required: "<span class='teks-span'> Nomor Telepon Tidak Boleh Kosong </span>",
                number: "<span class='teks-span'> Nomor Telepon Harus menggunakan Angka </span>",
                minlength: "<span class='teks-span'> Nomor Telepon Kurang dari 12 Angka</span>",
                maxlength: "<span class='teks-span'> Nomor Telepon Tidak boleh Lebih dari 14 Angka</span>"
            },
            alamat: "<span class='teks-span'> Alamat Tidak Boleh Kosong </span>",
            jenis: "<span class='teks-span'> Jenis Gabah Tidak Boleh Kosong </span>",
            berat: "<span class='teks-span'> Berat Gabah Tidak Boleh Kosong </span>"
        },
        errorElement: "span"
    });

    
</script>

@endsection