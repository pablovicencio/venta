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

		 	$id_prov = $_POST['prov'];
			$fono_prov = stripcslashes ($_POST['fono_prov_mod']);
			if (isset($_POST['mail_prov_mod'])) {
	          $mail_prov = strtoupper(stripcslashes ($_POST['mail_prov_mod']));
	        }else{
	          $mail_prov = ' ';
	        }
	        if (isset($_POST['web_prov_mod'])) {
	          $web_prov = strtoupper(stripcslashes ($_POST['web_prov_mod']));
	        }else{
	          $web_prov = ' ';
	        }
	        if (isset($_POST['desc_prov_mod'])) {
	          $desc_prov = stripcslashes ($_POST['desc_prov_mod']);
	        }else{
	          $desc_prov = ' ';
	        }


	        $dao = new ProveedoresDAO($id_prov,'',$desc_prov,$fono_prov,$mail_prov,'','','',$web_prov);

				
			$mod_prov = $dao->mod_prov();
			 
				if ($mod_prov>0){
					echo $mod_prov;    
					
				
				} else {
					echo"-1";
					
		 		} 
		 

	
	} catch (Exception $e) {
		//echo($e);
		echo"'Error, verifique los datos'",  $e->getMessage(); 

	}
?>