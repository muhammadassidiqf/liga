<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="mdi mdi-poll-box menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('pertandingan.index') }}">
                <i class="menu-icon mdi mdi-soccer"></i>
                <span class="menu-title">Pertandingan</span>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" href="">
                <i class="menu-icon mdi mdi-play-circle"></i>
                <span class="menu-title">Pertandingan</span>
            </a>
        </li> --}}
    </ul>
</nav>
<!-- partial -->
