<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>
    <link href="<?= base_url('/Assets/startbootstrap-sb-admin-2-master/vendor/fontawesome-free/css/all.min.css'); ?>"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="<?= base_url('/Assets/startbootstrap-sb-admin-2-master/css/sb-admin-2.min.css'); ?>" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" role="form" action="<?= base_url('auth/login') ?>" method="post">
                                        <div class="form-group">
                                            <?php if (session()->getFlashdata('error')): ?>
                                                <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
                                            <?php endif; ?>
                                            <?php if (session()->getFlashdata('success')): ?>
                                                <p style="color: green;"><?= session()->getFlashdata('success') ?></p>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="username" id="username"
                                                class="form-control form-control-user" placeholder="Enter Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" id="password"
                                                class="form-control form-control-user" placeholder="Enter Password"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit"
                                                class="btn btn-primary btn-user btn-block">Login</button>
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('register') ?>">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

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

</body>

</html>