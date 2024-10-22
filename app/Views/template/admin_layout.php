<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
    body {
        font-family: Arial, sans-serif;
    }

    .sidebar {
        width: 200px;
        position: fixed;
        height: 100%;
        background: #f4f4f4;
        padding: 20px 0;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }

    .content {
        margin-left: 220px;
        padding: 20px;
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
    </style>
</head>

<body>
    <?= view('template/sidebar'); ?>

    <div class="content">
        <?= $this->renderSection('content'); ?>
    </div>
</body>

</html>