@extends("public.layouts.main")

@section("title_content", "Profil")

@section("page_title" , "Profil")

@section("breadcrumb")
<ol class="breadcrumb">
    <li class="breadcrumb-item ">
        Home
    </li>
    <li class="breadcrumb-item active">
        Profil
    </li>
</ol>
@endsection

@section('content')
<section class="section profile">
    <div class="row">
        <div class="col-xl-4">
            
            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    @if (empty(Auth::user()->gambar))
                        <img src="{{ url('/admin/assets/img/default_gambar.png') }}" style="width: 100%; height: 120px; border-radius: 50%"> 
                    @else
                    <img src="{{ url('/storage/'.Auth::user()->gambar) }}" alt="Profile" style="width: 100%; height: 120px; border-radius: 50%">
                    @endif
                    <h2>{{ auth()->user()->name }}</h2>
                    <h3>admin</h3>
                </div>
            </div>
            
        </div>
        
        <div class="col-xl-8">
            
            <div class="card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">
                        
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview" >Edit Profil</button>
                        </li>
                        
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password" >Change Password</button>
                        </li>
                        
                    </ul>
                    <div class="tab-content pt-3">
                        
                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            
                            <form action="{{ url('/admin/profil/' . $edit->id ) }}" method="POST" enctype="multipart/form-data">
                                @method("PUT")
                                @csrf
                                <input type="hidden" name="gambar_lama" id="gambar_lama" value="{{ $edit->gambar }}">
                                <div class="row mb-3">
                                    <label for="gambar" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                    <div class="col-md-8 col-lg-9">
                                    <img src="{{ url('/storage/'. $edit->gambar) }}" alt="Profile" height="75" >
                                    <div class="pt-2">
                                        <input onchange="previewImage()" type="file" class="form-control" name="gambar" id="gambar">
                                    </div>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="nama" class="col-md-4 col-lg-3 col-form-label">Nama</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="nama" type="text" class="form-control" id="nama" value="{{ $edit->nama }}">
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="email" type="text" class="form-control" id="email" value="{{ $edit->email }}">
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="nomer_telepon" class="col-md-4 col-lg-3 col-form-label">Nomer Telepon</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="nomer_telepon" type="text" class="form-control" id="nomer_telepon" value="{{ $edit->nomer_telepon }}">
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="alamat" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="alamat" type="text" class="form-control" id="alamat" value="{{ $edit->alamat }}">
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="jenis_kelamin" class="col-md-4 col-lg-3 col-form-label">Jenis Kelamin</label>
                                    <div class="col-md-8 col-lg-9">
                                        <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                                            <option value="">- Pilih -</option>
                                            <option value="L" {{ $edit->jenis_kelamin == "L" ? 'selected' : '' }}>Laki - Laki</option>
                                            <option value="P" {{ $edit->jenis_kelamin == "P" ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="text-center">
                                    <button type="reset" class="btn btn-danger">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>


                            </form> 
                            
                        </div> 
                        
                        <div class="tab-pane fade pt-3" id="profile-change-password" >
                            <!-- Change Password Form -->
                            
                            <form action="{{ url('/admin/profil/'.$edit->id). '/change_password' }}" method="POST">
                                @method("PUT")
                                @csrf
                                <div class="row mb-3">
                                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                                    </div>
                                </div>
                                
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                </div>
                            </form><!-- End Change Password Form -->
                            
                        </div>
                        
                    </div><!-- End Bordered Tabs -->
                    
                </div>
            </div>
            
        </div>
    </div>
</section>
@endsection


@section("component_js")
    
<script>
    function previewImage() {
        const image = document.querySelector("#gambar");
        const imgPreview = document.querySelector(".gambar-preview");
        imgPreview.style.display = "block";
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;    
            $("#tampilGambar").addClass('mb-3');
            $("#tampilGambar").width("100%");
            $("#tampilGambar").height("300");
        }
    }
</script>

@endsection

