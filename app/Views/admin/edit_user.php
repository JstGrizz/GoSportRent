<?= $this->extend('template/admin_layout'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <h1>Edit User</h1>
    <div class="row">
        <div class="col-md-8">
            <form action="<?= base_url('admin/update_user/' . $user['id']); ?>" method="post">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" value="<?= $user['name']; ?>" required
                        class="form-control">
                </div>

                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" value="<?= $user['username']; ?>" required
                        class="form-control">
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" value="<?= $user['email']; ?>" required
                        class="form-control">
                </div>

                <div class="form-group">
                    <label for="role">Role:</label>
                    <select name="role" id="role" class="form-control">
                        <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
                        <option value="user" <?= $user['role'] === 'user' ? 'selected' : ''; ?>>User</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update User</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>