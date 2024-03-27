<?php

require '../vendor/autoload.php';

use app\database\Connection;
use Firebase\JWT\JWT;

header("Access-Control-Allow-Origin: *");

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__FILE__, 2));
$dotenv->load();

try {
    $pdo = Connection::connect();
    if ($pdo === null) {
        die("Failed to connect to the database.");
    }
    if (!isset($_POST['email']) || !isset($_POST['password'])) {
        http_response_code(400);
        echo json_encode(["error" => "Email and password fields are required"]);
        exit();
    }

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $stmt = $pdo->prepare("INSERT INTO user (email, password) VALUES (:email, :password)");
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    
    if ($stmt->execute()) {
        $stmt = $pdo->prepare("SELECT * FROM user WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user_found = $stmt->fetch();
        
        if (empty($email) || strlen($password) < 8) {
            http_response_code(401);
            echo json_encode(["error" => "Unauthorized"]);
            exit();
        }
        
        $payload = [
            "exp" => time() + 10,
            "iat" => time(),
            "email" => $email
        ];
        $encode = JWT::encode($payload, $_ENV['KEY'], 'HS256');
        
        echo json_encode(["success" => "User created successfully", "token" => $encode]);
    } else {
        http_response_code(500);
        echo json_encode(["error" => "Failed to create user"]);
    }
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
