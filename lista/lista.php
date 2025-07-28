<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        list($nome,$passatempo,$curso) = file("pessoais.txt");

        echo "Nome: $nome <br/>";
        echo "Passatempo: $passatempo <br/>";
        echo "Curso: $curso <br/>";
    ?>
</body>
</html>