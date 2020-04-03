<?php
class ProyectoController {

    /*public function mostrar(){
        require_once 'models/usuario.php';
        $usuarioc = new Usuario();
        $usuarios = $usuarioc->MostrarTodos('usuarios');
        require_once 'views/usuario/mostrar.php';
    }*/

    public function crear(){
        $error = '';
        if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
            
            if(!empty($_POST['name'])){
                require_once 'models/rol.php';
                $rol = new Rol();
                $nombre = $rol->limpiarDatos($_POST['name']);
                $rol->nombre = $nombre;
                $res = $rol->Guardar();
                if($res) {
                    $error = 'Creado';
                }else {
                    $error = 'Error al crear';
                }
            }
            else{
                $error = 'Ingresa todos los campos';
            }

        }
        require_once 'views/rol/crear.php';
    }

    public function buscar() {
        require_once 'views/layout/header-admin.php';
        require_once 'views/proyecto/buscar.php';
        require_once 'views/layout/footer.php';
    }

}

?>