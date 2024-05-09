<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation</title>
</head>
<body>
    <a href="home.php">Home</a>
    <a href="products.php">Products</a>
    <a href="account.php">My account</a>
    <?= $logged_in ?  '<a href = "login.php">Login</a>' : '<a href = "logout.php">Logout</a>' ?>
</body>
</html>