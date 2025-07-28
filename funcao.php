<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        # index 0123456789012345
        $name="Stefanie Hatcher";
        $length= strlen($name);
        #usado para comparar ordem alfabética
        $cmp = strcmp($name, "Brian Le");
        $index= strpos($name, "e");
        $first= substr($name, 9, 5);
        $name_upper= strtoupper($name);
    ?>
    <p align="center">Nome: <?php echo $name ; ?></p>
    <p align="center">Quantidade de letras: <?php echo $length ; ?></p>
    <p align="center">Comparação do nome com "Brian Le": <?php echo $cmp ; ?></p>
    <p align="center">Posição de primeira letra "e" no nome: <?php echo $index ; ?></p>
    <p align="center">Corta o nome da posição x, até a y: <?php echo $first ; ?></p>
    <p align="center">Coloca o texto em caixa alta: <?php echo $name_upper ; ?></p>
    <adress>Eduardo Borsato Reinert</adress>

</body>
</html>