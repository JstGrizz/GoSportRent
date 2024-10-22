<?= $this->extend('template/admin_layout'); ?>

<?= $this->section('content'); ?>
<h1>Edit Policy</h1>
<form action="<?= base_url('admin/update_policy/' . $policy['id']); ?>" method="post">
    <label for="max_rental_days">Max Rental Days:</label>
    <input type="number" name="max_rental_days" id="max_rental_days" value="<?= $policy['max_rental_days']; ?>"
        required>

    <label for="overdue_fee_per_day">Overdue Fee Per Day:</label>
    <input type="text" name="overdue_fee_per_day" id="overdue_fee_per_day"
        value="<?= $policy['overdue_fee_per_day']; ?>" required>

    <button type="submit">Update Policy</button>
</form>
<?= $this->endSection(); ?>