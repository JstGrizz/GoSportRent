<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
            </button>
            <a class="navbar-brand" href="#">
                <span>GoSport</span>Rent
            </a>
            <ul class="user-menu">
                <li class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span> <?= session()->get('username') ?? 'User'; ?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?= base_url('user_profile'); ?>">
                                <span class="glyphicon glyphicon-user"></span> Profile
                            </a></li>
                        <li><a href="<?= base_url('logout'); ?>">
                                <span class="glyphicon glyphicon-log-out"></span> Logout
                            </a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <ul class="nav menu">
        <?php if (session()->get('role') === 'admin'): ?>
            <!-- Form Pencarian untuk Admin -->
            <form role="search" action="<?= base_url('search_results'); ?>" method="get">
                <div class="form-group">
                    <input type="text" name="query" class="form-control" placeholder="Search...">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Search</button>
            </form>
            <li><a href="<?= base_url('admin/users'); ?>">Master User</a></li>
            <li><a href="<?= base_url('admin/categories'); ?>">Master Category</a></li>
            <li><a href="<?= base_url('admin/units'); ?>">Master Units</a></li>
            <li><a href="<?= base_url('admin/rental_history'); ?>">Rental History</a></li>
            <li><a href="<?= base_url('admin/policies'); ?>">Policy Penalties and Fees</a></li>
        <?php else: ?>
            <!-- Form Pencarian untuk User -->
            <form role="search" action="<?= base_url('search_results'); ?>" method="get">
                <div class="form-group">
                    <input type="text" name="query" class="form-control" placeholder="Search...">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Search</button>
            </form>
            <li><a href="<?= base_url('my_rentals'); ?>">My Rentals</a></li>
            <li><a href="<?= base_url('unit_list'); ?>">Browse Units</a></li>
        <?php endif; ?>
    </ul>
</div>