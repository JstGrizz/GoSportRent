<?= $this->extend('template/admin_layout'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h1>Edit Profile</h1>
    <form action="<?= base_url('update_profile'); ?>" method="post">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="<?= esc($user['name']); ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= esc($user['email']); ?>"
                required>
        </div>
        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>
<?= $this->endSection(); ?>