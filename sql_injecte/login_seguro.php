<?php
//Configuração do banco de dados 
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "empresa_teste";

//Conexão usando MySQLi sem proteção contrea SQL Injection
$conexao = new mysqli($servidor, $usuario, $senha, $banco);

//Verifica se há erro na conexão
if($conexao->connect_error){
    die("Erro de conexão:".$conexao->connect_erro);
}

//Captura os dados do formulário (nome de usuário)
$nome = $_POST["nome"];

//Prepara a consulta SQL segura
$stmt = $conexao->prepare("SELECT * FROM cliente_teste WHERE nome = ?");
$stmt->bind_param("s", $nome);
$stmt->execute();
$result = $stmt->get_result();

//Verifica se há resultados (se existe o nome informado no banco)
if($result->num_rows > 0){
    //Login bem-sucedido e redirecionado para area restrita
    header("Location: area_restrita.php");
    //Garante que o script pare após redirecionamneto
    exit();
    }else{
        echo "Nome não encontrado.";
        }
    //Fecha conexão
    $stmt->close();
    $conexao->close();
?>