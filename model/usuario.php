<?php
    class Ususario{
        private $id, $nome, $usuario, $senha;
        function setId($id){
            $this->id = $id;
        }
        function getId(){
            return $this->id;
        }
    }
?>