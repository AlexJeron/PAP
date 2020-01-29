<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <img src="/img/Logo.png" alt="BiblioRaul" style="height:35px">
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

    <!-- Nav Item - Outras Atividades -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-calendar-alt"></i>
            <span>Outras Atividades</span>
        </a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="{{ Request::path() === "professor" ? "nav-link" : "nav-link collapsed" }}" href="#"
            data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="{{ Request::path() === "professor" ? "true" : "false" }}" aria-controls="collapseTwo"
            style="margin-left: -2px;">
            <i class="fas fa-fw fa-table"></i>
            <span style="margin-left: -2px;">Tabelas</span>
        </a>
        <div id="collapseTwo" class="{{ Request::path() === "professor" ? "collapse show" : "collapse" }}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gerir Tabelas:</h6>

                <!-- Professores -->
                <a class="{{ Request::path() === "professor" ? "collapse-item active" : "collapse-item" }}"
                    href="professor">
                    <i class="fas fa-fw fa-chalkboard-teacher"></i>
                    <span style="margin-left:4px">Professores</span></a>

                <!-- Turmas -->
                <a class="{{ Request::path() === "turma" ? "collapse-item active" : "collapse-item" }}" href="turma">
                    <i class="fas fa-user-graduate" style="margin-left:2px"></i>
                    <span style="margin-left:8px">Turmas</span></a>

                <!-- Users -->
                <a class="{{ Request::path() === "user" ? "collapse-item active" : "collapse-item" }}" href="user">
                    <i class="fas fa-users"></i>
                    <span style="margin-left:5px">Utilizadores</span></a>

                <!-- Locais -->
                <a class="{{ Request::path() === "local" ? "collapse-item active" : "collapse-item" }}" href="local">
                    <i class="fas fa-map-marker-alt"></i>
                    <span style="margin-left:5px">Locais</span></a>

                <!-- Recursos -->
                <a class="{{ Request::path() === "recurso" ? "collapse-item active" : "collapse-item" }}"
                    href="recurso">
                    <i class="fas fa-toolbox"></i>
                    <span style="margin-left:5px">Recursos</span></a>

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

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
