<?= $this->extend('template/admin_layout'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h1>Edit Category</h1>
    <div class="row">
        <div class="col-md-6">
            <form action="<?= base_url('admin/update_category/' . $category['id']); ?>" method="post">
                <div class="form-group">
                    <label for="name">Category Name:</label>
                    <input type="text" name="name" id="name" value="<?= $category['name']; ?>" required
                        class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Update Category</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>