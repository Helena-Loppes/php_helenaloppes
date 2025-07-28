<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        for($i = 0; $i < 11; $i++){
            for($n = 0; $n < 11; $n++){
                echo "$i x $n = ". $i * $n .".</br>";
                if($n == 10){
                    echo "</br>";
                }
            }
        }
    ?>
    <adress>Eduardo Borsato Reinert</adress>
</body>
</html>