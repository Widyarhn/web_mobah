@extends("public.layouts.main")

@section("title_content", "Detail")

@section("page_title" , "Detail")

@section("breadcrumb")
<ol class="breadcrumb">
    <li class="breadcrumb-item ">
        Home
    </li>
    <li class="breadcrumb-item active">
        Detail
    </li>
</ol>
@endsection

@section('content')
<section class="section profile">
    <div class="row">
        <div class="col-xl-12">
            
            <div class="card">
                <div class="card-body pt-3">
                    
                    <ul class="nav nav-tabs nav-tabs-bordered">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#pemilik-overview">Overview</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#list-gabah">Gabah</button>
                        </li>
                    </ul>
                    <div class="tab-content pt-2">
                        
                        <div class="tab-pane fade show active profile-overview" id="pemilik-overview">
                            <h5 class="card-title">Pemilik Details</h5>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Nama</div>
                                <div class="col-lg-9 col-md-8">{{ $gabah->pemilik->nama }}</div>
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Alamat</div>
                                <div class="col-lg-9 col-md-8">{{ $gabah->pemilik->alamat }}</div>
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">No. Handphone</div>
                                <div class="col-lg-9 col-md-8">{{ $gabah->pemilik->no_hp}}</div>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade profile-edit pt-3" id="list-gabah">
                            <div class="col-12">
                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Jenis Gabah</th>
                                            <th scope="col">Massa (Kg)</th>
                                            <th scope="col">Keterangan</th>
                                            <th scope="col">Tanggal</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pemilik as $p)
                                        <tr>
                                            <td>{{ $loop->iteration }}.</td>
                                            <th><a href="" class="text-primary">{{ $p->gabah->jenis }}</a></th>
                                            <td>{{ $p->gabah->berat }}</td>
                                            <td>{{ $p->gabah->klasifikasi }}</td>
                                            <td>{{ $p->gabah->updated_at }}</td>
                                            
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                            
                        </div>
                        
                    </div><!-- End Bordered Tabs -->
                    
                </div>
            </div>
            
        </div>
        
    </div>
</section>

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
            
            <!-- Data Sensor -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                    
                    <div class="card-body">
                        <h5 class="card-title">Data Gabah <span>| {{ $gabah->updated_at }}</span></h5>
                        
                        <br>
                        
                        <table class="table table-striped" id="datatable">
                            <thead>
                                <tr>
                                    <th class="col">No</th>
                                    <th scope="col">Jenis Gabah</th>
                                    <th scope="col">Massa (Kg)</th>
                                    <th scope="col">Suhu (C)</th>
                                    <th scope="col">Kadar Air (%)</th>
                                    <th scope="col">Durasi</th>
                                    <th scope="col">Keterangan</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    
                </div>
            </div><!-- End Data Sensor -->
            
        </main>
        
    </div>
    
</section>
@endsection

@section("component_js")
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

<script>
    var $table;
    
    $(document).ready(function() {
        
        table = $("#datatable").DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: "{{ route('data-gabah.detailtable') }}",
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
                targets: 5,
                createdCell: function(td, cellData, rowData, row, col) {
                    if($(td).text().length > 50) {
                        let txt = $(td).text()
                        $(td).text(txt.substr(0, 50) + '...')
                    }
                },
                
            },
            {
                targets: 6,
                createdCell: function(td, cellData, rowData, row, col) {
                    if($(td).text().length > 50) {
                        let txt = $(td).text()
                        $(td).text(txt.substr(0, 50) + '...')
                    }
                },
                
            },
            
            ],
            columns: [
            { data: null },
            { data: 'gabah.jenis'},
            { data: 'gabah.berat'},
            { data: 'gabah.suhu1'},
            { data: 'gabah.kadar_air1'},
            { data: 'gabah.waktu'},
            { data: 'gabah.klasifikasi'}, 
            
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

</script>

@endsection