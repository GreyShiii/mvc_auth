<?php
namespace App\Controllers;
use App\Models\User;

class AuthController {
    private User $model;

    public function __construct(User $model) {
        $this->model = $model;
    }

    public function showLogin() {
        require __DIR__ . "/../views/login.php";
    }

    public function showRegister() {
        require __DIR__ . "/../views/register.php";
    }

    public function showDashboard() {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            header("Location: /OOP(PHP)/crudAUTH1/public/login");
            exit();
        }
        $username = $_SESSION['username'];
        require __DIR__ . "/../views/index.php";
    }

    public function register() {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $this->model->create($username, $email, $password);
        header("Location: /OOP(PHP)/crudAUTH1/public/login");
    }

    public function login() {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = $this->model->findByEmail($email);

        if (!$user || !password_verify($password, $user['password'])) {
            header("Location: /OOP(PHP)/crudAUTH1/public/login");
            exit();
        }
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: /OOP(PHP)/crudAUTH1/public/dashboard");
        exit();
    }

    public function destroy() {
        session_start();
        session_destroy();
        header("Location: /OOP(PHP)/crudAUTH1/public/login");
        exit();
    }
}
?>