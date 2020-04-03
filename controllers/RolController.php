<?php
class RolController {

    public function mostrar(){
        
        require_once 'models/usuario.php';
        $usuarioc = new Usuario();
        $usuarios = $usuarioc->MostrarTodos('rol');
        return $usuarios;
    }

    public function crear(){
        require_once 'views/layout/header-admin.php';
        
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
        require_once 'views/layout/footer.php';
    }

}

?>