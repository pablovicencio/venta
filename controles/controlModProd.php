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

	require_once '../class/claseProducto.php';

	try{

		 
			$id_prod =  stripcslashes ($_POST['id_prod']);
			$nom_prod =  stripcslashes ($_POST['nombreProd']);
			$uni_med_pro =  stripcslashes ($_POST['uniMed']);
			$stock_min_prod =  stripcslashes ($_POST['stockMinimo']);
			$vig_prod = 1;
			$precio_bruto_prod =  stripcslashes ($_POST['PrecioBrutoProd']);
			$iva_prod =  stripcslashes ($_POST['IvaProd']);
			$proc_ganan_prod =  stripcslashes ($_POST['PorcGanaProd']);
			$precio_neto_prod =  stripcslashes ($_POST['PrecioNetoProd']);
			$id_prov_prod =  stripcslashes ($_POST['prov']);
			$embalaje_prod =  stripcslashes ($_POST['embalaje']);
			$familia_prod =  stripcslashes ($_POST['familia']);
			$marca_prod =  stripcslashes ($_POST['marca']);
			$precio_compra_neto =  stripcslashes ($_POST['PreComNeto']);
			$porc_dscto_compra =  stripcslashes ($_POST['PorcDsctoCom']);
			$valor_dscto_compra =  stripcslashes ($_POST['ValorDsctoCompra']);
			$precio_compra_neto_dscto =  stripcslashes ($_POST['PreComNetoDscto']);
			$iva_compra =  stripcslashes ($_POST['IvaCompra']);
			$precio_total_compra =  stripcslashes ($_POST['PrecioTotalCompra']);
			$valor_ganancia =  stripcslashes ($_POST['ValorGanacia']);
			$precio_venta_calc =  stripcslashes ($_POST['PrecioVentaCalc']);
			


	        $dao = new ProductoDAO($id_prod,$nom_prod,$uni_med_pro,$stock_min_prod,'',$vig_prod,'',$id,$precio_bruto_prod,$iva_prod,$proc_ganan_prod, $precio_neto_prod,$id_prov_prod,$embalaje_prod,'',$familia_prod,$marca_prod,$precio_compra_neto,$porc_dscto_compra,$valor_dscto_compra,$precio_compra_neto_dscto,$iva_compra,$precio_total_compra,$valor_ganancia,$precio_venta_calc);
				
			$mod_prod = $dao->mod_prod();
			 
				if ($mod_prod>0){
					echo "Modificacion registrada correctamente!";    
					
				
				} else {
					echo"-1";
					
		 		} 
		 

	
	} catch (Exception $e) {
		//echo($e);
		echo"'Error, verifique los datos'",  $e->getMessage(); 

	}
?>