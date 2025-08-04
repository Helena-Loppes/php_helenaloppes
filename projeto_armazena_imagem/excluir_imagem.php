<?php
require("conecta.php");
//OBTEM O id DA IMAGEM DA URL, GARANTINDO QUE SEJA UM NUMERO INTEIRO
$id_imagem = isset($_GET['id'])? intval($_GET['id']): 0;

//VERIFICA SE O id  É VALIDO (MAIOR QUE ZERO)
if($id_imagem >0){
    //CRIA A QUERY SEGURA  USANDO O prapare atatement
    $queryExclusao = "DELETE FROM tabela_imagens WHERE codigo = ?";

    //PREPARA A QUERY
    $stmt = $conexao->prepare($queryExclusao);
    $stmt->bind_param("i",$id_imagem);//DEFINE O ID COM UM INTEIRO

    //EXECUTA A EXCLUSAO
    if($stmt->execute()){
        echo"Imagem excluida com sucesso! ";
    }

    //FECHA CONSULTA
    $stmt->close();
}else{
    echo"ID invalido";
}

//REDIRECIONA PARA A index.php E GARANTE O SCRIPT
header("Location: index.php");
exit();
?>