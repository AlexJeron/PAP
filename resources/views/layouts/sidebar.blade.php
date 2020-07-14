<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <svg width="40" height="40">
                <image xlink:href="/img/logo.svg" src="yourfallback.png" width="40" height="40" />
            </svg>
        </div>
        <div class="sidebar-brand-text mx-1" id="BiblioRaul">Biblio<span id="Raul">Raul</span></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="{{ request()->is('/') ? 'nav-item active' : 'nav-item' }}">
        <a class="nav-link" href="/">
            <i class="fas fa-calendar-alt"></i>
            <span>Calendário</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Atividades -->
    <?php
    $currentDate = Carbon::now()->format('Y-m');
    // dd($currentDate);
    ?>
    <li class="{{ request()->is('atividades') ? 'nav-item active' : 'nav-item' }}">
        <a class="nav-link" href="atividades?year_month={{ $currentDate }}">
            <i class="fas fa-list"></i>
            <span>Tabela de Atividades</span>
        </a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li
        class="{{ request()->is('professores', 'turmas', 'users', 'locais', 'recursos') ? 'nav-item active' : 'nav-item' }}">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo" style="margin-left: -2px;">
            <i class="fas fa-fw fa-table"></i>
            <span style="margin-left: -2px;">Outras Tabelas</span>
        </a>
        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gerir Tabelas:</h6>

                <!-- Professores -->
                <a class="{{ request()->is('professores') ? 'collapse-item active' : 'collapse-item' }}"
                    href="professores">
                    <i class="fas fa-fw fa-chalkboard-teacher"></i>
                    <span style="margin-left:4px">Professores</span></a>

                <!-- Turmas -->
                <a class="{{ request()->is('turmas') ? 'collapse-item active' : 'collapse-item' }}" href="turmas">
                    <i class="fas fa-user-graduate" style="margin-left:2px"></i>
                    <span style="margin-left:8px">Turmas</span></a>

                <!-- Users -->
                <a class="{{ request()->is('users') ? 'collapse-item active' : 'collapse-item' }}" href="users">
                    <i class="fas fa-users"></i>
                    <span style="margin-left:5px">Utilizadores</span></a>

                <!-- Locais -->
                <a class="{{ request()->is('locais') ? 'collapse-item active' : 'collapse-item' }}" href="locais"
                    style="margin-left:11px">
                    <i class="fas fa-map-marker-alt"></i>
                    <span style="margin-left:9px">Locais</span></a>

                <!-- Recursos -->
                <a class="{{ request()->is('recursos') ? 'collapse-item active' : 'collapse-item' }}" href="recursos"
                    style="margin-left:10px">
                    <i class="fas fa-toolbox"></i>
                    <span style="margin-left:6px">Recursos</span></a>

            </div>
        </div>
    </li>

    <!-- Nav Item - Histórico de Atividades-->
    {{-- <li class="{{ request()->is('relatorios') ? 'nav-item active' : 'nav-item' }}">
    <a class="nav-link" href="#">
        <i class="fas fa-list-alt"></i>
        <span>Histórico de Atividades</span>
    </a>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

</ul>
<!-- End of Sidebar -->