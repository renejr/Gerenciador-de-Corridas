<?php
//index.php
session_start();

require_once 'GerenciadorCorridas.php';
require_once 'gerador.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Corridas</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>

<h2>Gerenciador de Corridas</h2>

<!-- Exibe o JSON com todas as corridas -->
<h2>JSON com todas as corridas</h2>
<div id="jsonData" name="jsonData"><?= $_SESSION['corridasJson'] ?></div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Usuário</th>
            <th>Status</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($_SESSION['corridas'] as $corrida): ?>
            <?php if($corrida->status === 'ativa'): ?>
                <tr id="corrida_<?= $corrida->id ?>" name="corrida_<?= $corrida->id ?>">
                    <td><?= $corrida->id ?></td>
                    <td><?= $corrida->usuario ?></td>
                    <td id="status" name="status"><?= $corrida->status ?></td>
                    <td><button id="<?= $corrida->id ?>" name="<?= $corrida->id ?>" onclick="confirmarCancelamento('<?= $corrida->id ?>')">Cancelar</button></td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
function confirmarCancelamento(id) {
  // Exibe um box de confirmação
  if (confirm("Tem certeza que deseja cancelar esta corrida?")) {
    // Se o usuário confirmar, prossegue com a execução da função
    console.log("ID do botão clicado:", id);

    // Obtém a linha da tabela (TR) onde o botão está localizado
    const tr = document.getElementById("corrida_" + id);

    // Exibe o ID da linha da tabela no console
    console.log("ID da linha da tabela:", tr.id);

    // Obtém o conteúdo da célula da tabela (TD) com o ID "status" na linha da tabela
    const status = tr.querySelector("td[id='status']");

    // Exibe o conteúdo da célula da tabela no console
    console.log("Conteúdo da célula de status:", status.innerHTML);

    // Faz uma requisição AJAX para o script cancelar_corrida.php
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "cancelar_corrida.php?id=" + id, true);
    xhr.responseType = "text";
    xhr.onload = function() {
    if (xhr.status === 200) {        
        // Se a requisição foi bem-sucedida, atualiza o status da corrida
        status.innerHTML = "Cancelado pelo sistema";

        const jsonData = document.getElementById("jsonData");
        jsonData.innerHTML = xhr.responseText;

        // Remove o botão da linha da tabela
        const button = tr.querySelector("button");
        button.remove();
    } else {
        // Se a requisição falhou, exibe uma mensagem de erro
        alert("Ocorreu um erro ao cancelar a corrida. Tente novamente.");
    }
    };
    xhr.send();
  }
}
</script>

</body>
</html>