<?= $this->extend('template/admin_layout'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <?= view('template/topbar'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <h1 class="h3 mb-2 text-gray-800">Edit Unit</h1>
            <!-- Flashdata Alert -->
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
            <div class="row">
                <div class="col-lg-6">
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="<?= base_url('admin/update_unit/' . $unit['id']); ?>" method="post"
                        enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Unit Name:</label>
                            <input type="text" name="name" id="name" value="<?= $unit['name']; ?>" required
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="unit_code">Unit Code:</label>
                            <input class="form-control" type="text" name="unit_code" id="unit_code"
                                value="<?= $unit['unit_code']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Categories:</label>
                            <div class="chip-container">
                                <?php foreach ($categories as $category): ?>
                                    <div class="chip" data-id="<?= $category['id']; ?>" onclick="toggleChip(this)">
                                        <?= $category['name']; ?>
                                        <input type="checkbox" id="cat-<?= $category['id']; ?>" name="category_ids[]"
                                            value="<?= $category['id']; ?>" class="d-none"
                                            <?= in_array($category['id'], array_column($selectedCategories, 'category_id')) ? 'checked' : ''; ?>>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="stock">Stock:</label>
                            <input type="number" name="stock" id="stock" value="<?= $unit['stock']; ?>" required
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="cost_rent_per_day">Cost Rent per Day:</label>
                            <input type="text" name="cost_rent_per_day" id="cost_rent_per_day"
                                value="<?= $unit['cost_rent_per_day']; ?>" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="cost_rent_per_month">Cost Rent per Month:</label>
                            <input type="text" name="cost_rent_per_month" id="cost_rent_per_month"
                                value="<?= $unit['cost_rent_per_month']; ?>" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="image">Unit Image:</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Unit</button>
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
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.chip').forEach(chip => {
            const checkbox = document.querySelector(`#cat-${chip.dataset.id}`);
            chip.classList.toggle('selected', checkbox.checked);
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const chips = document.querySelectorAll('.chip');
        chips.forEach(chip => {
            chip.addEventListener('click', function() {
                const checkbox = document.querySelector(`#cat-${this.dataset.id}`);
                checkbox.checked = !checkbox.checked;
                this.classList.toggle('selected', checkbox.checked);
            });
        });
    });
</script>
<style>
    .chip {
        display: inline-block;
        padding: 5px 15px;
        margin: 2px 5px;
        font-size: 14px;
        text-align: center;
        border-radius: 25px;
        background-color: #f1f1f1;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
    }

    .chip.selected {
        background-color: #007bff;
        color: white;
    }

    .chip label {
        cursor: pointer;
        display: block;
    }

    .chip input[type="checkbox"] {
        position: absolute;
        clip: rect(0, 0, 0, 0);
        pointer-events: none;
    }
</style>
<?= $this->endSection(); ?>