<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php print $datos["titulo"];  ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" 
    crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" 
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" 
integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" 
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" 
integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" 
crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a href="<?php print RUTA; ?>" class="navbar-brand">Tienda Zona-Games</a>
        <div class="collapse navbar-collapse" id="menu">
        <?php if ($datos["menu"]){
            #menu
        }
        if(isset($datos["admin"])){
            if($datos["admin"]){
                print "<ul class='navbar-nav mr-auto mt-2 mt-lg-0'>";
                print "<li class='nav-item'>";
                print "<a href='".RUTA."adminUsuarios' class='nav-link'>Usuarios</a>";
                print "</li>";
                print "<li class='nav-item'>";
                print "<a href='".RUTA."adminProductos' class='nav-link'>Productos</a>";
                print "</li>";
                print "</ul>";
            }
        }
        ?>
    </div>
    </nav>
    <div class="Container-fluid">
        <div class="row content">
            <div class="col-sm-2"></div> <!--pantalla pequeño se maneja por dos colum-->
            <div class="col-sm-8"> <!--8 columnas por ahora-->
            <?php
            if (isset($datos["errores"])){
                if(count($datos["errores"])>0){
                    print "<div class='alert alert-danger mt-3'>";
                    foreach ($datos["errores"] as $key => $valor){
                        print "<strong>* ".$valor."</strong><br>";
                    }
                    print "</div>";
                }
            }

            ?>