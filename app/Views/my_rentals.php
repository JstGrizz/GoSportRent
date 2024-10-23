<?= $this->extend('template/user_layout'); ?>

<?= $this->section('content'); ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <?= view('template/topbar'); ?>

        <div class="container-fluid">

            <h1 class="h3 mb-2 text-gray-800">My Rentals</h1>
            <div class="row">
                <div class="col-lg-6">

                </div>
            </div>
            <div class="card shadow mb-4">
                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="row">
                            <?php foreach ($rentals as $rental): ?>
                            <div class="col-md-4">
                                <div class="card card-custom shadow-sm">
                                    <div class="card-body text-center">
                                        <img src="<?= base_url('/Assets/image/' . $rental['image']); ?>"
                                            alt="Image of <?= esc($rental['unit_name']); ?>"
                                            class="img-fluid mb-3 mx-auto d-block"
                                            style="max-height: 200px; width: auto; border-radius: 50%;">
                                        <!-- Adjusted for circular and centered image -->
                                        <h5 class="card-title"><?= esc($rental['unit_name']); ?></h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Unit Code:
                                            <?= esc($rental['unit_code']); ?></h6>
                                        <p class="card-text">
                                            <strong>Rental Date:</strong> <?= esc($rental['rental_date']); ?><br>
                                            <strong>Days Rented:</strong> <?= esc($rental['days_rented']); ?><br>
                                            <strong>Cost:</strong> <?= esc($rental['cost']); ?>
                                        </p>
                                        <p class="card-text">
                                            <strong>Status:</strong>
                                            <span
                                                class="badge badge-<?= $rental['status_rent'] === 'active' ? 'success' : 'secondary'; ?>">
                                                <?= esc($rental['status_rent'] ?: 'Unknown'); ?>
                                            </span><br>
                                            <strong>Payment:</strong>
                                            <span
                                                class="badge badge-<?= $rental['status_paid'] === 'paid' ? 'success' : 'danger'; ?>">
                                                <?= esc($rental['status_paid'] ?: 'Not Paid'); ?>
                                            </span>
                                        </p>
                                        <div class="text-center mt-3">
                                            <?php if ($rental['status_paid'] !== 'paid'): ?>
                                            <a href="<?= base_url('pay_rental/' . $rental['id']); ?>"
                                                class="btn btn-success">Pay</a>
                                            <?php endif; ?>
                                            <?php if ($rental['status_rent'] === 'rented'): ?>
                                            <a href="<?= base_url('return_rental/' . $rental['id']); ?>"
                                                class="btn btn-info"
                                                onclick="return confirm('Are you sure you want to return this item?')">Return</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>