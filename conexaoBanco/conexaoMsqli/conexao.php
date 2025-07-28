<?php
    //Habilita relatório detalhado de erros no mysqli
    mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);

    //função para conectar ao banco de dados
    //retorna um objeto de conexão MySqli ou interrompe em caso de erro.

    function conectadb(){
        //configuração do banco de dados
        $endereco="localhost";  //endereço do servidor MYSQL
        $usuario="root";        //nome de usuario do banco de dados
        $senha="";              //senha do banco de dados
        $banco="empresa";       //nome do banco de dados

        try{
            //criação da conexão
            $con=new mysqli($endereco, $usuario, $senha, $banco);

            //definição do conjunto de caracteres para evitar problemas de acentuação
            $con->set_charset("utf8mb4"); //retorna o objeto de conexão
            return $con;
        } catch(Exception $e) {
            //exibe uma mensagem de erro e encerra o script
            die("Erro na conexão:".$e->getMessage());
        }
    }
?>