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

	require_once '../class/claseVenta.php';

	try{

		 
			$fec_venta = date("Y-m-d h:m:s", time());
			$est_venta = 1;
			
			$precio_total_venta =  stripcslashes ($_POST['precio_total_venta']);
			$precio_total_venta = str_replace(",","",(str_replace(".","",(str_replace("$","",$precio_total_venta)))));

			 if (isset($_POST['obs_venta'])) {
	          $obs_venta = strtoupper(stripcslashes ($_POST['obs_venta']));
	        }else{
	          $obs_venta = '';
	        }

	        if (isset($_POST['patente_cli'])) {
	         $patente_cli = strtoupper(stripcslashes ($_POST['patente_cli']));
	        }else{
	          $patente_cli = '';
	        }
	        if ((strlen($_POST['km_venta']) <> 0)) {
	         $km_venta = stripcslashes ($_POST['km_venta']);
	        }else{
	          $km_venta = 0;
	        }


	         $TableData = stripcslashes ($_POST['data']);

	         // Decodificar el array JSON
	         $TableData= json_decode($TableData,TRUE);


	        $dao = new VentaDAO('',$fec_venta,$est_venta,$precio_total_venta,'','','','','','',$obs_venta, $patente_cli,$km_venta,$TableData);

				
			$ing_venta = $dao->ing_venta();
			 
				if ($ing_venta>0){
					echo "Venta registrada correctamente!";    
					
				
				} else {
					echo"-1";
					
		 		} 
		 

	
	} catch (Exception $e) {
		//echo($e);
		echo"'Error, verifique los datos'",  $e->getMessage(); 

	}
?>