<?php
    //CONFIGURAÇÃOPO DO BANCO DE DADOS
$host = 'localhost';
$dbname = 'bd_imagens';
$username = 'root';
$password = '';

try{
    //CONEXÃO COM O BANCO DE DADOS USANDO PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //DEFINE QUE ERROS VAO LANÇAR EXCEÇÕES

    //VERIFICA SE O ID FOI PASSADO NA URL
    if(isset($_GET['id'])){
        $id=$_GET['id'] //OBTEM O ID DO FUNCIONARIO ATRAVES DA url

        //recupera os dados do funcionario no banco de dados
        $sql = "SELECT nome,telefone,tipo_foto,foto FROM funcionarios WHERE id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id',$id,PDO::PARAM_INT); //VINCULA O VALOR DO ID AO PARAMENTRO :ID
        $stmt->execute(); //EXECUTA A INSTRUÇÃO SQL
        
        //VERIFICA SE ENCONTROU O FUNCIONARIO
        if($stmt->rowCount()>0){
            //a linha baixo busca os dados dos funcionarios com um array associativo
            $funcionario =  $stmt->fetch(PDO::FETCH_ASSOC);
        
        //verifica se foi solicitado a exclusão do funcionario

        //LINHA A BAIXO VERIFICA SE OS DADOS FORAM ENVIANDOS VIA FORMULARIO COM O METODO POST
        //ISSET VERIFICA SE A UM VALOR DEFINIDO NA VERIAVEL
        //VERIFICA SE O FORMULARIO FOI ENVIADO VIA POST E SE EXISTE O CAMPO excluir_id
            if($_SERVER["REQUESTE_METHOD"] == "POST" && isset($_POST['excluir_id'])){
                //A LINHA A BAIXO PEGA O VALOR ID QUE FOI ENVIADO PELO FORMULARIO (ID DO FUNCIONARIO A SER EXCLUIDO)
            $excluir_id = $_POST["excluir_id"];

            //MONTA A QUERY SQL PARA DELETAR O FUNCIONARIO COM O ID CORRESPONDENTE
            $sql_excluir = "DELETE FROM funcionarios WHERE id= :id";

            //PREPARA A QUERY PARA A EXUCUÇÃO SEGURA EVITANDO SQL INJECTION
            $stmt_excluir = $pdo->prepare($sql_excluir);

            //associa o valor id ap parametro :id na query garantindo que sera tratado com um numero
            $stmt_excluir->bindParam('id',$excluir_id, PDO::PARAM_INT);

            //EXECUTA A QUERY EXCLUINDO O FUNCIONARIO DO BANCO DE DADOS
            $stmt_excluir->execute();

            header("Location: consulta_funcionario.php");
            exit();
            }
            ?>
        <!DOCTYPE html>
        <html lang="pt-BR">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Visualizar Funcionario</title>
        </head>
        <body>
            <h1>Dados do funcionario</h1>
            <p>Nome: <?=htmlspecialchars($funcionari['nome'])?></p>
            <p>Telefone: <?=htmlspecialchars($funcionari['telefone'])?></p>
            <p>Foto:</p>
                <img src="data:<?$funcionario['tipo_foto']?>;base64,<?=base64_encode 
                ($funcionario['foto'])?>" alt="Foto do Funcionario">

        <!--FORMULARIO PARA EXCLUIR FUNCIONARIO-->
        <form method="POST">
            <input type="hidden" name="excluir_id" value="<?=$id ?>">
            <button type="submit">Excluir Funcionario</button>
        </form>
        </body>
        </html>
<?php
    }else{
        echo "funcionario não encontrado.";}
    }else{
        echo "ID do funcionario, não foi fornecido.";
    }
    catch(PDOExceotion $e){
        echo "Erro: ". $e->getMessage();
    }
}

?>