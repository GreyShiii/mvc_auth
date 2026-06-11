<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: /OOP(PHP)/crudAUTH1/public/dashboard");
} else {
    header("Location: /OOP(PHP)/crudAUTH1/public/login");
}
?>