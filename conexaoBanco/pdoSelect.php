<?php
    $endereco = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "eduardo_reinert"
    try{
        $conexao = new PDO("mysql:host=$endereco;dbname=$banco", $usuario, $senha)
    }
?>