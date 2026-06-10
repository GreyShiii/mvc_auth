<?php
namespace App\Models;
use App\Config\Database;
use PDO;

class User {
    private PDO $db;
    private $table = "users";

    public function __construct() {
        $this->db = Database::connect();
    }

    public function create(string $username, string $email, string $password) {
        $stmt = $this->db->prepare("INSERT INTO {$this->table} (username, email, password) VALUES (:username, :email, :password)");
        return $stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':password' => password_hash($password, PASSWORD_DEFAULT)
        ]);
    }

    public function findByEmail(string $email) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE email = :email");
        $stmt->execute([':email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>