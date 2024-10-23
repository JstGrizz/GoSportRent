<?= $this->extend('template/user_layout'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h1>Available Units</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Unit Code</th>
                <th>Category</th>
                <th>Stock</th>
                <th>Cost per Day</th>
                <th>Cost per Month</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($units as $unit): ?>
                <tr>
                    <td><?= esc($unit['id']); ?></td>
                    <td><?= esc($unit['name']); ?></td>
                    <td><?= esc($unit['unit_code']); ?></td>
                    <td><?= esc($unit['category_name']); ?></td>
                    <td><?= esc($unit['stock']); ?></td>
                    <td><?= esc($unit['cost_rent_per_day']); ?></td>
                    <td><?= esc($unit['cost_rent_per_month']); ?></td>
                    <td><a href="<?= base_url('rent_unit/' . $unit['id']); ?>" class="btn btn-primary">Rent</a></td>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>