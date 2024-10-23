<?= $this->extend('template/admin_layout'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <?= view('template/topbar'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <h1 class="h3 mb-2 text-gray-800">User Profile</h1>
            <div class="row">
                <div class="col-lg-6">

                </div>
            </div>
            <div class="card shadow mb-4">
                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" id="username" class="form-control"
                                    value="<?= esc($user['username']); ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" id="name" class="form-control" value="<?= esc($user['name']); ?>"
                                    disabled>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" id="email" class="form-control" value="<?= esc($user['email']); ?>"
                                    disabled>
                            </div>
                            <div class="form-group">
                                <a href="<?= base_url('edit_profile'); ?>" class="btn btn-primary">Edit Profile</a>
                            </div>
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