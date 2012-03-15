<?php

// verificar los parámetros	
if(!empty($_GET)){
	//establecer el archivo css con los estilos
	echo ("<link href='formatos_objetos_lista.css' type='text/css' rel='stylesheet'>");
	
	
	//conectamos con el servidor
	$conexion = mysql_connect("localhost", "root", "");
	
	// comprobamos que hemos estabecido conexión en el servidor
	if (! $conexion){
			die('No es posible conectarse a la base de datos: ' . mysql_error());
			exit;
		}			
	
	// seleccionar la base de datos de lista_precios
	mysql_select_db("lista_precios", $conexion);
	
	// tomar los argumentos
	$id_usuario = $_GET['usr'];
	$nombre_usuario = $_GET['nbusr'];
	
	// leer el id del cliente, el tipo de cliente y los tipos de lista
	$sql = "SELECT clientes.tipos_clientes_id, tipos_listas.id, tipos_listas.nombre FROM clientes, tipos_clientes, tipos_clientes_tipos_listas, tipos_listas WHERE clientes.tipos_clientes_id = tipos_clientes.id AND tipos_clientes.id = tipos_clientes_tipos_listas.tipos_cliente_id AND tipos_clientes_tipos_listas.tipos_lista_id = tipos_listas.id AND clientes.xpf_users_id =".$id_usuario;
	
	$resultado = mysql_query($sql, $conexion);
	
	if ($resultado) {
		// leer el resultado
		$registro = mysql_fetch_row($resultado);
		// cada registro tiene el id de tipo de cliente en la primera columna
		$tipo_cliente = $registro[0];

		// crear el formulario
		echo ("<form id='form1' name='form1' method='post' action='lista_precio.php'>");	
		
		// guardar el nombre del usuario y el id del tipo de cliente en controles ocultos, deben enviarse como parámetros
		echo ("<input name='nombre_usuario' type='hidden' value='".$nombre_usuario."'>");	
		echo ("<input name='tipo_cliente' type='hidden' value='".$tipo_cliente."'>");
		
		
		echo  ("<p>Seleccionar Lista de precios</p>");
		echo  ("<p>");
		echo  ("<label>");
		
		// Crear la lista (select)
		echo   ("<select name='tipo_lista'>");

		// para cada registro agregar el nombre y el tipo de lista, al select que se va a mostrar 
		while ($registro) {
		    $id_tipo_lista = $registro[1];
			$nombre_tipo_lista = $registro[2];
			echo   ("<option value='". $id_tipo_lista ."'>". $nombre_tipo_lista ."</option>");
		    $registro = mysql_fetch_row($resultado);
		}
		
		echo   ("</select>");
		echo   ("</label>");
		echo  ("</p>");
		echo  ("<p>");
		echo  ("<label>");
		echo  ("<input type='submit' name='Submit' class='button' value='Imprimir' />");
		echo  ("</label>");
		echo  ("</p>");
		echo  ("</form>");
			
		
		}
	
}

?>
