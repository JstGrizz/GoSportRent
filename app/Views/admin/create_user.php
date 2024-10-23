<?= $this->extend('template/admin_layout'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <?= view('template/topbar'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <h1 class="h3 mb-2 text-gray-800">Add New User</h1>
            <!-- Flashdata Alert -->
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('success'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('error'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-lg-6">

                </div>
            </div>
            <div class="card shadow mb-4">
                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="<?= base_url('admin/store_user'); ?>" method="post">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" name="username" id="username" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" name="password" id="password" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="role">Role:</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Add User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

</div>
<!-- End of Content Wrapper -->
<?= $this->endSection(); ?>