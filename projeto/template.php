<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tarefas.css" type="text/css"/>
    <title>Document</title>
</head>
<body>
    <h1>Gerenciador de Tarefas</h1>
    <form>
        <fieldset>
            <legend>Nova tarefa</legend>
            <label>
                Tarefa:
                <input type="text" name="nome" />
            </label>
            <label>
                Descrição (Opcional):
                <textarea name="descricao"> </textarea>
            </label>
            <label>
                Prazo (Opcional):
                <input type="text" name="prazo" />
            </label>
            <fieldset>
                <legend>Prioridade</legend>
                <label>
                    <input type="radio" name="prioridade" value="1" checked />
                    Baixa
                    <input type="radio" name="prioridade" value="2"  />
                    Média
                    <input type="radio" name="prioridade" value="3"  />
                    Alta
                </label>
            </fieldset>
            <label>
                Tarefa concluída:
                <input type="checkbox" name="concluida" value="sim" />
            </label>
            <input type="submit" value="Cadastrar" />
        </fieldset>
        
    </form>
    <table>
        <tr>
            <th>Tarefas</th>
            <th>Descricao</th>
            <th>Prazo</th>
            <th>Prioridade</th>
            <th>Concluida</th>
        </tr>
        <?php foreach ($lista_tarefas as $tarefa) : ?>
        <tr>
            <td><?php echo $tarefa['nome']; ?> </td>
            <td><?php echo $tarefa['descricao']; ?> </td>
            <td><?php echo $tarefa['prazo']; ?> </td>
            <td><?php echo $tarefa['prioridade']; ?> </td>
            <td><?php echo $tarefa['concluida']; ?> </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>