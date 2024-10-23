<?= $this->extend('template/user_layout'); ?>

<?= $this->section('content'); ?>

<h1 class="text-center mb-4">My Rentals</h1>

<div class="container mt-5">
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

    .badge-danger {
        background-color: #dc3545;
    }
    </style>

    <div class="row">
        <?php foreach ($rentals as $rental): ?>
        <div class="col-md-4">
            <div class="card card-custom shadow-sm">
                <div class="card-body">
                    <img src="<?= base_url('/Assets/image/' . $rental['image']); ?>"
                        alt="Image of <?= esc($rental['unit_name']); ?>" class="img-fluid mb-3"
                        style="max-height: 200px;">
                    <h5 class="card-title"><?= esc($rental['unit_name']); ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted">Unit Code: <?= esc($rental['unit_code']); ?></h6>
                    <p class="card-text">
                        <strong>Rental Date:</strong> <?= esc($rental['rental_date']); ?><br>
                        <strong>Days Rented:</strong> <?= esc($rental['days_rented']); ?><br>
                        <strong>Cost:</strong> <?= esc($rental['cost']); ?>
                    </p>
                    <p class="card-text">
                        <strong>Status:</strong>
                        <span class="badge badge-<?= $rental['status_rent'] === 'active' ? 'success' : 'secondary'; ?>">
                            <?= esc($rental['status_rent'] ?: 'Unknown'); ?>
                        </span><br>
                        <strong>Payment:</strong>
                        <span class="badge badge-<?= $rental['status_paid'] === 'paid' ? 'success' : 'danger'; ?>">
                            <?= esc($rental['status_paid'] ?: 'Not Paid'); ?>
                        </span>
                    </p>
                    <div class="text-center">
                        <?php if ($rental['status_paid'] !== 'paid'): ?>
                        <a href="<?= base_url('pay_rental/' . $rental['id']); ?>" class="btn btn-success">Pay</a>
                        <?php endif; ?>
                        <?php if ($rental['status_rent'] === 'rented'): ?>
                        <a href="<?= base_url('return_rental/' . $rental['id']); ?>" class="btn btn-info"
                            onclick="return confirm('Are you sure you want to return this item?')">Return</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection(); ?>