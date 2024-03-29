<?php 	
	require_once('fpdf.php'); 
	require_once('fpdi.php'); 
	require_once('rotation_fpdi.php'); 
	
	// Funci�n para determinar el nombre del archivo a utilizar para la lista de precios
	function leer_nombre_archivo ($tipo_cliente, $tipo_lista)
	{
		//conectamos con el servidor
		$conexion = mysql_connect("localhost", "root", "");
		
		// inicializar la variable que retorna
		$nombre_archivo = '';		 
		// comprobamos que hemos estabecido conexi�n en el servidor
		if (! $conexion){
				die('No es posible conectarse a la base de datos: ' . mysql_error());
				exit;
			}			
		// seleccionar la base de datos
		mysql_select_db("lista_precios", $conexion);
		
		// buscar el nombre del archivo
		$resultado = mysql_query("SELECT nombre_archivo FROM tipos_clientes_tipos_listas WHERE tipos_cliente_id='".$tipo_cliente."' and tipos_lista_id='".$tipo_lista."'", $conexion);
				
		if ($resultado) {
		    // leer el resultado
		   $registro = mysql_fetch_row($resultado);
		   $nombre_archivo = $registro[0];
		}
		return $nombre_archivo;
	}
	
	
	

	class PDF extends PDF_Rotate
	{
	
	function RotatedText($x, $y, $txt, $angle)
	{
		//Text rotated around its origin
		$this->Rotate($angle,$x,$y);
		$this->Text($x,$y,$txt);
		$this->Rotate(0);
	}
	
	
	function Header()
	{
		// Poner la marca de agua  
		// verificar y tomar par�metro del nombre del cliente
		$nombre_cliente = $_POST['nombre_usuario'];
		
		$texto_marca_de_agua = $nombre_cliente;
		
		// de acuerdo con el largo del texto, calcular un tama�o de fuente y una posici�n X
		$largo_texto = strlen($texto_marca_de_agua);
		
		if ($largo_texto < 20){
			$this->SetFont('Arial','B',50);
			$this->SetTextColor(100,175,228);
			// Calcular la coordenada X para que quede centrado el nombre del cliente
			// 80 se considera la mitad, de acuerdo con el tama�o de letra
			$posx = 80 - round($largo_texto/2);
		}
		else {
			$this->SetFont('Arial','B',30);
			$this->SetTextColor(100,175,228);
			// Calcular la coordenada X para que quede centrado el nombre del cliente
			// 60 se considera la mitad, de acuerdo con el tama�o de letra
			$posx = 60 - round($largo_texto/2);

		}
			

		// Coordenadas X, Y, Texto y �ngulo de rotaci�n
		$this->RotatedText($posx,210, $texto_marca_de_agua,45);

		//imprimir la fecha y hora
		$this->SetFont('Arial','B',20);
		$this->RotatedText(88,225, date("d-m-Y h:i:s A"),45);
		
	}		
	}

	
    // verificar los par�metros	
	if(!empty($_POST)){
	
		$tipo_cliente = $_POST['tipo_cliente'];
		$tipo_lista = $_POST['tipo_lista'];
		
		$nombre_archivo = leer_nombre_archivo($tipo_cliente, $tipo_lista);
	
		// initiate FPDI 
		$pdf = new PDF(); 
		
		
		// set the sourcefile 
		//$total_paginas = $pdf->setSourceFile('DISTRIBUIDOR ABR 2011.pdf'); 
		$total_paginas = $pdf->setSourceFile($nombre_archivo); 
	
		for ($num_pagina = 1; $num_pagina <= $total_paginas; $num_pagina++) {	
				// importar la p�gina 
				$tplIdx = $pdf->importPage($num_pagina); 
				
				// agragar una nueva p�gina
				$pdf->AddPage(); 				
				
				// utilizar la p�gina importada y colocarla en la 0,0
				// Ancho y alto, el �ltimo par�metro es si se ajustael tama�o de la p�gina 			
				$pdf->useTemplate($tplIdx, 0, 0, 210, 290, true); 
		}
		
		 
		//	$pdf->Output('lista_cambiada.pdf', 'D');  // se usa cuando se quiere exporat el contenido a un archivo
		$pdf->Output(); // salida directa en el navegador
	}
	else
    	echo "Llamada inv�lida"; 

?>