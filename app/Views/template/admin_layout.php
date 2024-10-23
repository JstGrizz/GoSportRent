<!DOCTYPE html>
<html lang="en">

<head>
    <!DOCTYPE html>
    <html lang="en">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard</title>

    <link href="<?= base_url('/Assets/startbootstrap-sb-admin-2-master/vendor/fontawesome-free/css/all.min.css'); ?>"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="<?= base_url('/Assets/startbootstrap-sb-admin-2-master/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
</head>

<body class="page-top">
    <div id="wrapper">
        <?= view('template/sidebar'); ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?= $this->renderSection('content'); ?>
            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <span class="text-center my-auto">Copyright &copy; Your Website 2020</span>
                </div>
            </footer>
        </div>
        <!-- End of Content Wrapper -->
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('/Assets/startbootstrap-sb-admin-2-master/vendor/jquery/jquery.min.js'); ?>"></script>
    <script
        src="<?= base_url('/Assets/startbootstrap-sb-admin-2-master/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>">
    </script>

    <!-- Core plugin JavaScript-->
    <script
        src="<?= base_url('/Assets/startbootstrap-sb-admin-2-master/vendor/jquery-easing/jquery.easing.min.js'); ?>">
    </script>
    <script src="<?= base_url('/Assets/startbootstrap-sb-admin-2-master/js/sb-admin-2.min.js'); ?>"></script>


    <!-- Page level plugins -->
    <script src="<?= base_url('/Assets/startbootstrap-sb-admin-2-master/vendor/chart.js/Chart.min.js'); ?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('/Assets/startbootstrap-sb-admin-2-master/js/demo/chart-area-demo.js'); ?>"></script>
    <script src="<?= base_url('/Assets/startbootstrap-sb-admin-2-master/js/demo/chart-pie-demo.js'); ?>"></script>

</body>

</html>