<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-microchip"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Repair <sup>System</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('/') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Schede Tecniche
    </div>

    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('/visualizza-schede') ?>">
            <i class="fas fa-fw fa-laptop-file"></i>
            <span>Tutte</span>
        </a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('/inserimento') ?>">
            <i class="fas fa-fw fa-plus"></i>
            <span>Nuova scheda</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Clienti
    </div>

    <li class="nav-item active">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-user"></i>
            <span>Tutti</span>
        </a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-plus"></i>
            <span>Aggiungi Cliente</span>
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
