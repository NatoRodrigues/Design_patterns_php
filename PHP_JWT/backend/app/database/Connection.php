<?php

namespace app\database;

use PDO;
use PDOException;

class Connection {
  public static function connect() {
    try {
      $pdo = new PDO('mysql:host=localhost;dbname=test;unix_socket=/opt/lampp/var/mysql/mysql.sock', 'root', '', [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
      ]);
      return $pdo;
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
      return null;  // Or handle the exception differently
    }
  }
}


