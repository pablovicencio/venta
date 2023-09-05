<?php
 
 	  
	     
	require_once '../class/Funciones.php';
	require_once '../class/claseUsuario.php';
	

	try{

		if(isset($_POST['nick']) && isset($_POST['correo'])){
 		$nick = $_POST['nick'];
        $correo = $_POST['correo'];	
		
		
		$fun = new Funciones(); 

		
			$id = $fun->validar_usu($nick,$correo); 

			if ($id === false ){
				//var_dump($id);
			echo"1";  
			}else{

							$contraseña = $fun->generaPass();
				
							$upd_pass = UsuarioDAO::actualizar_contraseña($id,md5($contraseña));
							//var_dump($id);
							$enviar_pass = $fun->correo_upd_pass($correo,$contraseña);
							echo"Su Contraseña fue actualizada correctamente y enviada a su correo. Ingrese nuevamente con las credenciales nuevas ".$contraseña; 
							
			
		}
		 	}else{
				echo("0");
		 		goto salir;
			}    


		
	salir:
	} catch (Exception $e) {
		echo"3"; 

	}
?>