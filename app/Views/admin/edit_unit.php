<?= $this->extend('template/admin_layout'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper -->

<style>
    /* Add this in your <head> inside a <style> tag or in an external CSS file */
    .chip {
        display: inline-block;
        padding: 0 25px;
        height: 35px;
        font-size: 16px;
        line-height: 35px;
        border-radius: 18px;
        background-color: #f1f1f1;
        margin: 5px;
        transition: background-color 0.3s, color 0.3s;
        user-select: none;
    }

    .chip label {
        cursor: pointer;
    }

    .chip input[type="checkbox"] {
        display: none;
    }

    .chip input[type="checkbox"]:checked+label {
        background-color: #007BFF;
        color: white;
    }
</style>
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <?= view('template/topbar'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <h1 class="h3 mb-2 text-gray-800">Edit Unit</h1>
            <div class="row">
                <div class="col-lg-6">
                </div>
            </div>
            <div class="card shadow mb-4">
                <!-- Basic Card Example -->
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
                                    <div class="chip">
                                        <input type="checkbox" id="cat-<?= $category['id']; ?>" name="category_ids[]"
                                            value="<?= $category['id']; ?>"
                                            <?= in_array($category['id'], array_column($selectedCategories, 'category_id')) ? 'checked' : ''; ?>>
                                        <label for="cat-<?= $category['id']; ?>"><?= $category['name']; ?></label>
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
        var chips = document.querySelectorAll('.chip input[type="checkbox"]');

        chips.forEach(function(chip) {
            chip.addEventListener('change', function() {
                var label = this.nextElementSibling;
                if (this.checked) {
                    label.style.backgroundColor = '#007BFF';
                    label.style.color = 'white';
                } else {
                    label.style.backgroundColor = '#f1f1f1';
                    label.style.color = 'black';
                }
            });
        });
    });
</script>




<?= $this->endSection(); ?>