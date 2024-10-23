<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">GoSport <sup>rent</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Heading -->
    <div class="sidebar-heading">
        Master Data
    </div>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>

    <?php if (session()->get('role') === 'admin'): ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/users'); ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Master User</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/units'); ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Master Unit</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/categories'); ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Master Category</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/rental_history'); ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Rental History</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/policies'); ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Policy Penalties and Fees</span></a>
        </li>
    <?php else: ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('my_rentals'); ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>My Rentals</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('unit_list'); ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Browse Units</span></a>
        </li>
    <?php endif; ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>