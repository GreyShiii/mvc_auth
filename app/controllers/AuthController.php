<?php
namespace App\Controllers;
use App\Models\User;
use Core\Auth;

class AuthController {
    private User $model;

    public function __construct(User $model) {
        $this->model = $model;
    }

    public function showLogin() {
        Auth::guest();
        require __DIR__ . "/../views/login.php";
    }

    public function showRegister() {
        Auth::guest();
        require __DIR__ . "/../views/register.php";
    }

    public function showDashboard() {
        Auth::check();
        $username = Auth::user();
        require __DIR__ . "/../views/index.php";
    }

    public function register() {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($username) || empty($email) || empty($password)) {
            Auth::setFlash('error', 'Input cannot be empty');
            header("Location: /OOP(PHP)/mvcAUTH/public/register");
            exit();
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            Auth::setFlash('error', 'Invalid email format');
            header("Location: /OOP(PHP)/mvcAUTH/public/register");
            exit();
        }

        if (strlen($password) < 8) {
            Auth::setFlash('error', 'Password must be greater than 8');
            header("Location: /OOP(PHP)/mvcAUTH/public/register");
            exit();
        }

        $existingEmail = $this->model->findByEmail($email);
        if ($existingEmail) {
            Auth::setFlash('error', 'Email already exist');
            header("Location: /OOP(PHP)/mvcAUTH/public/register");
            exit();
        }

        $existingUsername = $this->model->findByUsername($username);
        if ($existingUsername) {
            Auth::setFlash('error', 'Username already exist');
            header("Location: /OOP(PHP)/mvcAUTH/public/register");
            exit();
        }

        $this->model->create($username, $email, $password);
        Auth::setFlash('success', 'Account created! Please login.');
        header("Location: /OOP(PHP)/mvcAUTH/public/login");
    }

    public function login() {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = $this->model->findByEmail($email);

        if (!$user || !password_verify($password, $user['password'])) {
            Auth::setFlash('error', 'Invalid email or password');
            header("Location: /OOP(PHP)/mvcAUTH/public/login");
            exit();
        }
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: /OOP(PHP)/mvcAUTH/public/dashboard");
        exit();
    }

    public function destroy() {
        Auth::destroy();
    }
}
?>