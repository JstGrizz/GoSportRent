<?= $this->extend('template/admin_layout'); ?>

<?= $this->section('content'); ?>
<h1>Edit Category</h1>
<form action="<?= base_url('admin/update_category/' . $category['id']); ?>" method="post">
    <label for="name">Category Name:</label>
    <input type="text" name="name" id="name" value="<?= $category['name']; ?>" required>
    <button type="submit">Update Category</button>
</form>
<?= $this->endSection(); ?>