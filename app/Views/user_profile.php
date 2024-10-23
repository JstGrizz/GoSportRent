<?= $this->extend('template/admin_layout'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h1>User Profile</h1>
    <div class="card">
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" class="form-control" value="<?= esc($user['username']); ?>"
                        disabled>
                </div>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" class="form-control" value="<?= esc($user['name']); ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" class="form-control" value="<?= esc($user['email']); ?>" disabled>
                </div>
                <div class="form-group">
                    <a href="<?= base_url('edit_profile'); ?>" class="btn btn-primary">Edit Profile</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>