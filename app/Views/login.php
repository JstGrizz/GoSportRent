<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="../public/Assets/lumino/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/Assets/lumino/css/datepicker3.css" rel="stylesheet">
    <link href="../public/Assets/lumino/css/styles.css" rel="stylesheet">
</head>

<body>
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">Log in</div>
                <div class="panel-body">
                    <form role="form" action="<?= base_url('auth/login') ?>" method="post">
                        <fieldset>
                            <?php if (session()->getFlashdata('error')): ?>
                            <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
                            <?php endif; ?>

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>

                            <div class="form-group text-center">
                                <p>Don't have an account? <a href="<?= base_url('register') ?>">Register here</a></p>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>