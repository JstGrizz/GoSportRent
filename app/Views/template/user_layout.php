<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoSportRent</title>
    <link href="<?= base_url('/Assets/lumino/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('/Assets/lumino/css/datepicker3.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('/Assets/lumino/css/styles.css'); ?>" rel="stylesheet">
    <style>
    </style>
</head>

<body>
    <?= view('template/sidebar'); ?>
    <div class="content expanded">
        <?= $this->renderSection('content'); ?>
    </div>

    <script src="<?= base_url('/Assets/lumino/js/jquery-1.11.1.min.js'); ?>"></script>
    <script src="<?= base_url('/Assets/lumino/js/bootstrap.min.js'); ?>"></script>
</body>

</html>