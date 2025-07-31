<?php
require_once 'conexao.php';

$conexao=conectarBanco();

// obtendo o ID via GET
$idCliente=$_GET['id'] ?? null;
$cliente=null;
$msgErro="";

// função local para buscar cliente por ID
function buscarClientePorId($idCliente, $conexao){
    $stmt=$conexao->prepare("SELECT id_cliente,nome,endereco,telefone,email FROM cliente WHERE id_cliente=:id");
    $stmt->bindParam(":id",$idCliente,PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch();
}

// se um ID foi enviado, busca o cliente no banco
if($idCliente && is_numeric($idCliente)){
    $cliente=buscarClientePorId($idCliente,$conexao);

    if(!$cliente){
        $msgErro="Erro: Cliente não encontrado.";
    }
} else {
    $msgErro="Digite o ID do cliente para buscar os dados.";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="style.css" />
    <title>Atualizar Cliente</title>
    <script>
        function habilitarEdicao(campo){
            const input = document.getElementById(campo);
            input.removeAttribute("readonly");
            input.focus();
        }
    </script>
</head>
<body>
    <!-- PARTE DO CÓDIGO SÓ PARA A BARRA LATERAL  -->
    <nav class="sidebar">
        <a href="home.html" class="card-link card-home" title="Home">
            <svg class="card-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" >
                <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
            </svg>
            <div class="card-text-container">Home</div>
        </a>
        <a href="atualizarCliente.php" class="card-link card-1">
            <svg class="card-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
            </svg>
            <div class="card-text-container">Atualizar Cliente</div>
        </a>
        <a href="deletarCliente.php" class="card-link card-2">
            <svg class="card-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-4.5l-1-1z"/>
            </svg>
            <div class="card-text-container">Deletar Cliente</div>
        </a>
        <a href="inserirCliente.php" class="card-link card-3">
            <svg class="card-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M19 13H5v-2h14v2z"/>
            </svg>
            <div class="card-text-container">Inserir Cliente</div>
        </a>
        <a href="listarClientes.php" class="card-link card-4">
            <svg class="card-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M3 13h2v-2H3v2zm0 4h2v-2H3v2zm0-8h2V7H3v2zm4 4h14v-2H7v2zm0 4h14v-2H7v2zm0-10v2h14V7H7z"/>
            </svg>
            <div class="card-text-container">Listar Cliente</div>
        </a>
        <a href="pesquisarCliente.php" class="card-link card-5">
            <svg class="card-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M9.5 3a6.5 6.5 0 0 1 5.13 10.52l4.22 4.22-1.41 1.41-4.22-4.22A6.5 6.5 0 1 1 9.5 3z"/>
            </svg>
            <div class="card-text-container">Pesquisar Cliente</div>
        </a>
    </nav>
    <!-- ACABOU O CÓDIGO DA BARRA LATERAL -->
    <main class="main-content">
        <div class="container">
            <h2>Atualizar Cliente</h2>

            <?php if($msgErro): ?>
                <p class="error-message"><?=htmlspecialchars($msgErro)?></p>
                <form action="atualizarCliente.php" method="GET">
                    <label for="id">ID do cliente:</label>
                    <input type="number" id="id" name="id" required min="1" />
                    <button type="submit">Buscar</button>
                </form>
            <?php else: ?>
                <form action="processarAtualizacao.php" method="POST">
                    <input type="hidden" name="id_cliente" value="<?=htmlspecialchars($cliente['id_cliente'])?>" />

                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" value="<?=htmlspecialchars($cliente['nome'])?>" readonly onclick="habilitarEdicao('nome')" />

                    <label for="endereco">Endereço:</label>
                    <input type="text" id="endereco" name="endereco" value="<?=htmlspecialchars($cliente['endereco'])?>" readonly onclick="habilitarEdicao('endereco')" />

                    <label for="telefone">Telefone:</label>
                    <input type="text" id="telefone" name="telefone" value="<?=htmlspecialchars($cliente['telefone'])?>" readonly onclick="habilitarEdicao('telefone')" />

                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" value="<?=htmlspecialchars($cliente['email'])?>" readonly onclick="habilitarEdicao('email')" />

                    <button type="submit">Atualizar Cliente</button>
                </form>
            <?php endif; ?>
        </div>
    </main>
    
</body>
</html>
