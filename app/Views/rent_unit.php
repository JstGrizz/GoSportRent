<?= $this->extend('template/user_layout'); ?>

<?= $this->section('content'); ?>
<style>
    .card {
        background: none;
        border: none;
        box-shadow: none;
    }


    .col-md-8 {
        margin-left: auto;

    }
</style>

<div class="container mt-5">
    <div class="row justify-content-end">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    <h2 class="card-title">Rent Unit: <?= esc($unit['name']); ?></h2>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('process_rental'); ?>" method="post">
                        <input type="hidden" name="unit_id" value="<?= esc($unit['id']); ?>">

                        <div class="form-group">
                            <label for="duration">Duration:</label>
                            <input type="number" class="form-control" id="duration" name="duration" required min="1" placeholder="Enter rental duration">
                        </div>

                        <div class="form-group">
                            <label for="type">Rental Type:</label>
                            <select class="form-control" id="type" name="type">
                                <option value="day">Per Day</option>
                                <option value="month">Per Month</option>
                            </select>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mt-3">Submit Rental Request</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?= $this->endSection(); ?>