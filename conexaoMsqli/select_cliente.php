<?php
//Inclui o arquivo de conexao com o banco de dados 
require_once "conexao.php";

//Estabelece conexão
$conexao = conectadb();

//Define a consulta SQL para buscar clientes
$sql = "SELECT id_cliente, nome, email FROM cliente";

//Execute a consulta no banco
$result = $conexao->query($sql);

//Verifica se há registros retornados
if($result->num_rows > 0){
    //Itera sobre os resultados e exibe cada cliente encontrado
    while ($linha = $result->fetch_assoc()){
        echo "ID: ".$linha["id_cliente"]." - Nome: ".$linha["nome"]." - Email: ".$linha["email"]."<br/>";}
    }else{
        //Caso nenhum resultado seja encontrado
        echo "Nenhum resultado encontrado.";}
//Fecha a conexao 
$conexao->close();
?>