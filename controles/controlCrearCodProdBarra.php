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

        $cod = stripcslashes ($_POST['cod']);
		$prod = stripcslashes ($_POST['prod']);

		 $fun = new Funciones();
		 $crear_cod = $fun->crear_cod_barra($cod, $prod);

         if ($crear_cod>0){
            echo $crear_cod;    
            
        
        } else {
            echo"";
            
         } 
	
	} catch (Exception $e) {
		//echo($e);
		echo"'Error, verifique los datos'",  $e->getMessage(); 

	}
?>