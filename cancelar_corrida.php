<?php
//cancelar_corrida.php
session_start();

// Verifica se foi recebido o ID da corrida via GET e se as $_SESSION['corridas'] e $_SESSION['corridasJson'] estao criadas 
if(isset($_GET['id']) && isset($_SESSION['corridas']) && isset($_SESSION['corridasJson']) ) {
    $idCorrida = $_GET['id'];
    $corridasArr = json_decode($_SESSION['corridasJson'], true);

    // Altera o status da corrida
    $corridasArr[$idCorrida]['status'] = 'Cancelada pelo sistema';
    $_SESSION['corridas'] = $corridasArr;
    $_SESSION['corridasJson'] = json_encode($corridasArr);

    echo($_SESSION['corridasJson']);
} else {
    return "Erro ao receber dados.";
}
?>