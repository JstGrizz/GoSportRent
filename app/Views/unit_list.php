<?= $this->extend('template/user_layout'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <?= view('template/topbar'); ?>

        <div class="container-fluid">

            <h1 class="h3 mb-2 text-gray-800">Units List</h1>
            <!-- Flashdata Alert -->
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('error'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('success'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="row">
                        <?php foreach ($units as $unit): ?>
                            <div class="col-md-4">
                                <div class="card card-custom shadow-sm">
                                    <div class="card-body text-center" style="padding: 20px;">
                                        <img src="<?= base_url('/Assets/image/' . $unit['image']); ?>"
                                            alt="<?= 'Image of ' . esc($unit['name']); ?>" class="mx-auto d-block mb-2"
                                            style="width: 200px; height: auto; border-radius: 50%;">
                                        <h5 class="card-title"><?= esc($unit['name']); ?></h5>
                                        <h6 class="card-subtitle mb-1 text-muted">Unit Code:
                                            <?= esc($unit['unit_code']); ?></h6>
                                        <p class="card-text mb-1">Categories:
                                            <?php foreach ($unit['categories'] as $category): ?>
                                                <span class="badge badge-secondary"><?= esc($category['name']); ?></span>
                                            <?php endforeach; ?>
                                        </p>
                                        <p class="card-text">
                                            Stock:
                                            <?php if ($unit['stock'] > 0): ?>
                                                <span class="badge badge-success">Available</span>
                                            <?php else: ?>
                                                <span class="badge badge-danger">Out of Stock</span>
                                            <?php endif; ?>
                                            (<?= esc($unit['stock']); ?>)
                                        </p>
                                        <p class="card-text mb-1">Cost per Day: Rp. <?= esc(number_format($unit['cost_rent_per_day'], 0, ',', '.')); ?></p>
                                        <p class="card-text mb-3">Cost per Month: Rp. <?= esc(number_format($unit['cost_rent_per_month'], 0, ',', '.')); ?></p>
                                        <a href="<?= base_url('rent_unit/' . $unit['id']); ?>"
                                            class="btn btn-primary btn-sm">
                                            <i class="fas fa-shopping-cart"></i> Rent
                                        </a>
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
<!-- End of Content Wrapper -->
<?= $this->endSection(); ?>