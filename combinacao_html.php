<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combinação</title>
</head>
<body>
    <?php
        //função usada para definir fuso horarrio padrão
        date_default_timezone_set("america/Los_Angeles");
        //manipulando HTML e PHp
        $data_hoje = date ("d/m/y", time());
    ?>
    <p align="center"> Hoje é dia <?php echo $data_hoje ; ?></p>
    <adress>Eduardo Borsato Reinert</adress>

</body>
</html>