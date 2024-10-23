<?= $this->extend('template/admin_layout'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <?= view('template/topbar'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <h1 class="h3 mb-2 text-gray-800">Policy Management</h1>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables User</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"
                            style="text-align: center;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Max Rental Days</th>
                                    <th>Overdue Fee Per Day</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($policies as $policy): ?>
                                    <tr>
                                        <td><?= $policy['id']; ?></td>
                                        <td><?= $policy['max_rental_days']; ?></td>
                                        <td><?= number_format($policy['overdue_fee_per_day'], 0); ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/edit_policy/' . $policy['id']); ?>"
                                                class="btn btn-warning">Edit</a>
                                            <a href="<?= base_url('admin/delete_policy/' . $policy['id']); ?>"
                                                class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <a href="<?= base_url('admin/create_policy'); ?>" class="btn btn-primary">Create New Policy</a>
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