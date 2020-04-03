<?php
    require_once 'modelobase.php';
    Class Usuario extends ModeloBase{
        public $id;
        public $nombre;
        public $email;
        public $pass;
        public $img;

        public function __construct(){
            //herede la conexion a bd
            parent::__construct();
        }
    
        public function Actualizar(){
            $query = $this->Ejecutar("UPDATE usuario SET correo = '{$this->email}', nombre = '{$this->nombre}' WHERE id = {$this->id} ");
            return $query;
        }
        public function ActualizarContrasena(){
            $query = $this->Ejecutar("UPDATE usuario SET pass = '{$this->pass}' WHERE id = {$this->id} ");
            return $query;
        }
        public function Guardar(){
            $query = $this->Ejecutar("INSERT INTO usuario (id, correo, nombre, pass) values (null, '{$this->email}', '{$this->nombre} ','{$this->pass}' );");
            return $query;
        }

        public function Login(){
            $query = $this->Ejecutar("SELECT * FROM usuario WHERE correo = '{$this->email}' AND pass = '{$this->pass}'");
            return $query;
        }



        
    }
?>