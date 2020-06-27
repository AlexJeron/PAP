<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            {{-- <img src="/img/Logo.png" alt="BiblioRaul" style="height:35px"> --}}
            <svg aria-hidden="true" viewBox="0 0 263.49 374" width="36" height="36">
                <circle cx="71.97" cy="103.82" r="44.58" fill="#fff" />
                <circle cx="192.7" cy="103.82" r="44.58" fill="#fff" />
                <circle cx="71.97" cy="103.82" r="44.58" fill="#fff" />
                <circle cx="192.7" cy="103.82" r="44.58" fill="#fff" />
                <path fill="none"
                    d="M131.82 185.47l17.3-32.89h-34.6l17.3 32.89zM192.71 59.23a44.58 44.58 0 1044.57 44.59 44.62 44.62 0 00-44.57-44.59zm0 61.88a18.63 18.63 0 1118.64-18.63 18.63 18.63 0 01-18.66 18.64zM116.54 103.81a44.58 44.58 0 10-44.58 44.59 44.62 44.62 0 0044.58-44.59zm-44.48 18.36a19.68 19.68 0 1119.68-19.68 19.69 19.69 0 01-19.68 19.68z" />
                <path fill="none"
                    d="M131.82 185.47l17.3-32.89h-34.6l17.3 32.89zM116.54 103.81a44.58 44.58 0 10-44.58 44.59 44.62 44.62 0 0044.58-44.59zm-44.48 18.36a19.68 19.68 0 1119.68-19.68 19.69 19.69 0 01-19.68 19.68zM192.71 59.23a44.58 44.58 0 1044.57 44.59 44.62 44.62 0 00-44.57-44.59zm0 61.88a18.63 18.63 0 1118.64-18.63 18.63 18.63 0 01-18.66 18.64z" />
                <path fill="#098dd2" d="M72.08 82.81a19.68 19.68 0 1019.66 19.68 19.69 19.69 0 00-19.66-19.68z" />
                <path fill="#098dd2"
                    d="M209.72 30.93H53.58L0 0v347.76a24.9 24.9 0 0024.87 24.87H237.6a24.9 24.9 0 0024.89-24.87V.47zM71.96 148.4a44.58 44.58 0 1144.58-44.59 44.57 44.57 0 01-44.58 44.59zm59.85 37.07l-17.32-32.89h34.61zm105.47-81.64a44.58 44.58 0 11-44.57-44.6 44.59 44.59 0 0144.57 44.59z" />
                <path fill="#098dd2" d="M192.69 83.86a18.63 18.63 0 1018.64 18.63 18.63 18.63 0 00-18.64-18.63z" />
                <path fill="#fff" d="M131.85 185.47l17.27-32.7h-34.54l17.27 32.7z" />
            </svg>
        </div>
        <div class="sidebar-brand-text mx-1" id="BiblioRaul">Biblio<span id="Raul">Raul</span></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="{{ request()->is('/') ? 'nav-item active' : 'nav-item' }}">
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

    <!-- Nav Item - Atividades -->
    <?php
    $currentDate = Carbon::now()->format('Y-m');
    // dd($currentDate);
    ?>
    <li class="{{ request()->is('atividades') ? 'nav-item active' : 'nav-item' }}">
        <a class="nav-link" href="atividades?year_month={{ $currentDate }}">
            <i class="fas fa-calendar-alt"></i>
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