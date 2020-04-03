<?php
class UsuarioController {

    public function mostrar(){
    require_once "views/layout/header.php";


        require_once "models/usuario.php";
        $usuarioc = new Usuario();
        $usuarios = $usuarioc->MostrarTodos("usuarios");
        require_once "views/usuario/mostrar.php";

    require_once "views/layout/footer.php";
    }

    public function crear(){
        require_once "views/layout/header.php";
        $error = "";
        if( $_SERVER["REQUEST_METHOD"] == "POST" ){
            
            if( !empty($_POST["email"]) && !empty($_POST["name"]) && !empty($_POST["pass"])){
                require_once "models/usuario.php";
                $usuarioc = new Usuario();
                $nombre = $usuarioc->limpiarDatos($_POST["name"]);
                $pass = $usuarioc->limpiarDatos($_POST["pass"]);
                $email = $usuarioc->limpiarDatos($_POST["email"]);
                $usuarioc->nombre = $nombre;
                $usuarioc->email = $email;
                $usuarioc->pass = $pass;
                $res = $usuarioc->Guardar();
                if($res) {
                    $error = "Creado";
                }else {
                    $error = "Error al crear";
                }
            }
            else{
                $error = "Ingresa todos los campos";
            }

        }
        require_once "views/usuario/crear.php";
    require_once "views/layout/footer.php";    
    }
    public function login(){
        require_once "views/layout/header.php";
        $error = "";
        if( $_SERVER["REQUEST_METHOD"] == "POST" ){
            
            if( !empty($_POST["email"]) && !empty($_POST["pass"])){
                require_once "models/usuario.php";
                $usuarioc = new Usuario();
                $pass = $usuarioc->limpiarDatos($_POST["pass"]);
                $email = $usuarioc->limpiarDatos($_POST["email"]);
                $usuarioc->email = $email;
                $usuarioc->pass = $pass;
                $res = $usuarioc->Login();
                while($user = $res->fetch_object()){
                    if(isset($user->id) && isset($user->nombre) && isset($user->correo) ){
                        $usuario;
                        $usuario["id"] = $user->id;
                        $usuario["nombre"] = $user->nombre;
                        $usuario["correo"] = $user->correo;
                        $usuario["pass"] = $user->pass;

                        $_SESSION["usuario"]= $usuario;
                        return header("Location: index.php?controller=Usuario&action=dashboard");
                    }
                    $error = "Ingresa todos los campos";
                    
                }

            }
            else{
                $error = "Ingresa todos los campos";
            }

        }

        require_once "views/usuario/login.php";
        require_once "views/layout/footer.php";
    }

    public function dashboard() {
        require_once "views/layout/header-admin.php";
        require_once "models/proyecto.php";
        //Traer todos los proyectos
        if($_SESSION["usuario"]["correo"] == "felipe_regueyra111@hotmail.com"){
            $proyectoModel =  new Proyecto();
            $proyectosResult = $proyectoModel->list();
            $proyectos = array();
            while ($proyectoFetch = $proyectosResult->fetch_object()) {
                array_push($proyectos,$proyectoFetch);
            }

        }else{
            require_once "models/participante.php";
            $participanteModel = new Participante();
            $participanteProyect = $participanteModel->listByUser();
    

        }
       
        require_once "views/usuario/dashboard.php";
        require_once "views/layout/footer.php";
    }

    public function profile() {
        require_once "views/layout/header-admin.php";
        require_once "models/proyecto.php";
        $error = "";
        $correcto = "";
        if( $_SERVER["REQUEST_METHOD"] == "POST" ){
                require_once "models/usuario.php";
                $usuarioc = new Usuario();
                $usuarioc->pass = $usuarioc->limpiarDatos($_POST["password"]);
                $usuarioc->email = $usuarioc->limpiarDatos($_POST["email"]);
                $usuarioc->nombre = $usuarioc->limpiarDatos($_POST["first_name"]);
                $usuarioc->id = $_SESSION["usuario"]["id"];
                if ($usuarioc->nombre != "" && $usuarioc->email != "" ) {
                    $res = $usuarioc->Actualizar();
                    $correcto = "Usuario actualizado!\n";
                    $_SESSION["usuario"]["nombre"] = $usuarioc->nombre ;
                    $_SESSION["usuario"]["email"] = $usuarioc->email ;
                }
                else if ($usuarioc->pass != "") {
                    $pass2 = $usuarioc->limpiarDatos($_POST["password2"]);
                    if($usuarioc->pass != $pass2){
                        $error = "Las contraseñas no coiciden!\n";
                    }else{
                        $res = $usuarioc->ActualizarContrasena();
                        $correcto .= "\nContraseña actualizada!\n";
                    } 
                }
                else $error .= "Rellene todos los campos!\n";
        }
       
        require_once "views/usuario/profile.php";
        require_once "views/layout/footer.php";
    }

    public function profilePicture() {
        //Si se quiere subir una imagen
        if (isset($_POST['subir'])) {
            //Recogemos el archivo enviado por el formulario
            $archivo = $_FILES['archivo']['name'];
            var_dump(is_file("names.rtf"));

            //Si el archivo contiene algo y es diferente de vacio
            if (isset($archivo) && $archivo != "") {
            //Obtenemos algunos datos necesarios sobre el archivo
            $tipo = $_FILES['archivo']['type'];
            $tamano = $_FILES['archivo']['size'];
            $temp = $_FILES['archivo']['tmp_name'];
            $archivo = $_SESSION['usuario']['id'] . ".png";
            //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
            // if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
                if (!((strpos($tipo, "png")) && ($tamano < 2000000))) {
                echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
                - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
            }
            else {
                //Si la imagen es correcta en tamaño y tipo
                //Se intenta subir al servidor
                if (move_uploaded_file($temp, '/Applications/XAMPP/xamppfiles/htdocs/SAPware/images/'.$archivo)) {
                    //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                    chmod('/Applications/XAMPP/xamppfiles/htdocs/SAPware/images/'.$archivo, 0777);
                    //Mostramos el mensaje de que se ha subido co éxito
                    echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
                    //Mostramos la imagen subida
                    echo '<p><img src="images/'.$archivo.'"></p>';
                }
                else {
                    //Si no se ha podido subir la imagen, mostramos un mensaje de error
                    echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
                }
            }
            }
        }

    }

}

?>