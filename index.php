

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="includes/insertAdmin.inc.php" method="POST">
        <input type="text" name="uin" placeholder="UIN">
        <br>
        <input type="text" name="first" placeholder="First Name">
        <br>
        <input type="text" name="middle" placeholder="Middle Initial">
        <br>
        <input type="text" name="last" placeholder="Last Name">
        <br>
        <input type="text" name="username" placeholder="Username">
        <br>
        <input type="text" name="password" placeholder="Password">
        <br>
        <input type="text" name="email" placeholder="Email">
        <br>
        <input type="text" name="discord" placeholder="Discord Name">
        <br>
        <button type="submit" name="submit">Add new admin</button>
    </form>

</body>
</html>