<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Register</h2>
    <form action="/OOP(PHP)/crudAUTH1/public/register" method="POST">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Register</button>
        <p>Already have an account? <a href="/OOP(PHP)/crudAUTH1/public/login">Login</a> here</p>
    </form>
</body>
</html>