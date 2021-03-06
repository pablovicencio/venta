<?php

require_once '../recursos/db/db.php';


class Funciones 
{
    /*///////////////////////////////////////
    Cargar tipo doc
    //////////////////////////////////////*/
    public function cargar_tipo_doc($vig){
        try{
           
           
           $pdo = AccesoDB::getCon();

              if($vig == 1){
                $sql = "select * from tab_param where vig_item = 1 and cod_grupo = 4 and cod_item <> 0 order by desc_item desc";
              } else{
                $sql = "select * from tab_param where  cod_grupo = 4 and cod_item <> 0";
              }       
           
                
                  
           
           $stmt = $pdo->prepare($sql);
           $stmt->execute();
           $response = $stmt->fetchAll();
           return $response;
       } catch (Exception $e) {
           echo"-1";
            //echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../../index.html';</script>";
       }
   }


    /*///////////////////////////////////////
    Cargar familia prod
    //////////////////////////////////////*/
    public function cargar_familia_prod($vig){
        try{
           
           
           $pdo = AccesoDB::getCon();

              if($vig == 1){
                $sql = "select * from tab_param where vig_item = 1 and cod_grupo = 2 and cod_item <> 0 order by desc_item desc";
              } else{
                $sql = "select * from tab_param where  cod_grupo = 2 and cod_item <> 0";
              }       
           
                
                  
           
           $stmt = $pdo->prepare($sql);
           $stmt->execute();
           $response = $stmt->fetchAll();
           return $response;
       } catch (Exception $e) {
           echo"-1";
            //echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../../index.html';</script>";
       }
   }


    /*///////////////////////////////////////
    Cargar unidad de medidas
    //////////////////////////////////////*/
    public function cargar_uni_med($vig){
        try{
           
           
           $pdo = AccesoDB::getCon();

              if($vig == 1){
                $sql = "select * from tab_param where vig_item = 1 and cod_grupo = 1 and cod_item <> 0 order by desc_item desc";
              } else{
                $sql = "select * from tab_param where  cod_grupo = 1 and cod_item <> 0";
              }       
           
                
                  
           
           $stmt = $pdo->prepare($sql);
           $stmt->execute();
           $response = $stmt->fetchAll();
           return $response;
       } catch (Exception $e) {
           echo"-1";
            //echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../../index.html';</script>";
       }
   }


    /*///////////////////////////////////////
    Cargar provedores
    //////////////////////////////////////*/
    public function cargar_prov($vig){
        try{
           
           
           $pdo = AccesoDB::getCon();

              if($vig == 1){
                $sql = "select * from proveedores where vigencia = 1";
              } else{
                $sql = "select * from proveedores";
              }       
           
                
                  
           
           $stmt = $pdo->prepare($sql);
           $stmt->execute();
           $response = $stmt->fetchAll();
           return $response;
       } catch (Exception $e) {
           echo"-1";
            //echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../../index.html';</script>";
       }
   }



  /*///////////////////////////////////////
    Busqueda producto nombre
    //////////////////////////////////////*/
    public function buscar_datos_prod($prod,$vig){
        try{
           
           
           $pdo = AccesoDB::getCon();
           $prod = "%".$prod."%";
                   
           if ($vig == 0) {
                $sql = "select * from producto where cod_barra_prod = :cod";
           }else if ($vig == 1) {
               $sql = "select a.id_prod, a.nom_prod,a.uni_med_pro,a.stock_min_prod,
a.stock_prod,a.vig_prod,a.fec_cre_prod,a.usu_cre_prod,a.precio_bruto_prod,a.iva_prod,
a.proc_ganan_prod,a.precio_neto_prod,a.id_prov_prod,a.embalaje_prod,
a.cod_barra_prod,a.familia_prod,a.marca_prod,
fam.desc_item, uni.desc_item, (a.precio_neto_prod + a.iva_prod) precio, a.id_prov_prod
from producto a, tab_param fam, tab_param uni
 where a.uni_med_pro = uni.cod_item and uni.cod_grupo = 1 and uni.vig_item = 1
 and a.familia_prod = fam.cod_item and fam.cod_grupo = 2 and fam.vig_item = 1 
 and (a.cod_barra_prod like :prod or a.nom_prod like :prod) and a.vig_prod = 1;";
           }  
                  
           
           $stmt = $pdo->prepare($sql);
           $stmt->bindParam(":prod", $prod, PDO::PARAM_STR);
           $stmt->execute();
           $response = $stmt->fetchAll();
           return $response;
       } catch (Exception $e) {
           echo"-1";
            //echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../../index.html';</script>";
       }
   }




    /*///////////////////////////////////////
    Cargar datos de detalle venta
    //////////////////////////////////////*/
    public function cargar_datos_det_venta($id){
        try{
           
           
           $pdo = AccesoDB::getCon();
                   
           
                $sql = 'select CASE
                            WHEN b.familia_prod = 1 THEN "Filtro Aceite"
                            WHEN b.familia_prod = 2 THEN "Filtro Aire"
                            ELSE b.nom_prod
                        END nom_prod,
                         a.cant_dventa, c.desc_item, a.precio_uni_dventa, precio_total_dventa
                         from det_venta a, producto b, tab_param c  where b.uni_med_pro = c.cod_item and 
                         c.cod_grupo = 1 and b.id_prod = a.id_prod_det_venta and a.id_cab_venta = :id';
                  
           
           $stmt = $pdo->prepare($sql);
           $stmt->bindParam(":id", $id, PDO::PARAM_INT);
           $stmt->execute();
           $response = $stmt->fetchAll();
           return $response;
       } catch (Exception $e) {
           echo"-1";
            //echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../../index.html';</script>";
       }
   }



