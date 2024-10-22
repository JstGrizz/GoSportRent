<?= $this->extend('template/admin_layout'); ?>

<?= $this->section('content'); ?>
<h1>Rental Management</h1>
<table class="table table-bordered">
    <thead class="thead-dark">
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
                <td><?= ucwords(str_replace('_', ' ', $rental['status_rent'])); ?></td>
                <td><?= ucwords(str_replace(['_', 'with fee'], [' ', 'with Fee'], $rental['status_paid'])); ?></td>
                <td><?= $rental['return_date'] ?: 'N/A'; ?></td>
                <td>
                    <a href="<?= base_url('admin/edit_rental/' . $rental['id']); ?>" class="btn btn-warning">Edit</a>
                    <a href="<?= base_url('admin/delete_rental/' . $rental['id']); ?>" class="btn btn-danger"
                        onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection(); ?>