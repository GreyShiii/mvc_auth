<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Login</h2>
    <?php $error = \Core\Auth::getFlash('error');  ?>
    <?php  if ($error): ?>
        <p style="color:red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <?php $success = \Core\Auth::getFlash('success'); ?>
    <?php if($success): ?>
        <p style="color:green;"><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>
    <form action="/OOP(PHP)/mvcAUTH/public/login" method="POST">
        <input type="email" name="email" placeholder="Email"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <button type="submit">Login</button>
        <p>No account? <a href="/OOP(PHP)/mvcAUTH/public/register">Register</a> here</p>
    </form>
</body>
</html>