<?php
//GerenciadorCorridas.php
require_once 'Corrida.php';

class GerenciadorCorridas {
    private $corridas = [];
    
    public function criarCorrida($usuario) {
        $id = uniqid();
        $corrida = new Corrida($id, $usuario);
        $this->corridas[$id] = $corrida;
        return $corrida;
    }
    
    public function listarCorridas() {
        return $this->corridas;
    }
}
?>