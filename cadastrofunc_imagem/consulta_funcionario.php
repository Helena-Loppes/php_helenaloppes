<?
//CONFIGURAÇÃOPO DO BANCO DE DADOS
$host = 'localhost';
$dbname = 'bd_imagem';
$username = 'root';
$password = '';

try{
    //CONEXÃO COM O BANCO DE DADOS USANDO PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //DEFINE QUE ERROS VAO LANÇAR EXCEÇÕES

    //RECUPERA TODOS OS MEUS FUNCIONARIOS DO BANCO DE DADOS
    $sql="SELECT id, nome, FROM funcionarios";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC); //BUSCA TODOS OS RESULTADOS COMO UMA MATRIZ ASSOCIATIVA

    //VERIFICA SE FOI SOLICITADO A EXCLUSÃO DE UM FUNCIONARIO 
    if($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST['excluir_id'])){
        $excluir_id = $_POST['excluir_id'];
        $sql_excluir = "DELETE FROM funcionarios WHERE id = :id";
        $stmt_excluir = $pdo->prepare($sql_excluir);
        $stmt_excluir->bindParam(':id',$excluir_id,PDO::PARAM_INT);
        $stmt_excluir->execute();

        //REDIRECIONE OARA EXECUTAR, O REENVIO DO FUNCIONARIO
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
        }
    } catch(PDOException $e){
        echo "Erro: ".$e->getMessage(); //EXIBE A MENSAGEM DE ERRO CONEXÃO OU A CONSULTA FALHA 

    }
    ?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de funcionario</title>
</head>
<body>
    <h1>Consulta de funcionarios</h1>

    <ul>
        <?php foreach ($funcionarios as $funcionario): ?>
            <li>
            <!--A LINHA ABAIXO EXIBE O LINK PARA VISUALIZAR OS DETALHES O FUNCIONARIO COM BASE NO id-->
                <a href="visualizar_funcionario.php?id=<?$funcionario['id']?>">
        <!--ALINHA A BAIXO EXIBE O NOME DO FUNCIONARIO -->
                <?=htmlspecialchars($funcionario['nome'])?>
        </a>
        <!-- FORMULARIO PARA EXCLUIR FUNCIONARIOS -->
            <form method="POST" style="display:inline;">
                <input type="hidden" name="excluir_id" value="<?=$funcionario['id']?>">
                <button type="submit">Excluir</button>
        </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>