<?= $this->extend('template/admin_layout'); ?>

<?= $this->section('content'); ?>
<h1>Category Management</h1>
<a href="<?= base_url('admin/create_category'); ?>">Add New Category</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $category): ?>
            <tr>
                <td><?= $category['id']; ?></td>
                <td><?= $category['name']; ?></td>
                <td>
                    <a href="<?= base_url('admin/edit_category/' . $category['id']); ?>">Edit</a>
                    <a href="<?= base_url('admin/delete_category/' . $category['id']); ?>"
                        onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection(); ?>