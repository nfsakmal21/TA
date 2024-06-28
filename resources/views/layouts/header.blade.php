  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item">
      </li>
      <div class="info-box" style="margin-right: 30px;" width="50%" >
        <span class="info-box-icon bg-info"><i class="fas fa-phone-square"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">KONTAK:</span>
          <span class="info-box-number">07218030188</span>
        </div>
      </div>
      <div class="info-box" style="margin-right: 30px;">
        <span class="info-box-icon bg-info"><i class="fas fa-envelope"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">EMAIL:</span>
          <span class="info-box-number">informatika@itera.ac.id</span>
        </div>
      </div>
      <div class="info-box">
        <span class="info-box-icon bg-info"><i class="fas fa-map-marker"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">LOKASI:</span>
          <span class="info-box-number">Ruang D215 - Gedung D Kampus ITERA</span>
        </div>
      </div>
    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="http://if.itera.ac.id" class="brand-link">
      <img src="{{ url('logoif.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <p style="font-size:14px">Sistem Informasi Monitoring <br> Aktivitas Mahasiswa</p>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      @if(Auth::user()->user_type == 1)
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url('man.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()-> name }}</a>
        </div>
      </div>

      @elseif(Auth::user()->user_type == 2)
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url('dosen.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()-> name }}</a>
        </div>
      </div>

      @elseif(Auth::user()->user_type == 3)
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url('boy.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()-> name }}</a>
        </div>
      </div>
      @endif

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        @if(Auth::user()->user_type == 1)
          <li class="nav-item">
            <a href="{{url('admin/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/admin/list')}}" class="nav-link @if(Request::segment(2) == 'admin') active @endif">
              <i class="nav-icon far fa-user"></i>
              <p>
                Admin
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/dosen/list')}}" class="nav-link @if(Request::segment(2) == 'dosen') active @endif">
              <i class="nav-icon far fa-user"></i>
              <p>
                Dosen
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/mahasiswa/list')}}" class="nav-link @if(Request::segment(2) == 'mahasiswa') active @endif">
              <i class="nav-icon far fa-user"></i>
              <p>
                Mahasiswa
              </p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="{{url('admin/perwalian/list')}}" class="nav-link @if(Request::segment(2) == 'perwalian') active @endif">
              <i class="nav-icon far fa-user"></i>
              <p>
                Perwalian
              </p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="{{url('admin/kkn/list')}}" class="nav-link @if(Request::segment(2) == 'kkn') active @endif">
              <i class="nav-icon fas fa-globe"></i>
              <p>
                Kuliah Kerja Nyata
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/kp/list')}}" class="nav-link @if(Request::segment(2) == 'kp') active @endif">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Kerja Praktik
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/ta/list')}}" class="nav-link @if(Request::segment(2) == 'ta') active @endif">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Tugas Akhir
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/prestasi/list')}}" class="nav-link @if(Request::segment(2) == 'prestasi') active @endif">
              <i class="nav-icon fas fa-trophy"></i>
              <p>
                Prestasi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/mbkm/list')}}" class="nav-link @if(Request::segment(2) == 'mbkm') active @endif">
              <i class="nav-icon fas fa-archive"></i>
              <p>
                MBKM
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/pkm/list')}}" class="nav-link @if(Request::segment(2) == 'pkm') active @endif">
              <i class="nav-icon fas fa-puzzle-piece"></i>
              <p>
                PKM
              </p>
            </a>
          </li>
        @elseif(Auth::user()->user_type == 2)
          <li class="nav-item">
            <a href="{{url('dosen/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('dosen/perwalian/list')}}" class="nav-link @if(Request::segment(2) == 'perwalian') active @endif">
              <i class="nav-icon far fa-user"></i>
              <p>
                Perwalian
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('dosen/mahasiswa/list')}}" class="nav-link @if(Request::segment(2) == 'mahasiswa') active @endif">
              <i class="nav-icon far fa-user"></i>
              <p>
                Mahasiswa
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('dosen/pesan/list')}}" class="nav-link @if(Request::segment(2) == 'pesan') active @endif">
              <i class="nav-icon far fa-user"></i>
              <p>
                Pesan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('dosen/kkn/list')}}" class="nav-link @if(Request::segment(2) == 'kkn') active @endif">
              <i class="nav-icon fas fa-globe"></i>
              <p>
                Kuliah Kerja Nyata
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('dosen/kp/list')}}" class="nav-link @if(Request::segment(2) == 'kp') active @endif">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Kerja Praktik
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('dosen/ta/list')}}" class="nav-link @if(Request::segment(2) == 'ta') active @endif">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Tugas Akhir
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('dosen/prestasi/list')}}" class="nav-link @if(Request::segment(2) == 'prestasi') active @endif">
              <i class="nav-icon fas fa-trophy"></i>
              <p>
                Prestasi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('dosen/mbkm/list')}}" class="nav-link @if(Request::segment(2) == 'mbkm') active @endif">
              <i class="nav-icon fas fa-archive"></i>
              <p>
                MBKM
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('dosen/pkm/list')}}" class="nav-link @if(Request::segment(2) == 'pkm') active @endif">
              <i class="nav-icon fas fa-puzzle-piece"></i>
              <p>
                PKM
              </p>
            </a>
          </li>
        @elseif(Auth::user()->user_type == 3)
          <li class="nav-item">
            <a href="{{url('mahasiswa/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('mahasiswa/kkn/list')}}" class="nav-link @if(Request::segment(2) == 'kkn') active @endif">
              <i class="nav-icon fas fa-globe"></i>
              <p>
                Kuliah Kerja Nyata
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('mahasiswa/kp/list')}}" class="nav-link @if(Request::segment(2) == 'kp') active @endif">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Kerja Praktik
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('mahasiswa/ta/list')}}" class="nav-link @if(Request::segment(2) == 'ta') active @endif">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Tugas Akhir
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('mahasiswa/prestasi/list')}}" class="nav-link @if(Request::segment(2) == 'prestasi') active @endif">
              <i class="nav-icon fas fa-trophy"></i>
              <p>
                Prestasi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('mahasiswa/mbkm/list')}}" class="nav-link @if(Request::segment(2) == 'mbkm') active @endif">
              <i class="nav-icon fas fa-archive"></i>
              <p>
                MBKM
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('mahasiswa/pkm/list')}}" class="nav-link @if(Request::segment(2) == 'pkm') active @endif">
              <i class="nav-icon fas fa-puzzle-piece"></i>
              <p>
                PKM
              </p>
            </a>
          </li>
        @endif
          <li class="nav-item">
            <a href="{{url('logout')}}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Keluar
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>