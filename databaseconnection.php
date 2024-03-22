<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'wanjalafilex');
define('DB_NAME', 'DarajaMpesa');
try {
  $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
  if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
    echo "Connection failed";
  }else{
  echo "connected to the database";
  }
} catch (Exception $e) {
  echo "Error: " . $e->getMessage();
}
