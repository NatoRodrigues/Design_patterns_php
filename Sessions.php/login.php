<?php 

    include './basic_login.php';
    if($logged_in){
        header('Location: account.php');
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];

        if ($user_email == $email and $user_password == $password) {
            login();
        }
    }
?>

<?php include  './header_account_info.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="login.php" method="post">
        Email: <input type="email" name="email" id=""><br>
        Password: <input type="password" name="password" id="">
        <input type="submit" value = "Login">
        <?php 
            if (login() == false) {
                echo 'Error';
            }
        ?>
    </form>
</body>
</html>