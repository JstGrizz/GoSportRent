<?= $this->extend('template/admin_layout'); ?>

<?= $this->section('content'); ?>
<h1>Add New Unit</h1>
<form action="<?= base_url('admin/store_unit'); ?>" method="post">
    <label for="name">Unit Name:</label>
    <input type="text" name="name" id="name" required>

    <label for="unit_code">Unit Code:</label>
    <input type="text" name="unit_code" id="unit_code" required>

    <label for="category_id">Category:</label>
    <select name="category_id" id="category_id">
        <?php foreach ($categories as $category): ?>
            <option value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
        <?php endforeach; ?>
    </select>

    <label for="stock">Stock:</label>
    <input type="number" name="stock" id="stock" required>

    <label for="cost_rent_per_day">Cost Rent per Day:</label>
    <input type="text" name="cost_rent_per_day" id="cost_rent_per_day" required>

    <label for="cost_rent_per_month">Cost Rent per Month:</label>
    <input type="text" name="cost_rent_per_month" id="cost_rent_per_month" required>

    <button type="submit">Add Unit</button>
</form>
<?= $this->endSection(); ?>