<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade Formulário Tabela</title>
    <link rel="stylesheet" type="text/css" href="estilo_tabela_form.css" media="all"/>
</head>
<body>
    <h2 >Formulário de Clientes</h2>
    <form method="get">
    <table cellspacing="0" >
        
            <tr>
                <th>Clientes</th>
                <td id="logo"><img src="img/logo.png"></td>
            </tr>
            <tr>
                <td align="left">ID Cliente</td>
                <td><input type="text" name="id_cliente" id="id_cliente" placeholder="ID Cliente"></td>
            </tr>
            <tr>
                <td align="left">ID Usuário</td>
                <td><input type="text" name="id_usuario" id="id_usuario" placeholder="ID Usuário"></td>
            </tr>
            <tr>
                <td align="left">E-mail</td>
                <td><input type="text" name="email" id="email_cliente" placeholder="E-mail"></td>
            </tr>
            <tr>
                <td align="left">Nome</td>
                <td><input type="text" name="nome" id="nome_cliente" placeholder="Nome"></td>
            </tr>
            <tr>
                <td align="left">Observação</td>
                <td><input type="text" name="observacao" id="observacao" placeholder="Observação"></td>
            </tr>
            <tr>
                <td align="left">RG</td>
                <td><input type="text" name="rg" id="rg_cliente" placeholder="XX.XXX.XXX-X. "></td>
            </tr>
            <tr>
                <td align="left">Data Nascimento</td>
                <td><input type="date" name="data_nasc" id="data_nasc_cliente" placeholder="Data nascimento"></td>
            </tr>
            <tr>
                <td align="left">Sexo</td>
                <td>
                    <select name="sexo" id="sexo_cliente" placeholder="Sexo">
                        <option value="n/a">Selecione</option>
                        <option value="f">Feminino</option>
                        <option value="m">Masculino</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button id="enviar" type="submit">Enviar</button>
                    <button id="resetar" type="reset">Limpar</button>
                </td>
            </tr>
        
    </table>
    </form>
    <?php
        $lista_campos=array();
        if(isset($_GET['id_usuario'])){
            $_SESSION['lista_campos'][] = $_GET[
            'id_usuario'];
        }
        if(isset($_GET['id_cliente'])){
            $_SESSION['lista_campos'][] = $_GET[
            'id_cliente'];
        }
        if(isset($_GET['email'])){
            $_SESSION['lista_campos'][] = $_GET[
            'email'];
        }
        if(isset($_GET['nome'])){
            $_SESSION['lista_campos'][] = $_GET[
            'nome'];
        }
        if(isset($_GET['observacao'])){
            $_SESSION['lista_campos'][] = $_GET[
            'observacao'];
        }
        if(isset($_GET['rg'])){
            $_SESSION['lista_campos'][] = $_GET[
            'rg'];
        }
        if(isset($_GET['data_nasc'])){
            $_SESSION['lista_campos'][] = $_GET[
            'data_nasc'];
        }
        if(isset($_GET['sexo'])){
            $_SESSION['lista_campos'][] = $_GET[
            'sexo'];
        }
        if(isset($_SESSION['lista_campos'])){
            $lista_tarefas = $_SESSION[
                'lista_campos'];
        }
    ?>

    <table>
        <tr>
            <th>Dados</th>
        </tr>
        <?php foreach ($lista_campos as $campos) : ?>
        <tr>
            <td><?php echo $campos; ?> </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <ADRESS>Eduardo Borsato Reinert | Estudante | DESN20242v1</ADRESS>
</body>
</html>


               
                
                
                
                
                