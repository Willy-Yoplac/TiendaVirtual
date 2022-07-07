<?php
/*
Controlador Login
 */
class Login extends Controlador {
    private $modelo;
    function __construct(){
        $this->modelo = $this->modelo("LoginModelo");     
    }

    function caratula(){
        $datos = ["titulo" => "Login", "menu" =>false];
        $this->vista("loginVista", $datos);     
    }

    function olvido(){
        print "Hola desde el olvido";
    }

    function registro(){
        $errores = array();
        $data = array(); //para capturar solo el dato erroneo

        if ($_SERVER['REQUEST_METHOD']=="POST"){
            $nombre = isset($_POST['nombre']) ? $_POST['nombre']:"";
            //si E en post -nombre regresamos NOMBRE si no una cad vacia
            $apellidoPaterno = isset($_POST['apellidoPaterno']) ? $_POST['apellidoPaterno']:"";
            $apellidoMaterno = isset($_POST['apellidoMaterno']) ? $_POST['apellidoMaterno']:"";
            $email = isset($_POST['email']) ? $_POST['email']:"";
            $clave1 = isset($_POST['clave1']) ? $_POST['clave1']:"";
            $clave2 = isset($_POST['clave2']) ? $_POST['clave2']:"";
            $ciudad = isset($_POST['ciudad']) ? $_POST['ciudad']:"";
            $pais = isset($_POST['pais']) ? $_POST['pais']:"";
            $data = [
                "nombre" => $nombre,
                "apellidoPaterno" => $apellidoPaterno,
                "apellidoMaterno" => $apellidoMaterno,
                "email" => $email,
                "clave1" => $clave1,
                "clave2" => $clave2,
                "ciudad" => $ciudad,
                "pais" => $pais
            ];

            //validadcion
            if($nombre==""){
                array_push($errores, "El nombre es requerido");
            }
            if ($apellidoPaterno==""){
                array_push($errores, "El apellido paterno es requerido");
            }
            if ($email==""){
                array_push($errores, "El email es requerido");
            }
            if ($clave1==""){
                array_push($errores, "La clave de acceso es requerida");
            }
            if ($clave2==""){
                array_push($errores, "La clave de verificacion de acceso es requerida");
            }
            if ($ciudad==""){
                array_push($errores, "La ciudad es requerida");
            }
            if ($pais==""){
                array_push($errores, "El país es requerida");
            }
            if ($clave1!=$clave2){
                array_push($errores, "Las claves de acceso no coinsiden");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                array_push($errores, "El email electronico no es valido");
            }
            if (count($errores)==0){
        
               $r = $this->modelo->insertarRegistro($data);
               if($r){
                print "Se inserto correctamente el registro";
               }else{
                print "No se inserto el registro";
               }

            }else{
                
                $datos = ["titulo" => "Registro usuario", 
                "menu" =>false,
                "errores"=>$errores,
                "data" => $data];
                $this->vista("loginRegistroVista", $datos);
            }

        }else{

            $datos = ["titulo" => "Registro usuario", "menu" =>false];
            $this->vista("loginRegistroVista", $datos);
        }
    }
    
}

?>