<?= $this->extend('template/admin_layout'); ?>

<?= $this->section('content'); ?>
<h1>User Management</h1>
<a href="<?= base_url('admin/create_user_form'); ?>">Add New User</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
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
                <td><?= $user['username']; ?></td>
                <td><?= $user['email']; ?></td>
                <td><?= $user['role']; ?></td>
                <td>
                    <a href="<?= base_url('admin/edit_user/' . $user['id']); ?>">Edit</a>
                    <a href="<?= base_url('admin/delete_user/' . $user['id']); ?>"
                        onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection(); ?>