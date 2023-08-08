<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ env("APP_NAME") }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fontawesome.com/icons" />
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Jost:wght@500;600;700&display=swap" rel="stylesheet"> 
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/af-2.5.3/fc-4.2.2/fh-3.3.2/r-2.4.1/rg-1.3.1/rr-1.3.3/sc-2.1.1/sb-1.4.2/sp-2.1.2/datatables.min.css" rel="stylesheet"/>

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('fitapp') }}/lib/animate/animate.min.css" rel="stylesheet">
    <link href="{{ asset('fitapp') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('fitapp') }}/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('fitapp') }}/css/style.css" rel="stylesheet">
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="51" style="color:black">
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0" id="home">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="m-0">IoT TaniKula</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto py-0">
                        <a href="#home" class="nav-item nav-link active">Home</a>
                        <a href="#about" class="nav-item nav-link">About</a>
                        <a href="#partnership" class="nav-item nav-link">Partnership</a>
                        <a href="#data-gabah" class="nav-item nav-link">Data Gabah</a>
                    </div>
                    <a href="#app" class="btn btn-primary-gradient rounded-pill py-2 px-4 ms-3 d-none d-lg-block">Download Aplikasi?</a>
                </div>
            </nav>

            <div class="container-xxl bg-primary hero-header">
                <div class="container px-lg-5">
                    <div class="row g-5">
                        <div class="col-lg-8 text-center text-lg-start">
                            <h1 class="text-white mb-4 animated slideInDown">Selamat Datang di Website IoT TaniKula</h1>
                            <p class="text-white pb-3 animated slideInDown">
                                Mang-Daib merupakan aplikasi web dan mobile Pemantau Tingkat Kadar Air Gabah.
                            </p>
                            <a href="/login" class="btn btn-primary-gradient py-sm-3 px-4 px-sm-5 rounded-pill me-3 animated slideInLeft">Log In</a>
                            <a href="#about" class="btn btn-secondary-gradient py-sm-3 px-4 px-sm-5 rounded-pill animated slideInRight">Read More</a>
                        </div>
                        <div class="col-lg-4 d-flex justify-content-center justify-content-lg-end wow fadeInUp" data-wow-delay="0.3s">
                            <div class="owl-carousel screenshot-carousel">
                                <img class="img-fluid" src="{{ asset('fitapp') }}/img/halut.jpeg" alt="">
                                <img class="img-fluid" src="{{ asset('fitapp') }}/img/login.jpeg" alt="">
                                <img class="img-fluid" src="{{ asset('fitapp') }}/img/datagabah.jpeg" alt="">
                                <img class="img-fluid" src="{{ asset('fitapp') }}/img/prediksi.jpeg" alt="">
                                {{-- <img class="img-fluid" src="{{ asset('fitapp') }}/img/screenshot-5.png" alt=""> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- About Start -->
        <div class="container-xxl py-5" id="about">
            <div class="container py-5 px-lg-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <h5 class="text-primary-gradient fw-medium">About App</h5>
                        <h1 class="mb-4">#1 App For Monitor Grain Moisture Levels</h1>
                        <p class="mb-4">Aplikasi ini digunakan untuk memantau tingkat kadar air gabah para petani.</p>
                        <div class="row g-4 mb-4">
                            {{-- <div class="col-sm-6 wow fadeIn" data-wow-delay="0.5s">
                                <div class="d-flex">
                                    <i class="fa fa-cogs fa-2x text-primary-gradient flex-shrink-0 mt-1"></i>
                                    <div class="ms-3">
                                        <h2 class="mb-0" data-toggle="counter-up">1234</h2>
                                        <p class="text-primary-gradient mb-0">Active Install</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.7s">
                                <div class="d-flex">
                                    <i class="fa fa-comments fa-2x text-secondary-gradient flex-shrink-0 mt-1"></i>
                                    <div class="ms-3">
                                        <h2 class="mb-0" data-toggle="counter-up">1234</h2>
                                        <p class="text-secondary-gradient mb-0">Clients Reviews</p>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <h1 class="mb-4">#2 App For Store Grain Data</h1>
                        <p class="mb-4">Aplikasi ini digunakan untuk menyimpan data gabah agar memudahkan pendataan gabah bagi kelompok tani.</p>
                        {{-- <a href="" class="btn btn-primary-gradient py-sm-3 px-4 px-sm-5 rounded-pill mt-3">Read More</a> --}}
                    </div>
                    <div class="col-lg-6">
                        <img class="img-fluid wow fadeInUp" data-wow-delay="0.5s" src="{{ asset('fitapp') }}/img/ss.png">
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Partnership Start -->
        <div class="container-xxl py-5" id="partnership">
            <div class="container py-5 px-lg-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <img class="img-fluid wow fadeInUp" data-wow-delay="0.1s" src="{{ asset('fitapp') }}/img/ss.png">
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                        <h5 class="text-primary-gradient fw-medium">Partnership</h5>
                        <h1 class="mb-4">Gapoktan Sri Makmur III</h1>
                        <p class="mb-4">Gabungan Kelompok Tani (Gapoktan) Sri Makmur berlokasi di Desa Krasak Kecamatan Jatibarang Kabupaten Indramayu. </p>
                        
                    </div>
                </div>
            </div>
            
        </div>
        
        <!-- Partnership End -->


        <!-- Product Start -->
        <div class="container-xxl py-5" id="app">
            <div class="container py-5 px-lg-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                        <h5 class="text-primary-gradient fw-medium">Screenshots App</h5>
                        <h1 class="mb-4">User Friendly interface And Very Easy To Use IoT TaniKula App</h1>
                        <p class="mb-4">Mudah digunakan dengan tampilan yang menarik. Aplikasi IoT TaniKula bertujuan:</p>
                        <p><i class="fa fa-check text-primary-gradient me-3"></i>Untuk memudahkan Gapoktan mengelola data gabah</p>
                        <p><i class="fa fa-check text-primary-gradient me-3"></i>Untuk memantau tingkat kadar air pada gabah</p>
                        <a href="#steps" class="btn btn-primary-gradient py-sm-3 px-4 px-sm-5 rounded-pill mt-3"><h5 class="text-white mb-0">How to Use?</h5></a>
                        <a href="#steps" class="btn btn-primary-gradient py-sm-3 px-4 px-sm-5 rounded-pill mt-3">
                            <h5 class="text-white mb-0">Download App</h5>
                        </a>
                        
                    </div>
                    <div class="col-lg-4 d-flex justify-content-center justify-content-lg-end wow fadeInUp" data-wow-delay="0.3s">
                        <div class="owl-carousel screenshot-carousel">
                            <img class="img-fluid" src="{{ asset('fitapp') }}/img/halut.jpeg" alt="">
                            <img class="img-fluid" src="{{ asset('fitapp') }}/img/login.jpeg" alt="">
                            <img class="img-fluid" src="{{ asset('fitapp') }}/img/datagabah.jpeg" alt="">
                            <img class="img-fluid" src="{{ asset('fitapp') }}/img/prediksi.jpeg" alt="">
                            {{-- <img class="img-fluid" src="{{ asset('fitapp') }}/img/screenshot-5.png" alt=""> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product End -->


        <!-- Process Start -->
        <div class="container-xxl py-5" id="steps">
            <div class="container py-5 px-lg-5">
                
                <div class="text-center pb-4 wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="text-primary-gradient fw-medium">How to Use?</h5>
                    <h1 class="mb-5">3 Easy Step</h1>
                </div>
                <div class="row gy-5 gx-4 justify-content-center">
                    <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="position-relative bg-light rounded pt-5 pb-4 px-4">
                            <div class="d-inline-flex align-items-center justify-content-center bg-primary-gradient rounded-circle position-absolute top-0 start-50 translate-middle shadow" style="width: 100px; height: 100px;">
                                <i class="fa fa-cog fa-3x text-white"></i>
                            </div>
                            <h5 class="mt-4 mb-3">Install the App</h5>
                            <p class="mb-0">Tempor erat elitr rebum clita dolor diam ipsum sit diam amet diam eos erat ipsum et lorem et sit sed stet</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="position-relative bg-light rounded pt-5 pb-4 px-4">
                            <div class="d-inline-flex align-items-center justify-content-center bg-secondary-gradient rounded-circle position-absolute top-0 start-50 translate-middle shadow" style="width: 100px; height: 100px;">
                                <i class="fa fa-address-card fa-3x text-white"></i>
                            </div>
                            <h5 class="mt-4 mb-3">Setup Your Profile</h5>
                            <p class="mb-0">Tempor erat elitr rebum clita dolor diam ipsum sit diam amet diam eos erat ipsum et lorem et sit sed stet</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="position-relative bg-light rounded pt-5 pb-4 px-4">
                            <div class="d-inline-flex align-items-center justify-content-center bg-primary-gradient rounded-circle position-absolute top-0 start-50 translate-middle shadow" style="width: 100px; height: 100px;">
                                <i class="fa fa-check fa-3x text-white"></i>
                            </div>
                            <h5 class="mt-4 mb-3">Enjoy The Features</h5>
                            <p class="mb-0">Tempor erat elitr rebum clita dolor diam ipsum sit diam amet diam eos erat ipsum et lorem et sit sed stet</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Process Start -->


        <!-- Download Start -->
        {{-- <div class="container-xxl py-5">
            <div class="container py-5 px-lg-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <img class="img-fluid wow fadeInUp" data-wow-delay="0.1s" src="{{ asset('fitapp') }}/img/about.png">
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                        <h5 class="text-primary-gradient fw-medium">Download</h5>
                        <h1 class="mb-4">Download The Latest Version Of Our App</h1>
                        <p class="mb-4">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit clita duo justo eirmod magna dolore erat amet</p>
                        <div class="row g-4">
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.5s">
                                <a href="" class="d-flex bg-primary-gradient rounded py-3 px-4">
                                    <i class="fab fa-apple fa-3x text-white flex-shrink-0"></i>
                                    <div class="ms-3">
                                        <p class="text-white mb-0">Available On</p>
                                        <h5 class="text-white mb-0">App Store</h5>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.7s">
                                <a href="" class="d-flex bg-secondary-gradient rounded py-3 px-4">
                                    <i class="fab fa-android fa-3x text-white flex-shrink-0"></i>
                                    <div class="ms-3">
                                        <p class="text-white mb-0">Available On</p>
                                        <h5 class="text-white mb-0">Play Store</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Download End -->


        <!-- Pricing Start -->
        
        <!-- Pricing End -->

        <!-- Data Gabah Start -->
        <div class="container-xxl py-5" id="data-gabah">
            <div class="container py-5 px-lg-5">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="text-primary-gradient fw-medium">Data Gabah</h5>
                    <h1 class="mb-5">Pilih Data Gabah</h1>
                </div>
                <div class="tab-class text-center pricing wow fadeInUp" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-center bg-primary-gradient rounded-pill mb-5">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="pill" href="#tab-1">Gabah Kering</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="pill" href="#tab-2">Gabah Basah</button>
                        </li>
                    </ul>
                    <div class="tab-content text-start">
                        @include('lp.dataGabah')
                    </div>
                </div>
            </div>
        </div>
        <!-- Data Gabah End -->


        <!-- Contact Start -->
        {{-- <div class="container-xxl py-5" id="contact">
            <div class="container py-5 px-lg-5">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="text-primary-gradient fw-medium">Contact Us</h5>
                    <h1 class="mb-5">Get In Touch!</h1>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="wow fadeInUp" data-wow-delay="0.3s">
                            <p class="text-center mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p>
                            <form>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" placeholder="Your Name">
                                            <label for="name">Your Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" placeholder="Your Email">
                                            <label for="email">Your Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="subject" placeholder="Subject">
                                            <label for="subject">Subject</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                            <label for="message">Message</label>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button class="btn btn-primary-gradient rounded-pill py-3 px-5" type="submit">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Contact End -->
        

        <!-- Footer Start -->
        <div class="container-fluid bg-primary text-light footer wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5 px-lg-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-3">
                        <h4 class="text-white mb-4">Address</h4>
                        <p><i class="fa fa-map-marker-alt me-3"></i>Indramayu, Jawa Barat</p>
                        <p><i class="fa fa-phone-alt me-3"></i>Telp. (0234) 5746464</p>
                        <p><i class="fa fa-envelope me-3"></i>info@IoT TaniKula.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h4 class="text-white mb-4">Quick Link</h4>
                        <a class="btn btn-link" href="#about">About App</a>
                        {{-- <a class="btn btn-link" href="">Contact Us</a> --}}
                        <a class="btn btn-link" href="#partnership">Partnership</a>
                        <a class="btn btn-link" href="#data-gabah">Data Gabah</a>
                        <a class="btn btn-link" href="#app">Download Aplikasi</a>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h4 class="text-white mb-4">Popular Link</h4>
                        <a class="btn btn-link" href="">About Us</a>
                        <a class="btn btn-link" href="#steps">How to Use</a>
                        {{-- <a class="btn btn-link" href="">Privacy Policy</a>
                        <a class="btn btn-link" href="">Terms & Condition</a>
                        <a class="btn btn-link" href="">Career</a> --}}
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h4 class="text-white mb-4">Newsletter</h4>
                        <p>Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulpu</p>
                        <div class="position-relative w-100 mt-3">
                            <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text" placeholder="Your Email" style="height: 48px;">
                            <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i class="fa fa-paper-plane text-primary-gradient fs-4"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container px-lg-5">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="">IoT TaniKula</a>, All Right Reserved. 
							
							<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
							Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                            </br>
                            Distributed By <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                {{-- <a href="">Cookies</a> --}}
                                <a href="">Help</a>
                                {{-- <a href="">FQAs</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#home" class="btn btn-lg btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up text-white"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    {{-- <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    --}}

    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/af-2.5.3/fc-4.2.2/fh-3.3.2/r-2.4.1/rg-1.3.1/rr-1.3.3/sc-2.1.1/sb-1.4.2/sp-2.1.2/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('fitapp') }}/lib/wow/wow.min.js"></script>
    <script src="{{ asset('fitapp') }}/lib/easing/easing.min.js"></script>
    <script src="{{ asset('fitapp') }}/lib/waypoints/waypoints.min.js"></script>
    <script src="{{ asset('fitapp') }}/lib/counterup/counterup.min.js"></script>
    <script src="{{ asset('fitapp') }}/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('fitapp') }}/js/main.js"></script>

    <script type="text/javascript">
        $(document).ready( function () {
            $('#myTable').DataTable();
        });
    </script>
    <script>
        var $table;
        
        $(document).ready(function() {
            
            table = $("#dataGabah").DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: true,
                ajax: "{{ route('gabah-landing.datatable') }}",
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
                {
                    targets: 7,
                    createdCell: function(td, cellData, rowData, row, col) {
                        if($(td).text().length > 50) {
                            let txt = $(td).text()
                            $(td).text(txt.substr(0, 50) + '...')
                        }
                    },
                    
                },
                {
                    targets: 8,
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
                { data: 'jenis'},
                { data: 'berat'},
                { data: 'suhu1'},
                { data: 'kadar_air1'},
                { data: 'suhu2'},
                { data: 'kadar_air2'},
                { data: 'waktu'},
                { data: 'klasifikasi'},
                
                ],
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                }
            });
        })
        $(document).ready(function() {
            
            table = $("#datatable2").DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: true,
                ajax: "{{ route('gabah-landing.datatable2') }}",
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
                {
                    targets: 7,
                    createdCell: function(td, cellData, rowData, row, col) {
                        if($(td).text().length > 50) {
                            let txt = $(td).text()
                            $(td).text(txt.substr(0, 50) + '...')
                        }
                    },
                    
                },
                {
                    targets: 8,
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
                { data: 'jenis'},
                { data: 'berat'},
                { data: 'suhu1'},
                { data: 'kadar_air1'},
                { data: 'suhu2'},
                { data: 'kadar_air2'},
                { data: 'waktu'},
                { data: 'klasifikasi'},
                
                ],
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                }
            });
        })
    </script>
</body>

</html>