    /*///////////////////////////////////////
    Cargar datos de cabecera venta
    //////////////////////////////////////*/
    public function cargar_datos_cab_venta($id){
        try{
           
           
           $pdo = AccesoDB::getCon();
                   
           
                $sql = "select b.nom_cli, b.mail_cli, c.nom_marca, b.anio_veh_cli, a.km_venta,b.fono_cli, b.modelo_veh_cli,b.patente_veh_cli,a.obs_venta, 
                        round(a.precio_total_venta/1.19) neto, round((a.precio_total_venta/1.19)*0.19) iva, a.precio_total_venta, a.dscto_venta
                        from venta a LEFT JOIN clientes b ON a.id_cli_venta = b.id_cli
                        LEFT JOIN marcas_veh c ON b.marca_veh_cli = c.id_marca
                        where id_venta = :id";
                  
           
           $stmt = $pdo->prepare($sql);
           $stmt->bindParam(":id", $id, PDO::PARAM_INT);
           $stmt->execute();
           $response = $stmt->fetchAll();
           return $response;
       } catch (Exception $e) {
           echo"-1";
            //echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../../index.html';</script>";
       }
   }



    /*///////////////////////////////////////
    Cargar marcas de vehiculos
    //////////////////////////////////////*/
    public function cargar_marcas(){
        try{
           
           
           $pdo = AccesoDB::getCon();
                   
           
                $sql = "select id_marca, nom_marca from marcas_veh";
                  
           
           $stmt = $pdo->prepare($sql);
           $stmt->execute();
           $response = $stmt->fetchAll();
           return $response;
       } catch (Exception $e) {
           echo"-1";
            //echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../../index.html';</script>";
       }
   }



    /*///////////////////////////////////////
    Cargar datos de ventas cliente
    //////////////////////////////////////*/
    public function cargar_ventas_cli($cli){
        try{
           
           
           $pdo = AccesoDB::getCon();
                   
           
                $sql = "select fec_venta, km_venta from venta where est_venta = 1 and id_cli_venta = :cli";
                  
           
           $stmt = $pdo->prepare($sql);
           $stmt->bindParam(":cli", $cli, PDO::PARAM_INT);
           $stmt->execute();
           $response = $stmt->fetchAll();
           return $response;
       } catch (Exception $e) {
           echo"-1";
            //echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../../index.html';</script>";
       }
   }





    /*///////////////////////////////////////
    Cargar datos de cliente
    //////////////////////////////////////*/
    public function cargar_datos_cli($cli){
        try{
           
           
           $pdo = AccesoDB::getCon();
                   
           
                $sql = "select a.id_cli,a.nom_cli,a.mail_cli,b.nom_marca,a.anio_veh_cli,a.km_act_cli,a.fono_cli,a.dir_cli,a.modelo_veh_cli,a.patente_veh_cli, b.id_marca
from clientes a, marcas_veh b 
where a.marca_veh_cli = b.id_marca and a.patente_veh_cli = :cli";
                  
           
           $stmt = $pdo->prepare($sql);
           $stmt->bindParam(":cli", $cli, PDO::PARAM_STR);
           $stmt->execute();
           $response = $stmt->fetchAll();
           return $response;
       } catch (Exception $e) {
           echo"-1";
            //echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../../index.html';</script>";
       }
   }








	/*///////////////////////////////////////
    Cargar datos de producto
    //////////////////////////////////////*/
    public function cargar_datos_prod($cod,$vig){
        try{
           
           
           $pdo = AccesoDB::getCon();
                   
           if ($vig == 0) {
                $sql = "select * from producto where (cod_barra_prod = :cod or id_prod = :cod) ";
           }else if ($vig == 1) {
               $sql = "select a.id_prod, a.nom_prod,a.uni_med_pro,a.stock_min_prod,
a.stock_prod,a.vig_prod,a.fec_cre_prod,a.usu_cre_prod,a.precio_bruto_prod,a.iva_prod,
a.proc_ganan_prod,a.precio_neto_prod,a.id_prov_prod,a.embalaje_prod,
a.cod_barra_prod,a.familia_prod,a.marca_prod,
fam.desc_item, uni.desc_item, a.precio_bruto_prod precio, a.id_prov_prod
from producto a, tab_param fam, tab_param uni
 where a.uni_med_pro = uni.cod_item and uni.cod_grupo = 1 and uni.vig_item = 1
 and a.familia_prod = fam.cod_item and fam.cod_grupo = 2 and fam.vig_item = 1 
 and (a.cod_barra_prod = :cod or a.id_prod = :cod) and a.vig_prod = 1";
           }  else if ($vig == 2) {
                $sql = "select * from producto where (cod_barra_prod = :cod or id_prod = :cod) and vig_prod = 1";

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