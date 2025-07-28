<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo de SWITCH em PHP</title>
</head>
<body>
    <?php
        $s = "casa";
        switch ($s){
            case "casa":
                echo "A casa é amarela.";
                break;
            case "arvore":
                echo "A arvore é bonita.";
                break;
            case "lampada":
                echo "João apagou a lampada.";
                break;
            default:
                echo "Você não selecionou.";
                break;
        }
    ?>
        <adress>Eduardo Borsato Reinert</adress>

</body>
</html>