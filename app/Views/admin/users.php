<?= $this->extend('template/admin_layout'); ?>

<?= $this->section('content'); ?>
<h1>User Management</h1>
<div>
    <a href="<?= base_url('admin/create_user_form'); ?> " class="btn btn-primary">Add New User</a>
</div>
<br>
<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['id']; ?></td>
                <td><?= $user['name']; ?></td>
                <td><?= $user['username']; ?></td>
                <td><?= $user['email']; ?></td>
                <td><?= $user['role']; ?></td>
                <td>
                    <a href="<?= base_url('admin/edit_user/' . $user['id']); ?> " class="btn btn-warning">Edit</a>
                    <a href="<?= base_url('admin/delete_user/' . $user['id']); ?>" class="btn btn-danger"
                        onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection(); ?>