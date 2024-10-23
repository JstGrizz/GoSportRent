<?= $this->extend('template/user_layout'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h1>My Rentals</h1>
    <table class="table">
        <thead>
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
                    <td><?= esc($rental['status_rent']); ?></td>
                    <td><?= esc($rental['status_paid']); ?></td>
                    <td>
                        <?php if ($rental['status_paid'] !== 'paid'): ?>
                            <a href="<?= base_url('pay_rental/' . $rental['id']); ?>" class="btn btn-success">Pay</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>