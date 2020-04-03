<?php
    require_once 'config/database.php';
    class ModeloBase{
        public $db;
        public function __construct(){
            //conexion a db
            $this->db = database::conectar();

        }
        public function MostrarTodos($tabla){
           //var_dump ($this->db); 
            $query = $this->db->query("SELECT * FROM $tabla");
            return $query;
        }
        public function limpiarDatos($datos){
            // Eliminamos los espacios en blanco al inicio y final de la cadena
            $datos = trim($datos);
            // Quitamos las barras / escapandolas con comillas
            $datos = stripslashes($datos);
            // Convertimos caracteres especiales en entidades HTML (&, "", '', <, >)
            $datos = htmlspecialchars($datos);
            return $datos;
        }
        public function Ejecutar($sql) {
            $query = $this->db->query("$sql");
            return $query;
        }
        
    }

?>