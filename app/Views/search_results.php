<?= $this->extend('template/user_layout'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <?= view('template/topbar'); ?>

        <div class="container-fluid">
            <h2 class="h4 text-primary mb-3">Hasil Pencarian untuk: <?= esc($searchQuery); ?></h2>
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
            <div class="row">
                <div class="col-lg-6">

                </div>
            </div>
            <div class="card shadow mb-4">
                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="row">
                            <?php if (count($results) > 0): ?>
                                <?php foreach ($results as $result): ?>
                                    <div class="col-md-4">
                                        <div class="card card-custom shadow-sm">
                                            <div class="card-body text-center" style="padding: 20px;">
                                                <img src="<?= base_url('/Assets/image/' . $result['image']); ?>"
                                                    alt="<?= esc($result['name']); ?>"
                                                    style="width: 150px; height: auto; border-radius: 50%;">
                                                <!-- Circular and centered image -->
                                                <a href=" <?= base_url('unit/' . $result['unit_code']); ?>" class="list-group-item list-group-item-action">
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <h5 class="card-body text-center"><?= esc($result['name']); ?></h5>
                                                    </div>
                                                    <small>Kode Unit: <?= esc($result['unit_code']); ?></small>
                                                    <p class="mb-1">Stock:
                                                        <?php if ($result['stock'] > 0): ?>
                                                            <span class="badge badge-success">Available</span>
                                                        <?php else: ?>
                                                            <span class="badge badge-danger">Out of Stock</span>
                                                        <?php endif; ?>
                                                        (<?= esc($result['stock']); ?>)
                                                        <p class="mb-1">Cost per Day: Rp.<?= esc(number_format($result['cost_rent_per_day'], 0, ',', '.')); ?></p>
                                                        <p class="mb-1">Cost per Month: Rp.
                                                            <?= esc(number_format($result['cost_rent_per_month'], 0, ',', '.')); ?>
                                                        </p>
                                                        <a href="<?= base_url('rent_unit/' . $result['id']); ?>"
                                                            class="btn btn-primary btn-sm">
                                                            <i class="fas fa-shopping-cart"></i> Rent
                                                        </a>
                                                </a>

                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-warning" role="alert">
                            Tidak ada hasil yang ditemukan.
                        </div>
                    <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Content Wrapper -->
<?= $this->endSection(); ?>