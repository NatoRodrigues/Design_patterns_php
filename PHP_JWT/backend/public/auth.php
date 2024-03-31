<?php
require __DIR__ . '/../vendor/autoload.php';
use Dotenv\Dotenv;
use Firebase\JWT\JWT;

header("Access-Control-Allow-Headers: Authorization, Content-Type, X-XSRF-Token, X-CSRF-Token, X-Requested-With");
header("Access-Control-Allow-Origin: *");

$dotenv = Dotenv::createImmutable(dirname(__FILE__, 2));
$dotenv->load();

$auth = array_key_exists('HTTP_AUTHORIZATION', $_SERVER) ? $_SERVER['HTTP_AUTHORIZATION'] : null;
$alg = null;
$token = str_replace('Bearer ', '', $auth);

try {
    $decoded = JWT::decode($token, $_ENV['KEY'], $alg);
    $email = $decoded->email; // Extrai o e-mail do payload do token
  
    // Convert email encoding to UTF-8 (optional, based on your needs)
    if (function_exists('mb_detect_encoding') && $original_encoding = mb_detect_encoding($email, mb_detect_order(), true)) {
      if ($original_encoding !== 'UTF-8') {
        $email = mb_convert_encoding($email, 'UTF-8', $original_encoding);
      }
    }
  
    // Display email in console
    echo "User Email: " . $email . PHP_EOL;
  
  } catch (Throwable $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
  }
?>
