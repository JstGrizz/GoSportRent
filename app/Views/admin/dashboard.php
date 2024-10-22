<?= $this->extend('template/admin_layout'); ?>

<?= $this->section('content'); ?>
<h1>Welcome to the Admin Dashboard</h1>
<p>Hello, <?= session()->get('username'); ?>! You are logged in as an admin.</p>
<!-- Logout Button -->
<form action="<?= base_url('logout'); ?>" method="post">
    <button type="submit">Log Out</button>
</form>
<?= $this->endSection(); ?>