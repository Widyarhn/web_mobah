@extends("public.layouts.main")

@section("title_content", "Laporan")

@section("page_title" , "Laporan")
@section("css")
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">

@endsection
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
                    {{-- <div class="text-left">
                        <a class="btn btn-primary" href="{{ url('/laporan/cetak_pdf') }}" target="_blank">Cetak</a>
                    </div> --}}
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
                    <table class="table table-striped table-bordered" id="datatable">
                        <thead>
                            <tr>
                                <th scope="col" style="text-align: center">No</th>
                                <th scope="col" style="text-align: center">Pemilik</th>
                                <th scope="col" style="text-align: center">Jenis Gabah</th>
                                <th scope="col" style="text-align: center">Berat Gabah</th>
                                <th scope="col" style="text-align: center">Klasifikasi</th>
                                <th scope="col" style="text-align: center">Durasi</th>
                                <th scope="col" style="text-align: center">Tanggal</th>
                            </tr>
                        </thead>
                        {{-- <tbody>
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
                        </tbody> --}}
                    </table>
                    <!-- End Table with stripped rows -->
                    
                </div>
            </div>
        </div> 
    </section>
@endsection
@section("component_js")

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.13.4/af-2.5.3/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/fc-4.2.2/fh-3.3.2/r-2.4.1/rg-1.3.1/rr-1.3.3/sc-2.1.1/sb-1.4.2/sp-2.1.2/datatables.min.js"></script>

<script>
    var $table;
    
    $(document).ready(function() {
        
        table = $("#datatable").DataTable({
            dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: "{{ route('laporan.datatable') }}",
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
            { data: 'nama'},
            { data: 'jenis'},
            { data: 'berat'},
            { data: 'klasifikasi'},
            { data: 'waktu'}, 
            { data: 'updated_at'}, 
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
