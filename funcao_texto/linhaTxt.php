<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $linha = "Vamos adicionar mais";
    file_put_contents("texto.txt",$linha,FILE_APPEND);
?>
</body>
</html>