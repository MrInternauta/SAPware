<?php
    require_once 'modelobase.php';
    Class Participante extends ModeloBase{
        public $usuario_id;
        public $rol_id;
        public $Proyecto_id;

        public function __construct(){
            //herede la conexion a bd
            parent::__construct();
        }
        public function Guardar(){
            $query = $this->Ejecutar("INSERT INTO participante (usuario_id, rol_id, Proyecto_id) values (null, '{$this->usuario_id}', '{$this->rol_id} ','{$this->Proyecto_id}');");
            return $query;
        }

        public function listByUser(){
            $query = $this->Ejecutar("SELECT * FROM participante WHERE usuario_id = '{$this->usuario_id}'");
            return $query;
        }

        public function list(){
            $query = $this->Ejecutar("SELECT * FROM participante");
            return $query;
        }
        
    }
?>