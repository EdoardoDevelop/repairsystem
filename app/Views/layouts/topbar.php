<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
</button>

<h1 class="h3 mb-0 text-gray-800"><?= $title ?? 'Dashboard' ?></h1>

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

    
    <div class="topbar-divider d-none d-sm-block"></div>
    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        Logout
    </a>
    

</ul>

</nav>
<!-- End of Topbar -->