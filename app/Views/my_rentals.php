<?= $this->extend('template/user_layout'); ?>

<?= $this->section('content'); ?>
<div class="container mt-5">
    <h1 class="text-center mb-4">My Rentals</h1>
    <table class="table table-striped table-hover table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Unit Name</th>
                <th>Unit Code</th>
                <th>Rental Date</th>
                <th>Days Rented</th>
                <th>Cost</th>
                <th>Status</th>
                <th>Payment</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rentals as $rental): ?>
                <tr>
                    <td><?= esc($rental['unit_name']); ?></td>
                    <td><?= esc($rental['unit_code']); ?></td>
                    <td><?= esc($rental['rental_date']); ?></td>
                    <td><?= esc($rental['days_rented']); ?></td>
                    <td><?= esc($rental['cost']); ?></td>
                    <td>
                        <span class="badge badge-<?= $rental['status_rent'] === 'active' ? 'success' : 'secondary'; ?>">
                            <?= esc($rental['status_rent']); ?>
                        </span>
                    </td>
                    <td>
                        <span class="badge badge-<?= $rental['status_paid'] === 'paid' ? 'success' : 'danger'; ?>">
                            <?= esc($rental['status_paid']); ?>
                        </span>
                    </td>
                    <td>
                        <?php if ($rental['status_paid'] !== 'paid'): ?>
                            <a href="<?= base_url('pay_rental/' . $rental['id']); ?>" class="btn btn-success btn-sm">Pay</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>