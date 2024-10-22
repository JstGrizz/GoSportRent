<?= $this->extend('template/admin_layout'); ?>

<?= $this->section('content'); ?>
<h1>Edit User</h1>
<form action="<?= base_url('admin/update_user/' . $user['id']); ?>" method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" value="<?= $user['username']; ?>" required>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="<?= $user['email']; ?>" required>

    <label for="role">Role:</label>
    <select name="role" id="role">
        <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
        <option value="user" <?= $user['role'] === 'user' ? 'selected' : ''; ?>>User</option>
    </select>

    <button type="submit">Update User</button>
</form>
<?= $this->endSection(); ?>