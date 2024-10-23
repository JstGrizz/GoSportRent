<?= $this->extend('template/user_layout'); ?>

<?= $this->section('content'); ?>
<h1 class="text-center mb-4">Available Units</h1>
<style>
    body {
        background-color: #f4f4f9;
    }

    .container {
        margin-top: 100px;
    }

    .card-custom {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 15px;
        transition: transform 0.2s ease-in-out;
        text-align: center;

    }

    .card-custom:hover {
        transform: translateY(-10px);

    }

    .card .btn {
        margin-top: 10px;

    }
</style>

<div class="container">
    <div class="row">
        <?php foreach ($units as $unit): ?>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm card-custom">
                    <div class="card-body">
                        <img src="<?= base_url('/Assets/image/' . $unit['image']); ?>"
                            alt="Image of <?= esc($unit['name']); ?>" style="width: 100px; height: auto;">
                        <h5 class="card-title"><?= esc($unit['name']); ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Unit Code: <?= esc($unit['unit_code']); ?></h6>
                        <p class="card-text">Category: <?= esc($unit['category_name']); ?></p>
                        <p class="card-text">
                            Stock:
                            <?php if ($unit['stock'] > 0): ?>
                                <span class="badge badge-success">Available</span>
                            <?php else: ?>
                                <span class="badge badge-danger">Out of Stock</span>
                            <?php endif; ?>
                            (<?= esc($unit['stock']); ?>)
                        </p>
                        <p class="card-text">Cost per Day: <?= esc($unit['cost_rent_per_day']); ?></p>
                        <p class="card-text">Cost per Month: <?= esc($unit['cost_rent_per_month']); ?></p>
                        <a href="<?= base_url('rent_unit/' . $unit['id']); ?>" class="btn btn-primary btn-sm">
                            <i class="fas fa-shopping-cart"></i> Rent
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?= $this->endSection(); ?>