<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>

<body>
    <h1>Welcome to Admin Dashboard</h1>

    <!-- Display the username from the session -->
    <p>Hello, <?= session()->get('username'); ?>! You are logged in as an Admin.</p>

    <!-- Logout Button -->
    <form action="<?= base_url('logout'); ?>" method="get">
        <button type="submit">Log Out</button>
    </form>
</body>

</html>