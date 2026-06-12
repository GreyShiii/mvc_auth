<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: /OOP(PHP)/mvcAUTH/public/dashboard");
} else {
    header("Location: /OOP(PHP)/mvcAUTH/public/login");
}
?>