<?php
require_once '../app/config/Database.php';
require_once '../app/models/User.php';
require_once '../app/controllers/AuthController.php';
require_once '../core/Router.php';
require_once '../core/Auth.php';
use App\Config\Database;
use App\Models\User;
use App\Controllers\AuthController;
use Core\Auth;

$db = Database::connect();
$model = new User();
$controller = new AuthController($model);
$router = new Router('/OOP(PHP)/mvcAUTH/public');
require '../routes.php';

$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

?>