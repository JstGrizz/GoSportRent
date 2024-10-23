<?= $this->extend('template/user_layout'); ?>

<?= $this->section('content'); ?>
<h1 class="text-center mb-4">Available Units</h1>
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