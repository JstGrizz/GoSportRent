<?= $this->extend('template/admin_layout'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <?= view('template/topbar'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <h1 class="h3 mb-2 text-gray-800">Edit User</h1>
            <div class="row">
                <div class="col-lg-6">

                </div>
            </div>
            <div class="card shadow mb-4">
                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Form Edit User</h6>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('admin/update_user/' . $user['id']); ?>" method="post">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" value="<?= $user['name']; ?>" required
                                    class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" name="username" id="username" value="<?= $user['username']; ?>"
                                    required class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email" value="<?= $user['email']; ?>" required
                                    class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="role">Role:</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin
                                    </option>
                                    <option value="user" <?= $user['role'] === 'user' ? 'selected' : ''; ?>>User
                                    </option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update User</button>
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