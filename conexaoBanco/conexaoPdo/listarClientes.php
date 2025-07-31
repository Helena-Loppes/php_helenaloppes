<?php
    require 'conexao.php';

    $conexao = conectarBanco();
    $stmt = $conexao->prepare("SELECT * FROM cliente");
    $stmt->execute();
    $clientes = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lista de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" /> <!-- Ou style.css, se for o principal -->
</head>
<body>

<main class="main-content">
        <div id="container">
        <h2>Lista de Clientes</h2>
        <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($clientes as $cliente): ?>
                <tr>
                    <td><?= htmlspecialchars($cliente["id_cliente"]) ?></td>
                    <td><?= htmlspecialchars($cliente["nome"]) ?></td>
                    <td><?= htmlspecialchars($cliente["endereco"]) ?></td>
                    <td><?= htmlspecialchars($cliente["telefone"]) ?></td>
                    <td><?= htmlspecialchars($cliente["email"]) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
  
</main>

<!-- BARRA LATERAL -->
<nav class="sidebar">
    <a href="home.html" class="card-link card-home" title="Home">
        <svg class="card-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
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

</body>
</html>
