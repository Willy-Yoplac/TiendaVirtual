<?php include_once("encabezado.php"); ?>
<h1 class="text-center">Ventas del Día</h1>
<div class="card p-4 bg-light">
	<table class="table table-striped" width="100%">
	<thead>
		<th>idUsuario</th>
        <th>Fecha</th>
        <th>Costo</th>
		<th>Descuento</th>
		<th>Total</th>
		<th>Detalle</th>
	</thead>
	<tbody>
		<?php
        //var_dump($datos["data"]);
        
        /*
		for($i=0; $i<count($datos['data']); $i++){
			$tipo = $datos["data"][$i]["tipo"]-1;
			print "<tr>";
			print "<td class='text-left'>".$datos["data"][$i]["idProducto"]."</td>";
			print "<td class='text-left'>".$datos["tipoProducto"][$tipo]['cadena']."</td>";
			print "<td class='text-left'>".$datos["data"][$i]["nombre"]."</td>";
            print "<td class='text-left'>".substr(html_entity_decode($datos["data"][$i]["descripcion"]),0,80);
            if(strlen($datos["data"][$i]["descripcion"])>60){
				print "...";
			}
            print "</td>";

            //
			print "<td><a href='".RUTA."adminProductos/cambio/".$datos["data"][$i]["idProducto"]."' class='btn btn-info'>Modificar</a></td>";
			
			print "<td><a href='".RUTA."adminProductos/baja/".$datos["data"][$i]["idProducto"]."' class='btn btn-danger'>Borrar</a></td>";
			print "</tr>";
		}*/
		?>
	</tbody>

	</table>
	<a href="<?php print RUTA; ?>adminProductos/alta" class="btn btn-success">Regresar</a>
</div>
<?php include_once("piepagina.php"); ?>