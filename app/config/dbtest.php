<?php
require_once 'Database.php';
use App\Config\Database;

try {
$db = Database::connect();
echo "database connected";
} catch (Exception $e) {
    echo "Db error: " . $e->getMessage();
}
?>