<?php
 session_start();

 if( isset($_SESSION['id']) ){
    //Si la sesión esta seteada no hace nada
    $id = $_SESSION['id'];
  }
  else{
    //Si no lo redirige a la pagina index para que inicie la sesion 
    header("location: ../index.html");
  }   

	require_once '../class/claseCotizacion.php';

	try{

		 
			$fec_cot = date("Y-m-d h:m:s", time());
			
			$precio_total_cot =  stripcslashes ($_POST['precio_total_cot']);
			$precio_total_cot = str_replace(",","",(str_replace(".","",(str_replace("$","",$precio_total_cot)))));

			if (isset($_POST['obs_cot'])) {
	          $obs_cot = strtoupper(stripcslashes ($_POST['obs_cot']));
	        }else{
	          $obs_cot = '';
	        }

	        if (isset($_POST['dscto_cot'])) {
	          $dscto = stripcslashes ($_POST['dscto_cot']);
	        }else{
	          $dscto = 0;
	        }

	        if (isset($_POST['patente_cli'])) {
	         $patente_cli = strtoupper(stripcslashes ($_POST['patente_cli']));
	        }else{
	          $patente_cli = '';
	        }
	        if ((strlen($_POST['km_cot']) <> 0)) {
	         $km_cot = stripcslashes ($_POST['km_cot']);
	        }else{
	          $km_cot = 0;
	        }

	        

	         $TableData = stripcslashes ($_POST['data']);

	         // Decodificar el array JSON
	         $TableData= json_decode($TableData,TRUE);


	        $dao = new CotDAO('',$fec_cot,$precio_total_cot,$obs_cot, $patente_cli,$km_cot,$dscto,$TableData);

				
			$ing_cot = $dao->ing_cot();
			 
				if ($ing_cot>0){
					echo $ing_cot;//"Venta registrada correctamente!";    
					
				
				} else {
					echo"-1";
					
		 		} 
		 

	
	} catch (Exception $e) {
		//echo($e);
		echo"'Error, verifique los datos'",  $e->getMessage(); 

	}
?>