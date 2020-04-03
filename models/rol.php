<?php
    require_once 'modelobase.php';
    Class Rol extends ModeloBase{
        public $id;
        public $nombre;


        public function __construct(){
            //herede la conexion a bd
            parent::__construct();
        }

        public function Guardar(){
            $query = $this->db->query("INSERT INTO rol (id, nombre) values (null, '{$this->nombre}' );");
            return $query;
        }


        
    }
?>