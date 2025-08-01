<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action= "login_inseguro.php" method="POST">
        <input type="text" name="nome" placeholder="Digite seu nome">
        <button type="submit">Entrar</button>
    </form>
    <br><Br>
    <form action= "login_seguro.php" method="POST">
        <input type="text" name="nome" placeholder="Digite seu nome">
        <button type="submit">Entrar</button>
    </form>
</body>
</html>