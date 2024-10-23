<?= $this->extend('template/admin_layout'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <?= view('template/topbar'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <h1 class="h3 mb-2 text-gray-800">Unit Management</h1>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Unit</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"
                            style="text-align: center;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Unit Code</th>
                                    <th>Category</th>
                                    <th>Stock</th>
                                    <th>Cost Per Day</th>
                                    <th>Cost Per Month</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($units as $unit): ?>
                                    <tr>
                                        <td><?= $unit['id']; ?></td>
                                        <td><?= $unit['name']; ?></td>
                                        <td><?= $unit['unit_code']; ?></td>
                                        <td><?= $unit['category_name']; ?></td>
                                        <td><?= $unit['stock']; ?></td>
                                        <td><?= number_format($unit['cost_rent_per_day'], 0); ?></td>
                                        <td><?= number_format($unit['cost_rent_per_month'], 0); ?></td>
                                        <td><img src="<?= base_url('/Assets/image/' . $unit['image']); ?>"
                                                alt="Image of <?= esc($unit['name']); ?>"
                                                style="width: 100px; height: auto;"></td>
                                        <td>
                                            <a href="<?= base_url('admin/edit_unit/' . $unit['id']); ?>"
                                                class="btn btn-warning">Edit</a>
                                            <a href="<?= base_url('admin/delete_unit/' . $unit['id']); ?>"
                                                class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <a href="<?= base_url('admin/create_unit'); ?>" class="btn btn-primary">Add New Unit</a>
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