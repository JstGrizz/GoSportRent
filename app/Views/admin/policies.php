<?= $this->extend('template/admin_layout'); ?>

<?= $this->section('content'); ?>
<h1>Policy Management</h1>
<a href="<?= base_url('admin/create_policy'); ?>">Create New Policy</a>
<table>
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
            <td><?= $policy['overdue_fee_per_day']; ?></td>
            <td>
                <a href="<?= base_url('admin/edit_policy/' . $policy['id']); ?>">Edit</a>
                <a href="<?= base_url('admin/delete_policy/' . $policy['id']); ?>"
                    onclick="return confirm('Are you sure?');">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection(); ?>