<?= $this->extend('template/admin_layout'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h1>Edit Rental Details</h1>
    <form action="<?= base_url('admin/update_rental/' . $rental['id']); ?>" method="post">
        <div class="form-group">
            <label for="user_name">User:</label>
            <input type="text" id="user_name" value="<?= $rental['user_name']; ?>" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label for="unit_name">Unit:</label>
            <input type="text" id="unit_name" value="<?= $rental['unit_name']; ?>" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label for="rental_date">Rental Date:</label>
            <input type="text" id="rental_date" value="<?= $rental['rental_date']; ?>" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label for="days_rented">Days Rented:</label>
            <input type="text" id="days_rented" value="<?= $rental['days_rented']; ?>" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label for="cost">Cost:</label>
            <input type="text" id="cost" value="<?= number_format($rental['cost'], 2); ?>" class="form-control"
                disabled>
        </div>
        <div class="form-group">
            <label for="status_rent">Status Rent:</label>
            <select name="status_rent" id="status_rent" class="form-control">
                <option value="waiting_approval"
                    <?= $rental['status_rent'] === 'waiting_approval' ? 'selected' : ''; ?>>
                    Waiting Approval
                </option>
                <option value="rented" <?= $rental['status_rent'] === 'rented' ? 'selected' : ''; ?>>
                    Rented
                </option>
                <option value="waiting_return" <?= $rental['status_rent'] === 'waiting_return' ? 'selected' : ''; ?>>
                    Waiting Return
                </option>
                <option value="returned" <?= $rental['status_rent'] === 'returned' ? 'selected' : ''; ?>>
                    Returned
                </option>
            </select>
        </div>
        <div class="form-group">
            <label for="status_paid">Status Paid:</label>
            <input type="text" id="status_paid" value="<?= $rental['status_paid']; ?>" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label for="return_date">Returned Date:</label>
            <input type="text" id="return_date" value="<?= $rental['return_date']; ?>" class="form-control" disabled>
        </div>
        <button type="submit" class="btn btn-primary">Update Status</button>
    </form>
</div>
<?= $this->endSection(); ?>