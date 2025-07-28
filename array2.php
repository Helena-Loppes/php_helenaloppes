<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $estados = array("PR","SC","RS","SP","RJ","MG","BA","RN","AM");
        echo "ORIGINAL: ";
        print_r ($estados);
        echo "<hr/>STRTOLOWER: Converte uma string para minuscula</br>";
        for($i = 0; $i < count($estados); $i++){
            $estados[$i] = strtolower($estados[$i]);
        }
        echo "STRTOLWER: "; print_r($estados);
        echo "<hr/>SHIFT: retira o primeiro elemento de um array</br>";
        $rotaciona = array_shift($estados);
        echo "SHIFT: "; print_r($estados);
        echo "<hr/>POP: extrai um elemento do final do array<br/>";
        array_pop($estados);
        echo "<hr/>POP: "; print_r($estados);
        echo "<hr/>REVERSE: retorna um array com os elementos na ordem inversa<br/>";
        $inverso = array_reverse($estados);
        echo "REVERSE: "; print_r($inverso);
        echo "<hr/>SORT: ordena um array<br/>";
        sort($estados);
        echo "SORT: "; print_r($estados);
        echo "<hr/>SLICE: extrai uma parcela de um array<br/>";
        $dividir = array_slice($estados, 1, 2);
        echo "SLICE: "; print_r($dividir); echo "</br>";
    ?>
</body>
</html>