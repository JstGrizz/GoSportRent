<?= $this->extend('template/admin_layout'); ?>

<?= $this->section('content'); ?>
<h1>Add New Category</h1>
<form action="<?= base_url('admin/store_category'); ?>" method="post">
    <label for="name">Category Name:</label>
    <input type="text" name="name" id="name" required>
    <button type="submit">Add Category</button>
</form>
<?= $this->endSection(); ?>