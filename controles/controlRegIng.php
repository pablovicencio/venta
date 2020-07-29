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

	require_once '../class/claseIngreso.php';

	try{

		 
			$fec_ing = date("Y-m-d h:m:s", time());
			$est_ing = 1;
			
			$precio_total_ing =  stripcslashes ($_POST['precio_total_venta']);
			$precio_total_ing = str_replace(",","",(str_replace(".","",(str_replace("$","",$precio_total_ing)))));

			if (isset($_POST['tipo_doc'])) {
	          $tipo_doc = strtoupper(stripcslashes ($_POST['tipo_doc']));
	        }else{
	          $tipo_doc = 0;
	        }

	        if (isset($_POST['nro_doc'])) {
	          $nro_doc = stripcslashes ($_POST['nro_doc']);
	        }else{
	          $nro_doc = 0;
	        }


	         $TableData = stripcslashes ($_POST['data']);

	         // Decodificar el array JSON
	         $TableData= json_decode($TableData,TRUE);


	        $dao = new IngresoDAO('',$fec_ing,$est_ing,$precio_total_ing,$tipo_doc,$nro_doc,1,'','','',$TableData);

				
			$reg_ing = $dao->reg_ing();
			 
				if ($reg_ing>0){
					echo $reg_ing;//"Venta registrada correctamente!";    
					
				
				} else {
					echo"-1";
					
		 		} 
		 

	
	} catch (Exception $e) {
		//echo($e);
		echo"'Error, verifique los datos'",  $e->getMessage(); 

	}
?>