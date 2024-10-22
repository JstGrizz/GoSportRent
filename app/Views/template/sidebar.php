<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><span>Lumino</span>Admin</a>
            <ul class="user-menu">
                <li class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                            class="glyphicon glyphicon-user"></span> User <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div><!-- /.container-fluid -->
</nav>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <form role="search">
        <div class="form-group">
        </div>
    </form>
    <ul class="nav menu">
        <li><a href="<?= base_url('admin/users'); ?>"></span> Master User</a></li>
        <li><a href="<?= base_url('admin/categories'); ?>"></span> Master Category</a></li>
        <li><a href="<?= base_url('admin/units'); ?>"></span> Master Units</a></li>
        <li><a href="<?= base_url('admin/rental_history'); ?>"></span> Rental History</a></li>
        <li><a href="<?= base_url('admin/policies'); ?>"></span> Policy Penalties and Fees</a></li>
        <form action="<?= base_url('logout'); ?>" method="get">
            <button type="submit" class="btn btn-danger">Log Out</button>
        </form>
    </ul>
</div>
<!--/.sidebar-->