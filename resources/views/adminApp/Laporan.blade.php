@extends("public.layouts.main")

@section("title_content", "Laporan")

@section("page_title" , "Laporan")

@section("breadcrumb")
<ol class="breadcrumb">
    <li class="breadcrumb-item ">
        Home
    </li>
    <li class="breadcrumb-item active">
        Laporan
    </li>
</ol>
@endsection


@section('content')
    <section class="section dashboard">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <div class="text-left">
                        <a class="btn btn-primary" href="{{ url('/laporan/cetak_pdf') }}" target="_blank">Cetak</a>
                    </div>
                    {{-- <br>
                    <div class="row mb-10">
                        <label for="inputDate" class="col-sm-1 col-form-label">Date</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-sm-3">
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-sm-3">
                            <button type="selesai" class="btn btn-secondary" >filter</button>
                        </div>
                    </div> --}}
                    <br>
                    <!-- Table with stripped rows -->
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" style="text-align: center">No</th>
                                <th scope="col" style="text-align: center">Pemilik</th>
                                <th scope="col" style="text-align: center">Jenis Gabah</th>
                                <th scope="col" style="text-align: center">Berat Gabah</th>
                                <th scope="col" style="text-align: center">Klasifikasi</th>
                                <th scope="col" style="text-align: center">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pemilik as $p)
                            @if ($p->gabah->klasifikasi != "NULL")
                            <tr>
                                <td scope="row" style="text-align: center">{{ $loop->iteration }}.</td>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->gabah->jenis }}</td>
                                <td>{{ $p->gabah->berat }}</td>
                                <td>{{ $p->gabah->klasifikasi }}</td>
                                <td>{{ $p->gabah->updated_at }}</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->
                    
                </div>
            </div>
        </div> 
    </section>
@endsection
