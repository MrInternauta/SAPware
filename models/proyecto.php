<?php
    require_once 'modelobase.php';
    Class Proyecto extends ModeloBase{
        public $id;
        public $nombre;
        public $img;
        public $color;
        public $estado;
        public $privacidad;
        public $fecha_inicio;

        public function __construct(){
            //herede la conexion a bd
            parent::__construct();
        }
        public function Guardar(){
            $query = $this->Ejecutar("INSERT INTO Proyecto (id, nombre, img, color, estado, privacidad, fecha_inicio ) values (null, '{$this->nombre}', '{$this->img} ','{$this->color}','{$this->estado} ','{$this->privacidad}','{$this->fecha_inicio}' );");
            return $query;
        }

        public function list(){
            $query = $this->Ejecutar("SELECT * FROM Proyecto");
            return $query;
        }
        
    }
?>