<?php include_once("encabezado.php");   ?>
            <h1 class="text-center">Bienvenido a Zona-Games</h1>
            <div class="card p-4 bg-light"> <!--pading 4 bakgrou-->
            
            <?php
            $ren = 0;
            for ($i=0; $i < count($datos["data"]); $i++) { 
              if ($ren==0) {
                print "<div class='row'>";
              }
              print "<div class='col-sm-3'>";
              print "<img src='img/".$datos['data'][$i]["imagen"]."' ";
              print "class='img-responsive' style='width:100%; height:140px;' ";
              print "alt='".$datos['data'][$i]["nombre"]."'/>";
              print "</div>";
              $ren++;
              if ($ren==4) {
                $ren = 0;
                print "</div>";
              }
            }

          ?>
    
            </div> <!--para crear un cuadro-->
<?php include_once("piepagina.php");   ?>