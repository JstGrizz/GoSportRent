<?= $this->extend('template/admin_layout'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <?= view('template/topbar'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <h1 class="h3 mb-2 text-gray-800">Edit Rentals Detail</h1>
            <div class="row">
                <div class="col-lg-6">

                </div>
            </div>
            <div class="card shadow mb-4">
                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="<?= base_url('admin/update_rental/' . $rental['id']); ?>" method="post">
                            <div class="form-group">
                                <label for="user_name">User:</label>
                                <input type="text" id="user_name" value="<?= $rental['user_name']; ?>"
                                    class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label for="unit_name">Unit:</label>
                                <input type="text" id="unit_name" value="<?= $rental['unit_name']; ?>"
                                    class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label for="rental_date">Rental Date:</label>
                                <input type="text" id="rental_date" value="<?= $rental['rental_date']; ?>"
                                    class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label for="days_rented">Days Rented:</label>
                                <input type="text" id="days_rented" value="<?= $rental['days_rented']; ?>"
                                    class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label for="cost">Cost:</label>
                                <input type="text" id="cost" value="<?= number_format($rental['cost'], 2); ?>"
                                    class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label for="status_rent">Status Rent:</label>
                                <select name="status_rent" id="status_rent" class="form-control">
                                    <option value="waiting_approval"
                                        <?= $rental['status_rent'] === 'waiting_approval' ? 'selected' : ''; ?>>
                                        Waiting Approval
                                    </option>
                                    <option value="rented"
                                        <?= $rental['status_rent'] === 'rented' ? 'selected' : ''; ?>>
                                        Rented
                                    </option>
                                    <option value="waiting_return"
                                        <?= $rental['status_rent'] === 'waiting_return' ? 'selected' : ''; ?>>
                                        Waiting Return
                                    </option>
                                    <option value="returned"
                                        <?= $rental['status_rent'] === 'returned' ? 'selected' : ''; ?>>
                                        Returned
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status_paid">Status Paid:</label>
                                <input type="text" id="status_paid" value="<?= $rental['status_paid']; ?>"
                                    class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label for="return_date">Returned Date:</label>
                                <input type="text" id="return_date" value="<?= $rental['return_date']; ?>"
                                    class="form-control" disabled>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Status</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

</div>
<!-- End of Content Wrapper -->
<?= $this->endSection(); ?>