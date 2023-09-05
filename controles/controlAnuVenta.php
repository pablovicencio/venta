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

	require_once '../class/claseVenta.php';

	try{

		 	$id_ven = $_POST['id_venta_anu'];
			$fec_anu = date("Y-m-d h:m:s", time());
			$est_venta = 2;
			$usu_anu_venta = $id;
			$obs = '';
			
			


	        $dao = new VentaDAO($id_ven,'',$est_venta,'','','','',$usu_anu_venta,$obs,$fec_anu,'', '','','','','','');

				
			$anu_venta = $dao->anu_venta();
			 
				if ($anu_venta>0){
					echo "Venta Anulada correctamente!";    
					
				
				} else {
					echo"-1";
					
		 		} 
		 

	
	} catch (Exception $e) {
		//echo($e);
		echo"'Error, verifique los datos'",  $e->getMessage(); 

	}
?>