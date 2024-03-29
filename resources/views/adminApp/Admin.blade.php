@extends("public.layouts.main")

@section("title_content", "Dashboard Admin App")

@section("page_title" , "Dashboard")

@section("breadcrumb")
<ol class="breadcrumb">
    <li class="breadcrumb-item ">
        Home
    </li>
    <li class="breadcrumb-item active">
        Dashboard
    </li>
</ol>
@endsection

@section('content')
<section class="section dashboard">
    <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">
                
                <!-- Terjual Card -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">
                        
                        {{-- <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>
                                
                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div> --}}
                        
                        <div class="card-body">
                            <h5 class="card-title">Rata-rata Waktu Pengeringan</h5>
                            
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-clock-history"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $avg }}</h6>
                                    <span class="text-success small pt-1 fw-bold">Menit</span> 
                                    {{-- <span class="text-muted small pt-2 ps-1">increase</span> --}}
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div><!-- End Terjual Card -->
                
                <!-- Gabah Kering Card -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card revenue-card">
                        
                        {{-- <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>
                                
                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div> --}}
                        
                        <div class="card-body">
                            <h5 class="card-title">Jenis Gabah yang Dikeringkan</h5>
                            
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class=" bi bi-journal-text bi"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $jenis }}</h6>
                                    <span class="text-success small pt-1 fw-bold">Jenis</span> <span class="text-muted small pt-2 ps-1">gabah</span>
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div><!-- End Gabah Kering Card -->
                
                <!-- Jumlah Gabah Card -->
                <div class="col-xxl-4 col-md-4">
                    
                    <div class="card info-card customers-card">
                        
                        {{-- <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>
                                
                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div> --}}
                        
                        <div class="card-body">
                            <h5 class="card-title">Mitra Gapoktan</h5>
                            
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    
                                    <i class="bi bi-people-fill"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $mitra }}</h6>
                                    <span class="text-danger small pt-1 fw-bold">Gapoktan</span> <span class="text-muted small pt-2 ps-1">terdaftar</span>
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                </div><!-- End Jumlah Gabah Card -->
                
            </div>
        </div>
        
        <!-- Reports -->
        {{-- <div class="col-12">
            <div class="card">
                
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                        </li>
                        
                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                </div>
                
                <div class="card-body">
                    <h5 class="card-title">Reports <span>/Today</span></h5>
                    
                    <!-- Line Chart -->
                    <div id="reportsChart"></div>
                    
                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new ApexCharts(document.querySelector("#reportsChart"), {
                                series: [{
                                    name: 'Sales',
                                    data: [31, 40, 28, 51, 42, 82, 56],
                                }, {
                                    name: 'Revenue',
                                    data: [11, 32, 45, 32, 34, 52, 41]
                                }, {
                                    name: 'Customers',
                                    data: [15, 11, 32, 18, 9, 24, 11]
                                }],
                                chart: {
                                    height: 350,
                                    type: 'area',
                                    toolbar: {
                                        show: false
                                    },
                                },
                                markers: {
                                    size: 4
                                },
                                colors: ['#4154f1', '#2eca6a', '#ff771d'],
                                fill: {
                                    type: "gradient",
                                    gradient: {
                                        shadeIntensity: 1,
                                        opacityFrom: 0.3,
                                        opacityTo: 0.4,
                                        stops: [0, 90, 100]
                                    }
                                },
                                dataLabels: {
                                    enabled: false
                                },
                                stroke: {
                                    curve: 'smooth',
                                    width: 2
                                },
                                xaxis: {
                                    type: 'datetime',
                                    categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                                },
                                tooltip: {
                                    x: {
                                        format: 'dd/MM/yy HH:mm'
                                    },
                                }
                            }).render();
                        });
                    </script>
                    <!-- End Line Chart -->
                    
                </div>
                
            </div>
        </div><!-- End Reports --> --}}
        <!-- End Left side columns -->
        
        <!-- Right side columns -->
        {{-- <div class="col-lg-4">
            
            <!-- Website Traffic -->
            <div class="card">
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                        </li>
                        
                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                </div>
                
                <div class="card-body pb-0">
                    <h5 class="card-title">Website Traffic <span>| Today</span></h5>
                    
                    <div id="trafficChart" style="min-height: 400px;" class="echart"></div>
                    
                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            echarts.init(document.querySelector("#trafficChart")).setOption({
                                tooltip: {
                                    trigger: 'item'
                                },
                                legend: {
                                    top: '5%',
                                    left: 'center'
                                },
                                series: [{
                                    name: 'Access From',
                                    type: 'pie',
                                    radius: ['40%', '70%'],
                                    avoidLabelOverlap: false,
                                    label: {
                                        show: false,
                                        position: 'center'
                                    },
                                    emphasis: {
                                        label: {
                                            show: true,
                                            fontSize: '18',
                                            fontWeight: 'bold'
                                        }
                                    },
                                    labelLine: {
                                        show: false
                                    },
                                    data: [{
                                        value: 1048,
                                        name: 'Search Engine'
                                    },
                                    {
                                        value: 735,
                                        name: 'Direct'
                                    },
                                    {
                                        value: 580,
                                        name: 'Email'
                                    },
                                    {
                                        value: 484,
                                        name: 'Union Ads'
                                    },
                                    {
                                        value: 300,
                                        name: 'Video Ads'
                                    }
                                    ]
                                }]
                            });
                        });
                    </script>
                    
                </div>
            </div><!-- End Website Traffic -->
            
        </div><!-- End Right side columns --> --}}
        
    </div>
</section>
@endsection