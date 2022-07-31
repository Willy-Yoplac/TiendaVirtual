<?php
// Controlador para Productos
class AdminProductos extends Controlador{
    private $modelo;

    function __construct(){
        $this->modelo = $this->modelo("AdminProductosModelo");
 
    }
    public function caratula()
    {
        $sesion = new Sesion();
        if($sesion->getLogin()){

    //Leemos los datos de la tabla
      $data = $this->modelo->getProductos();

      //Leemos las llaves de tipo producto  
      $llaves = $this->modelo->getLlaves("tipoProducto");

      //Vista Caratula
      $datos = [
        "titulo" => "Administrativo Productos",
        "menu" => false,
        "admin" => true,
        "data" => $data,
        "tipoProducto" => $llaves
    ];
    $this->vista("adminProductosCaratulaVista",$datos);

        }else{
            header("location:".RUTA."admin");
        }
    }
    //REGISTRAR
    public function alta(){
       //Definir los arreglos
      $data = array();
      $errores = array();

        //Leemos las llaves de tipo producto  
      $llaves = $this->modelo->getLlaves("tipoProducto");

        //Leemos los status del Producto  
        $statusProducto = $this->modelo->getLlaves("statusProducto");

        //Leemos los status del Producto  
        $catalogo = $this->modelo->getCatalogo();

        //Recibimos la informacion de la vista
        if ($_SERVER['REQUEST_METHOD']=="POST"){

            //Recibimos la informacion
            $idProducto = isset($_POST['idProducto'])?$_POST['idProducto']:"";
            $tipo = isset($_POST['tipo'])?$_POST['tipo']:"";
            $nombre = isset($_POST['nombre'])?$_POST['nombre']:"";
            $descripcion = isset($_POST['descripcion'])?$_POST['descripcion']:"";
            $precio = isset($_POST['precio'])?$_POST['precio']:"";
            $descuento = isset($_POST['descuento'])?$_POST['descuento']:"0";
            $imagen = isset($_POST['imagen'])?$_POST['imagen']:"";
            $fecha_lanzamiento = isset($_POST['fecha_lanzamiento'])?$_POST['fecha_lanzamiento']:"";
            $nuevos = isset($_POST['nuevos'])?$_POST['nuevos']:"";
            $status = isset($_POST['status'])?$_POST['status']:"";
            $desarrolladora = isset($_POST['desarrolladora'])?$_POST['desarrolladora']:"";
            $editor = isset($_POST['editor'])?$_POST['editor']:"";
            
            //Validamos la informacion
            if(empty($nombre)){
                array_push($errores,"El nombre es requerido.");
              }
            if(empty($descripcion)){
                array_push($errores,"La descripcion es requerida.");
              }
            if(empty($desarrolladora)){
                array_push($errores,"La desarrolladora es requerida.");
              }

              if($precio < $descuento){
                array_push($errores,"El descuento no puede ser mayor al producto");
              }
              
            //Creacion del arreglo de datos
            $data = [ 
                "idProducto" => $idProducto,
                "tipo" => $tipo,
                "nombre" =>$nombre,
                "descripcion" =>$descripcion,
                "precio" => $precio,
                "descuento" => $descuento,
                "imagen" => $imagen,
                "fecha_lanzamiento" =>$fecha_lanzamiento,
                "nuevos" => $nuevos,
                "status" => $status,
                "desarrolladora" => $desarrolladora,
                "editor" => $editor   
                
            ];


            if(empty($errores)){
                //Enviamos al modelo
                if($idProducto==""){
                   
                  if($this->modelo->altaProducto($data)){
                    //header("location:".RUTA."adminProductos");

                  }
                }
                else {
                  //Modificacion
                  if ($this->modelo->modificaProducto($data)) {
                   // header("location:".RUTA."adminProductos");
                  }
                }
            }
        }

       //Vista añadir producto
      $datos = [
        "titulo" => "Administrativo Productos Añadir",
        "menu" => false,
        "admin" => true,
        "errores" => $errores,
        "tipoProducto" => $llaves,
        "statusProducto" => $statusProducto,
        "catalogo" => $catalogo,
        "data" => $data
    ];
    $this->vista("adminProductosAltaVista",$datos);
    }

    //ELIMINAR
    public function baja($idProducto="")
    {
        # code...
    }
    //ACTUALIZAR 
    public function cambio($idProducto="")
    {
         //Leemos las llaves de tipo producto  
         $llaves = $this->modelo->getLlaves("tipoProducto");

         //Leemos los status del Producto  
         $statusProducto = $this->modelo->getLlaves("statusProducto");

         //Leemos los status del Producto  
        $catalogo = $this->modelo->getCatalogo();
 
         //Leemos los datos del idProducto
         $data = $this->modelo->getProductoId($idProducto);
         print_r($data);
 
         $datos = [
           "titulo" => "Administrativo Productos Modificar",
           "menu" => false,
           "admin" => true,
           "errores" => [],
           "tipoProducto" => $llaves,
           "statusProducto" => $statusProducto,
         
           "data" => $data
       ];
 
       $this->vista("adminProductosAltaVista",$datos);
 
}
}

?>