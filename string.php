<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $age= 16;
        print "You are ".$age." years old.</br>";
        print "You are $age years old.</br>";
        print 'You are $age years old.</br>';
    ?>
    <?php 
        $cidade="Curitiba";
        $estado="PR";
        $idade= 325;
        $frase_capital="A cidade de $cidade é a capital do $estado";
        $frase_idade="$cidade tem mais de $idade anos";
        echo "<h3>$frase_capital</h3>";
        echo "<h3>$frase_idade</h3>";
    ?>
    <?php 
        $age= 16;

        print "Today is your {$age}th birthday.</br>";
        print "Today is your $ageth birthday.</br>";
    ?>
        <adress>Eduardo Borsato Reinert</adress>

</body>
</html>