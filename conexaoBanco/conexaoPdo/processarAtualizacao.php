<?php
require 'conexao.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $conexao = conectarBanco();

    $id=filter_var($_POST["id"], FILTER_SANITIZE_NUMBER_INT);
    $nome=htmlspecialchars(trim($_POST["nome"]));
    $endereco=htmlspecialchars(trim($_POST["endereco"]));
    $telefone=htmlspecialchars(trim($_POST["telefone"]));
    $email=htmlspecialchars($_POST["email"], FILTER_VALIDATE_EMAIL);

    if(!$id || !$email){
        die("Erro: ID inválido ou e-mail incorreto.");
    }
}
?>