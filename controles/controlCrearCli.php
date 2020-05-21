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

	require_once '../class/claseCliente.php';

	try{

		 
			$patente_cli = strtoupper(stripcslashes ($_POST['patente_cli']));
			$nom_cli = strtoupper(stripcslashes ($_POST['nom_cli']));
			$fono_cli = stripcslashes ($_POST['fono_cli']);
			$marca_veh_cli = stripcslashes ($_POST['marca_veh_cli']);
			$modelo_veh_cli = strtoupper(stripcslashes ($_POST['modelo_veh_cli']));
			$anio_veh_cli = stripcslashes ($_POST['anio_veh_cli']);
			$km_veh_cli = stripcslashes ($_POST['km_veh_cli']);

			 if (isset($_POST['mail_cli'])) {
	          $mail_cli = strtoupper(stripcslashes ($_POST['mail_cli']));
	        }else{
	          $mail_cli = '';
	        }


	        $dao = new ClienteDAO('',$nom_cli,$mail_cli,$marca_veh_cli,$anio_veh_cli,$km_veh_cli,$fono_cli,'',$modelo_veh_cli,$patente_cli);

				
			$crear_cli = $dao->crear_cli();
			 
				if ($crear_cli>0){
					echo "Cliente Creado correctamente!";    
					
				
				} else {
					echo"-1";
					
		 		} 
		 

	
	} catch (Exception $e) {
		//echo($e);
		echo"'Error, verifique los datos'",  $e->getMessage(); 

	}
?>