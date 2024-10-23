<?= $this->extend('template/admin_layout'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h1>Add New Policy</h1>
    <div class="row">
        <div class="col-md-6">
            <form action="<?= base_url('admin/store_policy'); ?>" method="post">
                <div class="form-group">
                    <label for="max_rental_days">Max Rental Days:</label>
                    <input type="number" name="max_rental_days" id="max_rental_days" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="overdue_fee_per_day">Overdue Fee Per Day:</label>
                    <input type="text" name="overdue_fee_per_day" id="overdue_fee_per_day" class="form-control"
                        required>
                </div>
                <button type="submit" class="btn btn-primary">Save Policy</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>