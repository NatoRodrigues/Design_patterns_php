<?php
require __DIR__ . '/../vendor/autoload.php';
use Dotenv\Dotenv;
use Firebase\JWT\JWT;

header("Access-Control-Allow-Headers: Authorization, Content-Type, X-XSRF-Token, X-CSRF-Token, X-Requested-With");
header("Access-Control-Allow-Origin: *");

$dotenv = Dotenv::createImmutable(dirname(__FILE__, 2));
$dotenv->load();

// Log incoming request headers
file_put_contents('php://stderr', print_r(getallheaders(), true));

// Extract JWT from Authorization header
$auth_header = $_SERVER['HTTP_AUTHORIZATION'] ?? '';
$jwt = trim(str_replace('Bearer', '', $auth_header));

// Log received JWT
file_put_contents('php://stderr', 'Received JWT: ' . $jwt);
try{
  $decoded = JWT::decode($jwt, $_ENV['KEY']);
  echo json_encode($decoded);
}
catch (Throwable $e){
  echo json_encode($e->getMessage());
}
// Perform authentication logic (replace this with your actual authentication logic)
$authenticated = true;

// Respond based on authentication result
if ($authenticated) {
    echo 'Authenticated'; // Adjust the response as needed
} else {
    http_response_code(401);
    echo 'Unauthorized';
}
?>
