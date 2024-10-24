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
            <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('error'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php endif; ?>
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="<?= base_url('admin/store_unit'); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Unit Name:</label>
                            <input type="text" name="name" id="name" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Categories:</label>
                            <div class="chip-container">
                                <?php foreach ($categories as $category): ?>
                                <div class="chip" data-id="<?= $category['id']; ?>">
                                    <?= $category['name']; ?>
                                </div>
                                <!-- Hidden inputs to store the category IDs -->
                                <input type="checkbox" name="category_ids[]" id="cat-<?= $category['id']; ?>"
                                    value="<?= $category['id']; ?>" class="d-none">
                                <?php endforeach; ?>
                            </div>
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
                        <div>
                            <button type="submit" class="btn btn-primary">Add Unit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

</div>
<!-- End of Content Wrapper -->
<script>
document.querySelectorAll('.chip').forEach(chip => {
    chip.addEventListener('click', function() {
        const input = document.getElementById('cat-' + this.dataset.id);
        input.checked = !input.checked;
        this.classList.toggle('selected');
    });
});
</script>
<style>
.chip {
    display: inline-block;
    padding: 5px 10px;
    border: 1px solid #ccc;
    cursor: pointer;
    border-radius: 25px;
    margin-right: 5px;
    background-color: #f8f9fa;
}

.chip.selected {
    background-color: #007bff;
    color: white;
}
</style>
<?= $this->endSection(); ?>