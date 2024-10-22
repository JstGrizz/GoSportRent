<?= $this->extend('template/admin_layout'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h1>Policy Management</h1>
    <div>
        <a href="<?= base_url('admin/create_policy'); ?>" class="btn btn-primary">Create New Policy</a>
    </div>
    <br>
    <table class="table table-bordered">
        <thead class="thead-dark">
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
                    <td><?= number_format($policy['overdue_fee_per_day'], 2); ?></td>
                    <td>
                        <a href="<?= base_url('admin/edit_policy/' . $policy['id']); ?>" class="btn btn-warning">Edit</a>
                        <a href="<?= base_url('admin/delete_policy/' . $policy['id']); ?>" class="btn btn-danger"
                            onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>