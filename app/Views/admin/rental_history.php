<?= $this->extend('template/admin_layout'); ?>

<?= $this->section('content'); ?>
<h1>Rental History</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>User Name</th>
            <th>Unit Name</th>
            <th>Rental Date</th>
            <th>Return Date</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rentals as $rental): ?>
            <tr>
                <td><?= $rental['id']; ?></td>
                <td><?= $rental['user_name']; ?></td>
                <td><?= $rental['unit_name']; ?></td>
                <td><?= $rental['rental_date']; ?></td>
                <td><?= $rental['return_date']; ?></td>
                <td><?= $rental['status']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection(); ?>