<?php

require_once '../recursos/db/db.php';


class Funciones 
{
	/*///////////////////////////////////////
    Cargar datos de producto
    //////////////////////////////////////*/
    public function cargar_datos_prod($cod,$vig){
        try{
           
           
           $pdo = AccesoDB::getCon();
                   
           if ($vig == 0) {
                $sql = "select * from producto where cod_barra_prod = :cod";
           }else if ($vig == 1) {
               $sql = "select a.id_prod, a.nom_prod,a.uni_med_pro,a.stock_min_prod,
a.stock_prod,a.vig_prod,a.fec_cre_prod,a.usu_cre_prod,a.precio_bruto_prod,a.iva_prod,
a.proc_ganan_prod,a.precio_neto_prod,a.id_prov_prod,a.embalaje_prod,
a.cod_barra_prod,a.familia_prod,a.marca_prod,
fam.desc_item, uni.desc_item, (a.precio_neto_prod + a.iva_prod) precio 
from producto a, tab_param fam, tab_param uni
 where a.uni_med_pro = uni.cod_item and uni.cod_grupo = 1 and uni.vig_item = 1
 and a.familia_prod = fam.cod_item and fam.cod_grupo = 2 and fam.vig_item = 1 
 and a.cod_barra_prod = '21400055315' and a.vig_prod = 1;";
           }  
                  
           
           $stmt = $pdo->prepare($sql);
           $stmt->bindParam(":cod", $cod, PDO::PARAM_STR);
           $stmt->execute();
           $response = $stmt->fetchAll();
           return $response;
       } catch (Exception $e) {
           echo"-1";
            //echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../../index.html';</script>";
       }
   }




}