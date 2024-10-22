<?= $this->extend('template/admin_layout'); ?>

<?= $this->section('content'); ?>
<h1>Unit Management</h1>
<a href="<?= base_url('admin/create_unit'); ?>">Add New Unit</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Unit Code</th>
            <th>Category</th>
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
            <td>
                <a href="<?= base_url('admin/edit_unit/' . $unit['id']); ?>">Edit</a>
                <a href="<?= base_url('admin/delete_unit/' . $unit['id']); ?>"
                    onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection(); ?>