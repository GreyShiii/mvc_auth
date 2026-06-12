<?php /** @var string $username */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Dashboard</h1>
    <h3>Welcome, <?php echo htmlspecialchars($username); ?></h3>
    <a href="/OOP(PHP)/mvcAUTH/public/logout">Logout</a>
</body>
</html>