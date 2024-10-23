<?= $this->extend('template/admin_layout'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h1>Add New Unit</h1>
    <div class="row">
        <div class="col-md-6">
            <form action="<?= base_url('admin/store_unit'); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Unit Name:</label>
                    <input type="text" name="name" id="name" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="category_id">Category:</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="stock">Stock:</label>
                    <input type="number" name="stock" id="stock" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="cost_rent_per_day">Cost Rent per Day:</label>
                    <input type="text" name="cost_rent_per_day" id="cost_rent_per_day" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="cost_rent_per_month">Cost Rent per Month:</label>
                    <input type="text" name="cost_rent_per_month" id="cost_rent_per_month" required
                        class="form-control">
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Add Unit</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>