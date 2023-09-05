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
		 $id_ven = $_POST['id_ven'];
		 $fun = new Funciones();
		 $re = $fun->cargar_cab_ven_mod($id_ven);
		 


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