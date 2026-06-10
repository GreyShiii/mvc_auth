<?php
$router->get('/login', function() use ($controller) {
    $controller->showLogin();
})

->get('/register', function() use ($controller) {
    $controller->showRegister();
})

->post('/register', function() use ($controller) {
    $controller->register();
})

->post('/login', function() use ($controller) {
    $controller->login();
})

->get('/logout', function() use ($controller) {
    $controller->destroy();
})

->get('/dashboard', function() use ($controller) {
    $controller->showDashboard();
});
?>