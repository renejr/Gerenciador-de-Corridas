<?php
//gerador.php
// Crie uma instância do GerenciadorCorridas
$gerenciador = new GerenciadorCorridas();

// Lista todas as corridas
$corridas = $gerenciador->listarCorridas();

// Verifica se não existem corridas
if (empty($corridas)) {
    // Se não existirem corridas, crie 15 corridas
    for ($i = 0; $i < 15; $i++) {
        $gerenciador->criarCorrida('usuario' . ($i + 1)); // Começa a partir do usuário1
    }

    // Atualiza a lista de corridas após criar as novas corridas
    $corridas = $gerenciador->listarCorridas();

    $_SESSION['corridas'] = $corridas;
}

// Exiba todas as corridas em formato JSON
$_SESSION['corridasJson'] = json_encode($corridas);;
?>