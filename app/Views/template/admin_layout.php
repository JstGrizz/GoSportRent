<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="<?= base_url('/Assets/lumino/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('/Assets/lumino/css/datepicker3.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('/Assets/lumino/css/styles.css'); ?>" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            min-height: 100vh;
            margin: 0;
        }

        .sidebar {
            width: 250px;
            background-color: #f8f8f8;
            transition: width 0.3s ease;
        }

        .sidebar.collapsed {
            width: 60px;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
            transition: margin-left 0.3s ease;
        }

        .content.expanded {
            margin-left: 250px;
        }

        .content.collapsed {
            margin-left: 60px;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        ul li a {
            display: block;
            padding: 10px 20px;
            text-decoration: none;
            color: #333;
        }

        ul li a:hover,
        ul li a.active {
            background-color: #ddd;
        }

        table.table thead th,
        table.table tbody td {
            text-align: center;
            vertical-align: middle;
        }
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