{{-- 
    sidebar admin 
    //segment (2) -> ex: admin/dashboard
    //segment (3) ->> ex: admin/masterdata(dropdown)/datauser
--}}
<ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
        <a class="nav-link " href="#">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
        </a>
    </li><!-- End Dashboard Nav -->
    
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tambahAkun-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-person-plus"></i><span>Tambah Akun</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tambahAkun-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="#">
                    <i class="bi bi-circle"></i><span>Akun Admin</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="bi bi-circle"></i><span>Akun Mitra</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="bi bi-circle"></i><span>Akun Validator</span>
                </a>
            </li>
        </ul>
    </li><!-- End Tambah Akun Nav -->
    
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi-layout-text-window-reverse"></i><span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="#">
                    <i class="bi bi-circle"></i><span>Data Sensor</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="bi bi-circle"></i><span>Data Gabah</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="bi bi-circle"></i><span>Data User</span>
                </a>
            </li>
            
        </ul>
    </li><!-- End Data Master Nav -->
    
    <li class="nav-item">
        <a class="nav-link collapsed" href="#">
            <i class="bi bi-file-pdf"></i>
            <span>Cetak Data</span>
        </a>
        
        
    </li><!-- End Cetak Data Nav -->
    
    <li class="nav-heading">Pages</li>
    
    <li class="nav-item">
        <a class="nav-link collapsed" href="#">
            <i class="bi bi-person"></i>
            <span>Profile</span>
        </a>
    </li><!-- End Profile Page Nav -->
    
    <li class="nav-item">
        <a class="nav-link collapsed" href="#">
            <i class="bi bi-gear"></i>
            <span>Setting</span>
        </a>
    </li><!-- End Setting Page Nav -->

</ul>
