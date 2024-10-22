<?= $this->extend('template/admin_layout'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h1>Edit Category</h1>
    <div class="row">
        <div class="col-md-6">
            <form action="<?= base_url('admin/store_category'); ?>" method="post">
                <div class="form-group">
                    <label for="name">Category Name:</label>
                    <input type="text" name="name" id="name" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Category</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>