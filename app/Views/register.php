<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <link href="<?= base_url('/Assets/startbootstrap-sb-admin-2-master/vendor/fontawesome-free/css/all.min.css'); ?>"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="<?= base_url('/Assets/startbootstrap-sb-admin-2-master/css/sb-admin-2.min.css'); ?>" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" role="form" action="<?= base_url('auth/register') ?>" method="post">
                                <div class="form-group">
                                    <!-- Alert for flash messages -->
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
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="username" id="username"
                                            class="form-control form-control-user" value="<?= old('username') ?>"
                                            placeholder="Enter Username" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="email" name="email" id="email"
                                            class="form-control form-control-user" value="<?= old('email') ?>"
                                            placeholder="Enter Email" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" id="password"
                                            class="form-control form-control-user" placeholder="Password" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="confirm_password" id="confirm_password"
                                            class="form-control form-control-user" placeholder="Repeat Password"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-user btn-block">Register</button>
                                </div>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('login') ?>">Already have an account? Login!</a>
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