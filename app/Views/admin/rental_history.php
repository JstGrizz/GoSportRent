<?= $this->extend('template/admin_layout'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <?= view('template/topbar'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <h1 class="h3 mb-2 text-gray-800">User Management</h1>
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
                                    <th>User</th>
                                    <th>Unit</th>
                                    <th>Rental Date</th>
                                    <th>Days Rented</th>
                                    <th>Cost</th>
                                    <th>Status Rent</th>
                                    <th>Status Paid</th>
                                    <th>Returned Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($rentals as $rental): ?>
                                    <tr>
                                        <td><?= $rental['id']; ?></td>
                                        <td><?= $rental['user_name']; ?></td>
                                        <td><?= $rental['unit_name']; ?></td>
                                        <td><?= $rental['rental_date']; ?></td>
                                        <td><?= $rental['days_rented']; ?></td>
                                        <td><?= number_format($rental['cost'], 0); ?></td>
                                        <td style="background-color: <?= getColorForStatusRent($rental['status_rent']); ?>">
                                            <?= ucwords(str_replace('_', ' ', $rental['status_rent'])); ?></td>
                                        <td style="background-color: <?= getColorForStatusPaid($rental['status_paid']); ?>">
                                            <?= ucwords(str_replace(['_', 'with fee'], [' ', 'with Fee'], $rental['status_paid'])); ?>
                                        </td>
                                        <td><?= $rental['return_date'] ?: 'N/A'; ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/edit_rental/' . $rental['id']); ?>"
                                                class="btn btn-warning">Edit</a>
                                            <a href="<?= base_url('admin/delete_rental/' . $rental['id']); ?>"
                                                class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
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

<?php
// Helper function to determine the color based on the rental status
function getColorForStatusRent($status)
{
    switch ($status) {
        case 'rented':
        case 'returned':
            return '#d4edda'; // Green
        case 'waiting_approval':
        case 'waiting_return':
            return '#fff3cd'; // Yellow
        default:
            return ''; // No color
    }
}

// Helper function to determine the color based on the paid status
function getColorForStatusPaid($status)
{
    switch ($status) {
        case 'unpaid':
            return '#f8d7da'; // Red
        case 'paid':
            return '#d4edda'; // Green
        case 'paid_with_fee':
            return '#fff3cd'; // Yellow
        default:
            return ''; // No color
    }
}
?>