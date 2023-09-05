<?php
 // session_start();

 // if( isset($_SESSION['id']) and ($_SESSION['perfil'] <> 0) ){
 //    //Si la sesión esta seteada no hace nada
 //    $id = $_SESSION['id'];
 //  }
 //  else{
 //    //Si no lo redirige a la pagina index para que inicie la sesion 
 //    header("location: ../index.html");
 //  }  

	require_once '../class/Funciones.php';

	try{
		 $tipo = $_POST['tipo'];

		 $fun = new Funciones();

		  if ($tipo == 1) {//venta por periodo
		 					$desde = $_POST['desde'];
							$hasta = $_POST['hasta'];
		 
		 					$re = $fun->cargar_inf_venta_per($desde, $hasta);
		 }else if($tipo == 2) {//venta por cliente
		 					$cli = $_POST['patente'];
		 
		 					$re = $fun->cargar_inf_venta_cli($cli);
		 }else if($tipo == 3) {//stock por dias de venta
		 					$dias = $_POST['dias'];
		 
		 					$re = $fun->cargar_inf_stock(1,$dias);
		 }else if($tipo == 4) {//stock por dias de venta
		 					$prod = $_POST['prod'];
		 
		 					$re = $fun->cargar_inf_stock(2,$prod);
		 }

		 


          $datos = array();


          foreach($re as $row){

                $datos[] = $row;
    
              }
		ob_end_clean();
		
		echo json_encode($datos);
	
	} catch (Exception $e) {
		//echo($e);
		echo"'Error, verifique los datos'",  $e->getMessage(); 

	}
?>