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

	require_once '../class/Funciones.php';

	try{

        $cod_barra = stripcslashes ($_POST['cod']);

        $fun = new Funciones();
        $re = $fun->eliminar_cod_barra($cod_barra);
			 
				if ($re>0){
					echo "Código de barra eliminado correctamente!";    
					
				
				} else {
					echo"-1";
					
		 		} 
		 

	
	} catch (Exception $e) {
		//echo($e);
		echo"'Error, verifique los datos'",  $e->getMessage(); 

	}
?>