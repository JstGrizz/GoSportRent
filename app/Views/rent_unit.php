<?= $this->extend('template/user_layout'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h1>Rent Unit: <?= esc($unit['name']); ?></h1>
    <form action="<?= base_url('process_rental'); ?>" method="post">
        <input type="hidden" name="unit_id" value="<?= esc($unit['id']); ?>">

        <div class="form-group">
            <label for="duration">Duration:</label>
            <input type="number" class="form-control" id="duration" name="duration" required min="1">
        </div>

        <div class="form-group">
            <label for="type">Rental Type:</label>
            <select class="form-control" id="type" name="type">
                <option value="day">Per Day</option>
                <option value="month">Per Month</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit Rental Request</button>
    </form>
</div>
<?= $this->endSection(); ?>