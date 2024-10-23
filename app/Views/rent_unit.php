<?= $this->extend('template/user_layout'); ?>

<?= $this->section('content'); ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <?= view('template/topbar'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <h1 class="h3 mb-2 text-gray-800">Rental Unit</h1>
            <div class="row">
                <div class="col-lg-6">

                </div>
            </div>

            <div class="card shadow mb-4">
                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-6"> <!-- Menambahkan col-md-6 untuk menjaga lebar card lebih kecil -->
                                <div class="card">
                                    <div class="card-header bg-primary text-white text-center">
                                        <h2 class="card-title">Rent Unit: <?= esc($unit['name']); ?></h2>
                                    </div>
                                    <div class="card-body">
                                        <form action="<?= base_url('process_rental'); ?>" method="post">
                                            <div class="form-group">
                                                <label for="type">Rental Type:</label>
                                                <select class="form-control" id="type" name="type">
                                                    <option value="day">Per Day</option>
                                                    <option value="month">Per Month</option>
                                                </select>
                                            </div>
                                            <input type="hidden" name="unit_id" value="<?= esc($unit['id']); ?>">
                                            <div class="form-group">
                                                <label for="stock">Amount Unit:</label>
                                                <input type="number" class="form-control" id="amount" name="amount" required min="1"
                                                    placeholder="Enter amount unit">
                                            </div>
                                            <div class="form-group">
                                                <label for="duration">Duration:</label>
                                                <input type="number" class="form-control" id="duration" name="duration" required min="1"
                                                    placeholder="Enter rental duration">
                                            </div>

                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary mt-3">Submit Rental Request</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?= $this->endSection(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>