<?= $this->extend('template/admin_layout'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <?= view('template/topbar'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <h1 class="h3 mb-2 text-gray-800">Add New Unit</h1>
            <div class="row">
                <div class="col-lg-6">

                </div>
            </div>
            <div class="card shadow mb-4">
                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="<?= base_url('admin/store_unit'); ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Unit Name:</label>
                                <input type="text" name="name" id="name" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="category_id">Category:</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="stock">Stock:</label>
                                <input type="number" name="stock" id="stock" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="cost_rent_per_day">Cost Rent per Day:</label>
                                <input type="text" name="cost_rent_per_day" id="cost_rent_per_day" required
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="cost_rent_per_month">Cost Rent per Month:</label>
                                <input type="text" name="cost_rent_per_month" id="cost_rent_per_month" required
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="image">Image:</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Add Unit</button>
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