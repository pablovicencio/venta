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

	require_once '../class/claseProveedor.php';

	try{

		 
			$nom_prov = strtoupper(stripcslashes ($_POST['nom_prov']));
			$fono_prov = stripcslashes ($_POST['fono_prov']);
			if (isset($_POST['mail_prov'])) {
	          $mail_prov = strtoupper(stripcslashes ($_POST['mail_prov']));
	        }else{
	          $mail_prov = ' ';
	        }
	        if (isset($_POST['web_prov'])) {
	          $web_prov = strtoupper(stripcslashes ($_POST['web_prov']));
	        }else{
	          $web_prov = ' ';
	        }
	        if (isset($_POST['desc_prov'])) {
	          $desc_prov = stripcslashes ($_POST['desc_prov']);
	        }else{
	          $desc_prov = ' ';
	        }

			
	        $vig = 1;
	        $usu = 1;
	        $fec_cre = date("Y-m-d h:m", time());
	       


	        $dao = new ProveedoresDAO('',$nom_prov,$desc_prov,$fono_prov,$mail_prov,$vig,$usu,$fec_cre,$web_prov);

				
			$crear_prov = $dao->crear_prov();
			 
				if ($crear_prov>0){
					echo $crear_prov;    
					
				
				} else {
					echo"-1";
					
		 		} 
		 

	
	} catch (Exception $e) {
		//echo($e);
		echo"'Error, verifique los datos'",  $e->getMessage(); 

	}
?>