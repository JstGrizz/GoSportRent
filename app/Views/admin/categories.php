<?= $this->extend('template/admin_layout'); ?>

<?= $this->section('content'); ?>
<h1>Category Management</h1>
<div>
    <a href="<?= base_url('admin/create_category'); ?>" class="btn btn-primary">Add New Category</a>
</div>
<br>
<table class="table table-bordered">
    <thead class="thead-dark">
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
                    <a href="<?= base_url('admin/edit_category/' . $category['id']); ?>" class="btn btn-warning">Edit</a>
                    <a href="<?= base_url('admin/delete_category/' . $category['id']); ?>" class="btn btn-danger"
                        onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection(); ?>