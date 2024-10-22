<?= $this->extend('template/admin_layout'); ?>

<?= $this->section('content'); ?>
<h1>Unit Management</h1>
<div>
    <a href="<?= base_url('admin/create_unit'); ?>" class="btn btn-primary">Add New Unit</a>
</div>
<br>

<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Unit Code</th>
            <th>Category</th>
            <th>Stock</th>
            <th>Cost Per Day</th>
            <th>Cost Per Month</th>
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
                <td>
                    <a href="<?= base_url('admin/edit_unit/' . $unit['id']); ?>" class="btn btn-primary">Edit</a>
                    <a href="<?= base_url('admin/delete_unit/' . $unit['id']); ?>" class="btn btn-warning"
                        onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection(); ?>