<?= $this->extend('template/user_layout'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <?= view('template/topbar'); ?>

        <div class="container-fluid">

            <h1 class="h3 mb-2 text-gray-800">Units List</h1>
            <div class="row">
                <div class="col-lg-6">

                </div>
            </div>
            <div class="card shadow mb-4">
                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="row">
                            <?php foreach ($units as $unit): ?>
                                <div class="col-md-4">
                                    <div class="card card-custom shadow-sm">
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
                    </div>
                </div>