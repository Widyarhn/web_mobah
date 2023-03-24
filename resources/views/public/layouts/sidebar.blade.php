{{-- 
    sidebar admin 
    //segment (2) -> ex: admin/dashboard
    //segment (3) ->> ex: admin/masterdata(dropdown)/datauser
--}}
<ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
        <a class="nav-link {{ Request::segment("1") == "dashboard" ? '' : 'collapsed' }}" href="{{ url('/dashboard') }}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
        </a>
    </li><!-- End Dashboard Nav -->
    
    <li class="nav-item">
        <a class="nav-link {{ Request::segment("1") == "akun" ? '' : 'collapsed' }}" data-bs-target="#tambahAkun-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-person-plus"></i><span>Tambah Akun</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tambahAkun-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            {{-- <li>
                <a href="tambah-admin">
                    <i class="bi bi-circle" ></i><span>Akun Admin</span>
                </a>
            </li>
            <li>
                <a href="{{ route('mitra.index') }}">
                    <i class="bi bi-circle"></i><span>Akun Mitra</span>
                </a>
            </li> --}}
            <li>
                <a href="{{ url('/akun/admin') }}">
                    <i class="bi bi-circle" ></i><span>Akun Admin</span>
                </a>
            </li>
            <li>
                <a href="{{url('/akun/mitra') }}">
                    <i class="bi bi-circle"></i><span>Akun Mitra</span>
                </a>
            </li>
            <li>
                <a href="{{url('/akun/validator') }}">
                    <i class="bi bi-circle"></i><span>Akun Validator</span>
                </a>
            </li>
        </ul>
    </li><!-- End Tambah Akun Nav -->
    
    <li class="nav-item">
        <a class="nav-link {{ Request::segment("1") == "data" ? '' : 'collapsed' }}" data-bs-target="#dataMaster-nav" data-bs-toggle="collapse" href="#">
            <i class="bi-layout-text-window-reverse"></i><span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="dataMaster-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{url('/data/pemantauan-gabah') }}">
                    <i class="bi bi-circle"></i><span>Pemantauan Gabah</span>
                </a>
            </li>
            <li>
                <a href="{{url('/data/klasifikasi-gabah') }}">
                    <i class="bi bi-circle"></i><span>Klasifikasi Gabah</span>
                </a>
            </li>
            <li>
                <a href="{{url('/data/data-gabah') }}">
                    <i class="bi bi-circle"></i><span>Data Gabah</span>
                </a>
            </li>
            
        </ul>
    </li><!-- End Data Master Nav -->
    
    <li class="nav-item">
        <a class="nav-link {{ Request::segment("1") == "laporan" ? '' : 'collapsed' }}" href="{{url('/laporan') }}">
            <i class="bi bi-file-pdf"></i>
            <span>Laporan</span>
        </a>
        
        
    </li><!-- End Cetak Data Nav -->
    
    <li class="nav-heading">Pages</li>
    
    <li class="nav-item">
        <a class="nav-link {{ Request::segment("1") == "profil" ? '' : 'collapsed' }}" href="{{url('/profil') }}">
            <i class="bi bi-person"></i>
            <span>Profil</span>
        </a>
    </li><!-- End Profile Page Nav -->
    
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#">
            <i class="bi bi-gear"></i>
            <span>Setting</span>
        </a>
    </li><!-- End Setting Page Nav --> --}}

    <li class="nav-item">
        <a class="nav-link {{ Request::segment("1") == "bantuan" ? '' : 'collapsed' }}" href="/bantuan">
            <i class="bi bi-question-circle"></i>
            <span>Bantuan?</span>
        </a>
    </li>
</ul>
