<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <h1>Register</h1>

    <!-- Display error message if exists -->
    <?php if (isset($_SESSION['error'])): ?>
    <p style="color: red;"><?= $_SESSION['error'] ?></p>
    <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <!-- Display success message if exists -->
    <?php if (isset($_SESSION['success'])): ?>
    <p style="color: green;"><?= $_SESSION['success'] ?></p>
    <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <form action="<?= base_url('auth/register') ?>" method="post">
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="<?= old('username') ?>" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= old('email') ?>" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div>
            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="confirm_password" id="confirm_password" required>
        </div>
        <div>
            <button type="submit">Register</button>
        </div>
    </form>

    <p>Already have an account? <a href="<?= base_url('login') ?>">Login here</a></p>
</body>

</html>