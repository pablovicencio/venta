<?php
	require_once '../class/claseUsuario.php';
	//require_once '../includes/recursosExternos.php';

	try{
		if (!empty($_POST['nick']) and !empty($_POST['pwd'])){ 
			$nick = strtoupper($_POST['nick']);
			$pwd = $_POST['pwd'];
			
			$dao = new UsuarioDAO('','','',$nick,$pwd,'');
 		
			$login = $dao->login();
		}
		else{
			//echo"<script type=\"text/javascript\">alert('Error, favor verifique sus datos e intente nuevamente.');window.location='../index.html';</script>";
			echo"-2";
		}
	} catch (Exception $e) {
		echo"-1";
		//echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../index.html';</script>"; 
	}
?>