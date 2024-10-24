<?= $this->extend('template/user_layout'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <?= view('template/topbar'); ?>

        <div class="container-fluid">
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
                                                    style="width: 100px; height: auto;">
                                                <a href="<?= base_url('unit/' . $result['unit_code']); ?>" class="list-group-item list-group-item-action">
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <h5 class="mb-1"><?= esc($result['name']); ?></h5>
                                                        <small>Kode Unit: <?= esc($result['unit_code']); ?></small>
                                                    <p class="mb-1">Category ID: <?= esc($result['category_id']); ?></p>
                                                    <p class="mb-1">Stock: <?= esc($result['stock']); ?></p>
                                                    <p class="mb-1">Cost per Day: <?= esc($result['cost_rent_per_day']); ?></p>
                                                    <p class="mb-1">Cost per Month: <?= esc($result['cost_rent_per_month']); ?></p>

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