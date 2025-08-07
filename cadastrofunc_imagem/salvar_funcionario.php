<?php
//FUNÇÃO PARA REDIRECIONAR A IMAGEM
function redimencionarImagem($imagem,$largura,$altura){
    //OBTEM AS DIMENSOES ORIGINAIS DAS IMAGENS
    //getimagesize (RETORNA) a altura e alargura de uma imagem
    list($larguraOriginal,$alturaOriginal) = getimagesize($imagem);

    //CRIA UMA NOVA IMAGEM EM BRANCO COM AS NOVAS DIMENSOES
    //imagecreatetruecolor() CRIA UMA NOVA IMAGEM EM BRANCO EM ALTA QUALIDADE
    $novaImage = imagecreatetruecolor($largura,$altura);

    //CARREGA A IMAGEM ORIGINAL(JPGE) A PARTIR DO ARQUIVO
    //imagecreatefromjpeg() CRIA UMA IMAGEM PHP A PARTIR DE UM JPEG
    $imagemOriginal = imagecreatefromjpeg($imagem);

    //COPIA E REDIRESIONA A IMAGEM ORIGINAL PARA A NOVA
    //imagecopyresampled() COPIA COM REDIRECIONAMENTO E SUAVIZAÇÃO
    imagecopyresampled($novaImagem,$imagemOriginal, 0, 0, 0, 0, $largura,$altura, 
     $larguraOriginal ,$alturaOriginal);

     //INICIA UM BUFFER PARA GUARDAR A IMAGEM COM TEXTO BINARIO
     //ob_start() INICIA O "output bufferING" GUARDANDO A SAIDA
     ob_start();

     //imagejpeg()ENVIA A IMAGEM PARA O OUTPUT
     imagejpeg($novaImagem);

     //OB_GET_CLEAN PEGA O CONTEUDO DO BUFFER E LIMPA
     $dadosImagem = ob_get_clean();

     //LIBERA A MEMORIA USADA PELAS IAMGENS
     //image=destroy() LIMPA A MEMORIA DA IMAGEM CRIADA
     imagedestroy($novaImagem);
     imagedestroy($imagemOriginal);

     //RETORNA A IAMGEM REDIEMNESIOANDA EM FORMATO BINARIO
     return $dadosImagem;
}

//CONFIGURAÇÃOPO DO BANCO DE DADOS
$host = 'localhost';
$dbname = 'bd_imagem';
$username = 'root';
$password = '';

try{
    //CONEXÃO COM O BANCO DE DADOS USANDO PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //DEFINE QUE ERROS VAO LANÇAR EXCEÇÕES

    //VERIFICA SE FOI UM POST E SE TEM ARQUIVO 'foto'
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['foto'])){

        if($_FILES['foto']['error'] == 0){
            $nome = $_POST['nome'];
            $telefone = $_POST['telefone'];
            $nomeFoto = $_FILES['foto']['name'];
            $tipoFoto = $_FILES['foto']['type'];

        //REDIEMNCIONA A IMAGEM
        $foto = redimencionarImagem($_FILES['foto']['tmp_name'], 300, 400);

        //INSERE NO BANCO DE DADOS USANDO SQL PREPARADA
        $sql = "INSERT INTO funcionarios (nome, telefone, nome_foto, tipo_foto, foto)
        VALUES (:nome,:telefone:nome_foto,:tipo_foto,:foto)";
        $stmt = $pdo->prepare($sql);//PREPARA A QUERY PARA EVITAR ATAQUE SQL INJECTION
        $stmt->bindParam(':nome',$nome); //LIGA OS PARAMENTROS AS VARIAVEIS
        $stmt->bindParam(':telefone',$telefone); //LIGA OS PARAMENTROS AS VARIAVEIS
        $stmt->bindParam(':nome_foto',$nomeFoto); //LIGA OS PARAMENTROS AS VARIAVEIS
        $stmt->bindParam(':tipo_foto',$tipoFoto); //LIGA OS PARAMENTROS AS VARIAVEIS
        $stmt->bindParam(':foto',$foto, PDO::PARAM_LOB); //LOB = LARGE OBJECTS USADO PARA DADOS BINARIOS DE IMAGEM
            
        IF($stmt->execute()){
            echo "Funcionario cadastrado com sucesso!";
        }else{
            echo "Erro ao fazer upload da foto! Codigo :".$_FILES['foto']['error'];
        }
    }
}
}catch(PDOExceotion $e){
    echo "Erro" .$e->getMEssage(); //Mostrar erro se houver;
}
?>
<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de imagens</title>
</head>
<body>
    <h1> Lista de Imagens<h1>

    <a href="consulta_funcionario.php">Listar funcionarios</a>
</body>
</html>
