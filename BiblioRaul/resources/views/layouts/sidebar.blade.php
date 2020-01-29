<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <img src="/img/Logo.png" alt="BiblioRaul" style="height:50px">
        </div>
        <div class="sidebar-brand-text mx-3" id="BiblioRaul">Biblio<span id="Raul">Raul</span></div>
    </a>
    <!-- <img src="/img/BiblioRaul.png" alt="BiblioRaul" width="100%" height="3%"> -->

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="{{ Request::path() === "/" ? "nav-item active" : "nav-item" }}">
        <a class="nav-link" href="/">
            <i class="oi oi-dashboard"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="{{ Request::path() === "professor" ? "nav-link" : "nav-link collapsed" }}" href="#"
            data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="{{ Request::path() === "professor" ? "true" : "false" }}" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-table"></i>
            <span>Tabelas</span>
        </a>
        <div id="collapseTwo" class="{{ Request::path() === "professor" ? "collapse show" : "collapse" }}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gerir Tabelas:</h6>
                <!-- Professores -->
                <a class="{{ Request::path() === "professor" ? "collapse-item active" : "collapse-item" }}"
                    href="professor">
                    <i class="fas fa-fw fa-chalkboard-teacher"></i>
                    <span>Professores</span></a>
                <!-- Turmas -->
                <a class="{{ Request::path() === "turma" ? "collapse-item active" : "collapse-item" }}" href="turma">
                    <i class="fas fa-user-graduate" style="margin-left:3px"></i>
                    <span style="margin-left:3px">Turmas</span></a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Relatórios -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-list-alt"></i>
            <span>Relatórios</span>
        </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true"
            aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
