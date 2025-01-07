<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">


            <li class="menu-header">Dashboard</li>
            <li class="dropdown active">
                <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>

            @hasrole('admin')
            <li class="menu-header">Master</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Data Master</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('mahasiswa.index') }}">Data Mahasiswa</a></li>
                    <li><a class="nav-link" href="{{ route('dosen.index') }}">Data Dosen</a></li>
                    {{-- <li><a class="nav-link" href="#">Top Navigation</a></li> --}}
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Data Pimpinan</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('jabatan-pimpinan.index') }}">Jabatan Pimpinan</a></li>
                    <li><a class="nav-link" href="{{ route('pimpinan.index') }}">Pimpinan</a></li>
                    <li><a class="nav-link" href="{{ route('golongan.index') }}">Golongan</a></li>
                </ul>
            </li>


            {{-- <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li> --}}

            {{-- <li class="menu-header">Jurusan</li> --}}
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i>
                    <span>Data Jurusan</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('jurusan.index') }}">Jurusan</a></li>
                    <li><a class="nav-link" href="{{ route('prodi.index') }}">Program Studi</a></li>
                    <li><a class="nav-link" href="{{ route('semester.index') }}">Semester</a></li>
                    <li><a class="nav-link" href="{{ route('kelas.index') }}">Kelas</a></li>
                    <li><a class="nav-link" href="{{ route('ruangan.index') }}">Ruangan</a></li>
                    <li><a class="nav-link" href="{{ route('sesi.index') }}">Sesi</a></li>
                    <li><a class="nav-link" href="{{ route('tempat-pkl.index') }}">Tempat PKL</a>
                    </li>
                    <li><a class="nav-link" href="{{ route('role-tempat-pkl.index') }}">Role Tempat PKL</a></li>
                    {{-- <li><a class="nav-link" href="bootstrap-carousel.html">Carousel</a></li>
                    <li><a class="nav-link" href="bootstrap-collapse.html">Collapse</a></li>
                    <li><a class="nav-link" href="bootstrap-dropdown.html">Dropdown</a></li>
                    <li><a class="nav-link" href="bootstrap-form.html">Form</a></li>
                    <li><a class="nav-link" href="bootstrap-list-group.html">List Group</a></li>
                    <li><a class="nav-link" href="bootstrap-media-object.html">Media Object</a></li>
                    <li><a class="nav-link" href="bootstrap-modal.html">Modal</a></li>
                    <li><a class="nav-link" href="bootstrap-nav.html">Nav</a></li>
                    <li><a class="nav-link" href="bootstrap-navbar.html">Navbar</a></li>
                    <li><a class="nav-link" href="bootstrap-pagination.html">Pagination</a></li>
                    <li><a class="nav-link" href="bootstrap-popover.html">Popover</a></li>
                    <li><a class="nav-link" href="bootstrap-progress.html">Progress</a></li>
                    <li><a class="nav-link" href="bootstrap-table.html">Table</a></li>
                    <li><a class="nav-link" href="bootstrap-tooltip.html">Tooltip</a></li>
                    <li><a class="nav-link" href="bootstrap-typography.html">Typography</a></li> --}}
                </ul>
            </li>
            @endhasrole

            @hasrole('pimpinanProdi')
            <li class="menu-header">Kaprodi</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                    <span>PKL</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('booking.index') }}">Booking</a></li>
                    <li><a class="nav-link" href="{{ route('verifikasi-usulan-pkl.index') }}">Ver PKL</a></li>
                    <li><a class="nav-link" href="{{ route('pkl-mahasiswa.index') }}">Dosen PKL</a></li>
                </ul>
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                    <span>Sempro</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('booking.index') }}">Booking</a></li>
                    <li><a class="nav-link" href="{{ route('sempro-mhs-kap.index') }}">Sempro Mahasiswa KAP</a></li>
                </ul>
            </li>
            @endhasrole
            @hasrole('dosenPembimbing')
            <li class="menu-header">Pembimbing</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                    <span>PKL</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('logbook-pem.index') }}">LogBook Pembimbing</a></li>
                    <li><a class="nav-link" href="{{ route('pkl-nilai-pembimbing.index') }}">PKL Nilai</a></li>
                </ul>
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                    <span>Sempro</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('sempro-nilai-pembimbing.index') }}">Sempro Nilai</a></li>
                </ul>
            </li>
            @endhasrole
            @hasrole('dosenPenguji')
            <li class="menu-header">Penguji</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                    <span>PKL</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('pkl-nilai-penguji.index') }}">PKL Nilai</a></li>
                </ul>
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                    <span>Sempro</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('sempro-nilai-penguji.index') }}">Sempro Nilai</a></li>
                </ul>
            </li>
            @endhasrole
            @hasrole('mahasiswa')
            <li class="menu-header">Mahasiswa</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                    <span>PKL</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('usulan-pkl.index') }}">Usulan PKL</a></li>
                    <li><a class="nav-link" href="{{ route('pkl-mhs.index') }}">PKL Mahasiswa</a></li>
                    <li><a class="nav-link" href="{{ route('logbook.index') }}">LogBook</a></li>
                </ul>
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                    <span>Sempro</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('sempro-mhs.index') }}">Sempro Mahasiswa</a></li>
                </ul>
            </li>
            @endhasrole

            {{-- <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-map-marker-alt"></i>
                    <span>Google Maps</span></a>
                <ul class="dropdown-menu">
                    <li><a href="gmaps-advanced-route.html">Advanced Route</a></li>
                    <li><a href="gmaps-draggable-marker.html">Draggable Marker</a></li>
                    <li><a href="gmaps-geocoding.html">Geocoding</a></li>
                    <li><a href="gmaps-geolocation.html">Geolocation</a></li>
                    <li><a href="gmaps-marker.html">Marker</a></li>
                    <li><a href="gmaps-multiple-marker.html">Multiple Marker</a></li>
                    <li><a href="gmaps-route.html">Route</a></li>
                    <li><a href="gmaps-simple.html">Simple</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-plug"></i>
                    <span>Modules</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="modules-calendar.html">Calendar</a></li>
                    <li><a class="nav-link" href="modules-chartjs.html">ChartJS</a></li>
                    <li><a class="nav-link" href="modules-datatables.html">DataTables</a></li>
                    <li><a class="nav-link" href="modules-flag.html">Flag</a></li>
                    <li><a class="nav-link" href="modules-font-awesome.html">Font Awesome</a></li>
                    <li><a class="nav-link" href="modules-ion-icons.html">Ion Icons</a></li>
                    <li><a class="nav-link" href="modules-owl-carousel.html">Owl Carousel</a></li>
                    <li><a class="nav-link" href="modules-sparkline.html">Sparkline</a></li>
                    <li><a class="nav-link" href="modules-sweet-alert.html">Sweet Alert</a></li>
                    <li><a class="nav-link" href="modules-toastr.html">Toastr</a></li>
                    <li><a class="nav-link" href="modules-vector-map.html">Vector Map</a></li>
                    <li><a class="nav-link" href="modules-weather-icon.html">Weather Icon</a></li>
                </ul>
            </li>
            <li class="menu-header">Pages</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i>
                    <span>Auth</span></a>
                <ul class="dropdown-menu">
                    <li><a href="auth-forgot-password.html">Forgot Password</a></li>
                    <li><a href="auth-login.html">Login</a></li>
                    <li><a href="auth-register.html">Register</a></li>
                    <li><a href="auth-reset-password.html">Reset Password</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-exclamation"></i>
                    <span>Errors</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="errors-503.html">503</a></li>
                    <li><a class="nav-link" href="errors-403.html">403</a></li>
                    <li><a class="nav-link" href="errors-404.html">404</a></li>
                    <li><a class="nav-link" href="errors-500.html">500</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-bicycle"></i>
                    <span>Features</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="features-activities.html">Activities</a></li>
                    <li><a class="nav-link" href="features-post-create.html">Post Create</a></li>
                    <li><a class="nav-link" href="features-posts.html">Posts</a></li>
                    <li><a class="nav-link" href="features-profile.html">Profile</a></li>
                    <li><a class="nav-link" href="features-settings.html">Settings</a></li>
                    <li><a class="nav-link" href="features-setting-detail.html">Setting Detail</a></li>
                    <li><a class="nav-link" href="features-tickets.html">Tickets</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i>
                    <span>Utilities</span></a>
                <ul class="dropdown-menu">
                    <li><a href="utilities-contact.html">Contact</a></li>
                    <li><a class="nav-link" href="utilities-invoice.html">Invoice</a></li>
                    <li><a href="utilities-subscribe.html">Subscribe</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i>
                    <span>Credits</span></a></li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div> --}}


    </aside>
</div>
