<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
        if (isset($_POST["enviar"]))
        {
            $usuario=$_POST["usuario"];
            $senha=$_POST["senha"];
            echo "Recebido $usuario e $senha <br/>";
            $cripto=MD5($senha);
            echo "Criptografada $cripto";
        }
    ?>
</body>
</html>