<?php
//Corrida.php
class Corrida {
    public $id;
    public $usuario;
    public $status;
    
    public function __construct($id, $usuario) {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->status = 'ativa';
    }
}
?>