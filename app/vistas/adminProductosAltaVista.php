<?php include_once("encabezado.php");   ?>
<!-- editor para html CKEeditor 5 -->

<h1 class="text-center">
    <?php
        if(isset($datos["subtitulo"])){
            print $datos["subtitulo"];
        }
    ?>
</h1>
<div class="card p-4 bg-light">
    <form action="<?php print RUTA; ?>adminProductos/alta/" method="POST"
    enctype="multipart/form-data">
    <!-- para indicar que vamos a subir archivos -->
     <div class="form-group text-left"> 
        <label for="usuario">* Tipo del producto: </label>
        <select class="form-control" name="tipo" id="tipo">
            <option value="void">Selecciona el tipo de producto</option>
            <?php
                for ($i=0; $i < count($datos["tipoProducto"]); $i++) { 
                   print "<option value='".$datos["tipoProducto"][$i]["indice"]."'";
                   if(isset($datos["data"]["tipo"])){
                        if($datos["data"]["tipo"]==$datos["tipoProducto"][$i]["indice"]){
                        print " selected ";
                        }
                   }
                   print ">".$datos["tipoProducto"][$i]["cadena"]."</option>";
                }
            ?>
        </select>
     </div>
     <div class="form-group text-left">
        <label for="nombre">* Nombre del producto: </label>
        <input type="text" name="nombre" class="form-control"
        placeholder="Escribe el nombre del producto" 
        value="<?php 
        print isset($datos['data']['nombre'])?$datos['data']['nombre']:''; 
        ?>"
        >
     </div>
     <div class="form-group text-left">
      <label for="content">* Descripción:</label>
      <input type="text" name="descripcion" class="form-control"
        placeholder="Escribe la descripcion del producto" 
        value="<?php 
        print isset($datos['data']['descripcion'])?$datos['data']['descripcion']:''; 
        ?>"
        >
    </div>

     <div class="form-group text-left">
        <label for="desarrolladora">* Desarrolladora: </label>
        <input type="text" name="desarrolladora" class="form-control"
        placeholder="Escribe la desarrolladora" 
        value="<?php 
        print isset($datos['data']['desarrolladora'])?$datos['data']['desarrolladora']:''; 
        ?>"
        >
     </div>

     <div class="form-group text-left">
        <label for="editor">* Editor: </label>
        <input type="text" name="editor" class="form-control"
        placeholder="Escribe el editor" 
        value="<?php 
        print isset($datos['data']['editor'])?$datos['data']['editor']:''; 
        ?>"
        >
     </div>

     <div class="form-group text-left"> 
        <label for="precio">* Precio del producto: </label>
        <input type="text" name="precio" class="form-control"
        pattern="^(\d|-)?(\d|,)*\.?\d*$"
        placeholder="Escribe el precio del producto (sin comas ni símbolos)" 
        value="<?php 
        print isset($datos['data']['precio'])?$datos['data']['precio']:''; 
        ?>"
        >
     </div>

     <div class="form-group text-left"> 
        <label for="descuento">Descuento del producto: </label>
        <input type="text" name="descuento" class="form-control"
        pattern="^(\d|-)?(\d|,)*\.?\d*$"
        placeholder="Escribe el descuento del producto"
        value="<?php 
        print isset($datos['data']['descuento'])?$datos['data']['descuento']:''; 
        ?>"
        >
     </div>

     <div class="form-group text-left"> 
        <label for="imagen">* Imagen del producto: </label>
        <input type="file" name="imagen"id="imagen" class="form-control"
        accept="imagen/jpeg"/>
        <?php
        if (isset($datos['data']['imagen'])) {
            print "<p>".$datos['data']['imagen']."</p>";
        }
        ?>
     </div>

     <div class="form-group text-left"> 
        <label for="fecha_lanzamiento">* Fecha de lanzamiento del producto: </label>
        <input type="date" name="fecha_lanzamiento" class="form-control"
        placeholder="Fecha de lanzamiento" 
        value="<?php 
        print isset($datos['data']['fecha_lanzamiento'])?$datos['data']['fecha_lanzamiento']:''; 
        ?>"
        >
     </div>

     <div class="form-group text-left"> 
        <label for="status">Estado del producto: </label>
        <select class="form-control" name="status" id="status">
            <option value="void">Selecciona el status del producto</option>
            <?php
                for ($i=0; $i < count($datos["statusProducto"]); $i++) { 
                   print "<option value='".$datos["statusProducto"][$i]["indice"]."'";
                   if(isset($datos["data"]["status"])){
                        if($datos["data"]["status"]==$datos["statusProducto"][$i]["indice"]){
                        print " selected ";
                        }
                   }
                   print ">".$datos["statusProducto"][$i]["cadena"]."</option>";
                }
            ?>
        </select>
     </div>

     <div class="form-check text-left"> 
        <input type="checkbox" name="nuevos" id="nuevos" class="form-check-input"
        <?php
        if (isset($datos['data']['nuevos'])) {
            if($datos['data']['nuevos']=="on") print " checked ";
        }
        ?>
        ><label for="nuevos" class="form-check-label">Producto Nuevo</label>
     </div>

     </div class="form-group text-left"><br>
     
     <div>
        <input type="hidden" name="idProducto" id="idProducto" value="

        <?php
            if (isset($datos['data']['idProducto'])) {
                print $datos['data']['idProducto'];
            } else {
                print "";
            }
        ?>
        ">
        <input type="submit" value="Enviar" class="btn btn-success">
        <a href="<?php print RUTA; ?>adminProductos" class="btn btn-info">Regresar</a>
     </div>
    </form>
    </div> <!--para crear un cuadro-->
<?php include_once("piepagina.php");   ?>
