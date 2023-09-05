<?php

require_once '../recursos/db/db.php';


class Funciones 
{
    /*///////////////////////////////////////
    Cargar proveedores
    //////////////////////////////////////*/
    public function cargar_proveedor($id){
        try{
           
           
           $pdo = AccesoDB::getCon();

                $sql = "select * from proveedores where id_prov = :id";
                   
           
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
    info resumen tab
    //////////////////////////////////////*/
    public function cargar_datos_restab($tipo){
        try{
           
           
           $pdo = AccesoDB::getCon();


           
          switch ($tipo) {
             case '1':
                $sql = "select b.nom_prod, ifnull(sum(c.cant_dventa),0) cantidad,d.desc_item familia, b.marca_prod,b.stock_prod 
                        from venta a inner join det_venta c on a.id_venta = c.id_cab_venta inner join producto b on c.id_prod_det_venta = b.id_prod
                        ,tab_param d
                        where month(a.fec_venta) = month(sysdate()) and year(a.fec_venta) = year(sysdate()) and a.est_venta = 1
                        and d.cod_grupo = 2 and b.familia_prod = d.cod_item
                        group by b.nom_prod,  d.desc_item, b.marca_prod,b.stock_prod";

               break;
               case '2':
                $sql = "select  ifnull(sum(c.cant_dventa),0) cantidad,d.desc_item familia
                        from venta a inner join det_venta c on a.id_venta = c.id_cab_venta inner join producto b on c.id_prod_det_venta = b.id_prod
                        ,tab_param d
                        where month(a.fec_venta) = month(sysdate()) and year(a.fec_venta) = year(sysdate()) and a.est_venta = 1
                        and d.cod_grupo = 2 and b.familia_prod = d.cod_item
                        group by d.desc_item order by 1 desc";

               break;


             

           }

              
               
                $stmt = $pdo->prepare($sql);
                //$stmt->bindParam(":id_ven", $id_ven, PDO::PARAM_INT);
                

           $stmt->execute();
           $response = $stmt->fetchAll();
           return $response;
       } catch (Exception $e) {
           echo"-1";
            //echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../../index.html';</script>";
       }
   }


    /*///////////////////////////////////////
    info resumen main
    //////////////////////////////////////*/
    public function cargar_datos_resven(){
        try{
           
           
           $pdo = AccesoDB::getCon();


           
                $sql = "select  
                        ifnull((select  sum(c.precio_total_dventa) 
                                                from venta a, det_venta c
                                                where DATE_FORMAT(a.fec_venta, '%d-%m-%Y') = DATE_FORMAT(sysdate(), '%d-%m-%Y') and a.est_venta = 1 and a.id_venta = c.id_cab_venta and c.id_prod_det_venta not in (
                        833,
                        735,
                        712,
                        714
                        )),0) vtadia,
                        (select  count(a.id_venta) 
                                                from venta a, det_venta c
                                                where DATE_FORMAT(a.fec_venta, '%d-%m-%Y') = DATE_FORMAT(sysdate(), '%d-%m-%Y') and a.est_venta = 1 and a.id_venta = c.id_cab_venta and c.id_prod_det_venta not in (
                        833,
                        735,
                        712,
                        714
                        )) cantvtadia,
                        (select  count(a.id_cli_venta) 
                                                from venta a, det_venta c
                                                where DATE_FORMAT(a.fec_venta, '%d-%m-%Y') = DATE_FORMAT(sysdate(), '%d-%m-%Y') and a.est_venta = 1 and a.id_venta = c.id_cab_venta and c.id_prod_det_venta not in (
                        833,
                        735,
                        712,
                        714
                        )) clivtadia,
                        (select  sum(c.precio_total_dventa) 
                                                from venta a, det_venta c
                                                where month(a.fec_venta) = month(sysdate()) and year(a.fec_venta) = year(sysdate()) and a.est_venta = 1 and a.id_venta = c.id_cab_venta and c.id_prod_det_venta not in (
                        833,
                        735,
                        712,
                        714
                        )) vtames,
                        ifnull((select  sum(c.precio_total_dventa) 
                                                from venta a, det_venta c
                                                where WEEK(ADDDATE(a.fec_venta, INTERVAL 1 DAY)) = WEEK(ADDDATE(sysdate(), INTERVAL 1 DAY)) 
                                                and year(a.fec_venta) = year(sysdate()) and a.est_venta = 1 and a.id_venta = c.id_cab_venta and c.id_prod_det_venta not in (
                        833,
                        735,
                        712,
                        714
                        )),0) vtasem,
                        (select  sum(c.precio_total_dventa) 
                                                from venta a, det_venta c
                                                where month(a.fec_venta) = month(sysdate()) and year(a.fec_venta) = year(sysdate()) and a.est_venta = 1 and a.id_venta = c.id_cab_venta and c.id_prod_det_venta in (
                        833,
                        735,
                        712,
                        714
                        )) vtamesmo,
                        ifnull((select  sum(c.precio_total_dventa) 
                                                from venta a, det_venta c
                                                where WEEK(ADDDATE(a.fec_venta, INTERVAL 1 DAY)) = WEEK(ADDDATE(sysdate(), INTERVAL 1 DAY)) 
                                                and year(a.fec_venta) = year(sysdate()) and a.est_venta = 1 and a.id_venta = c.id_cab_venta and c.id_prod_det_venta in (
                        833,
                        735,
                        712,
                        714
                        )),0) vtasemmo";

              
               
                $stmt = $pdo->prepare($sql);
                //$stmt->bindParam(":id_ven", $id_ven, PDO::PARAM_INT);
                

           $stmt->execute();
           $response = $stmt->fetchAll();
           return $response;
       } catch (Exception $e) {
           echo"-1";
            //echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../../index.html';</script>";
       }
   }




    /*///////////////////////////////////////
    info graficos main
    //////////////////////////////////////*/
    public function cargar_datos_graf($graf){
        try{
           
           
           $pdo = AccesoDB::getCon();


           switch ($graf) {
             case 'vdia':
                $sql = "select day(a.fec_venta) periodo, ifnull(sum(c.precio_total_dventa),0) venta,
                          ifnull((select sum(b.costo_total_ing) 
                          from ingreso b
                          where month(b.fec_ing) = month(sysdate()) and year(b.fec_ing) = year(sysdate()) and b.est_ing = 1 and day(a.fec_venta) = day(b.fec_ing)),0) ing
                        from venta a, det_venta c
                        where month(a.fec_venta) = month(sysdate()) and year(a.fec_venta) = year(sysdate()) and a.est_venta = 1
                        and a.id_venta = c.id_cab_venta and c.id_prod_det_venta not in (
                        833,
                        735,
                        712,
                        714
                        )
                        group by day(a.fec_venta)
                        order by 1";

               break;
               case 'vmen':
                $sql = "select month(a.fec_venta) periodo, ifnull(sum(c.precio_total_dventa),0) venta,
                          ifnull((select sum(b.costo_total_ing) 
                          from ingreso b
                          where month(b.fec_ing) = month(sysdate()) and year(b.fec_ing) = year(sysdate()) and b.est_ing = 1 and month(a.fec_venta) = month(b.fec_ing)),0) ing
                        from venta a, det_venta c
                        where year(a.fec_venta) = year(sysdate()) and a.est_venta = 1
                        and a.id_venta = c.id_cab_venta and c.id_prod_det_venta not in (
                        833,
                        735,
                        712,
                        714
                        )
                        group by month(a.fec_venta) 
                        order by 1";

               break;


             

           }

              
               
                $stmt = $pdo->prepare($sql);
                //$stmt->bindParam(":id_ven", $id_ven, PDO::PARAM_INT);
                

           $stmt->execute();
           $response = $stmt->fetchAll();
           return $response;
       } catch (Exception $e) {
           echo"-1";
            //echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../../index.html';</script>";
       }
   }
    
    /*///////////////////////////////////////
    informe stock
    //////////////////////////////////////*/
    public function cargar_inf_stock($tipo,$param){
        try{
           
           
           $pdo = AccesoDB::getCon();

           if ($tipo == 1) {
             $sql = "select a.id_prod, a.nom_prod,a.marca_prod,a.cod_barra_prod,a.stock_min_prod,a.stock_prod,p.nom_prov,
                      a.precio_total_compra,a.precio_bruto_prod
                      ,round((
                      select ifnull(sum(cant_dventa),0)
                      from venta v, det_venta dt
                      where v.id_venta = dt.id_cab_venta
                      and v.est_venta = 1 and dt.id_prod_det_venta = a.id_prod
                      and v.fec_venta between date_add(NOW(), INTERVAL -:param DAY) and sysdate())
                      ,2
                      ) venta_semanal
                      from producto a, tab_param fam, tab_param uni, proveedores p
                       where a.uni_med_pro = uni.cod_item and uni.cod_grupo = 1 and uni.vig_item = 1
                       and a.familia_prod = fam.cod_item and fam.cod_grupo = 2 and fam.vig_item = 1 
                       and p.id_prov = a.id_prov_prod and p.vigencia = 1
                       and a.vig_prod = 1";
           }else if ($tipo == 2) {
             $sql = "select a.id_prod, a.nom_prod,a.marca_prod,a.cod_barra_prod,a.stock_min_prod,a.stock_prod,p.nom_prov,
                      a.precio_total_compra,a.precio_bruto_prod
                      ,round((
                      select ifnull(sum(cant_dventa),0)
                      from venta v, det_venta dt
                      where v.id_venta = dt.id_cab_venta
                      and v.est_venta = 1 and dt.id_prod_det_venta = a.id_prod)
                      ,2
                      ) venta_semanal
                      from producto a, tab_param fam, tab_param uni, proveedores p
                       where a.uni_med_pro = uni.cod_item and uni.cod_grupo = 1 and uni.vig_item = 1
                       and a.familia_prod = fam.cod_item and fam.cod_grupo = 2 and fam.vig_item = 1 
                       and p.id_prov = a.id_prov_prod and p.vigencia = 1
                       and a.vig_prod = 1 and (a.id_prod = :param or a.cod_barra_prod = :param)";
           }

              
                

                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":param", $param, PDO::PARAM_STR);

           $stmt->execute();
           $response = $stmt->fetchAll();
           return $response;
       } catch (Exception $e) {
           echo"-1";
            //echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../../index.html';</script>";
       }
   }

    
    

    /*///////////////////////////////////////
    Cargar datos de detalle cot
    //////////////////////////////////////*/
    public function cargar_datos_det_cot($id,$tipo){
        try{
           
           
           $pdo = AccesoDB::getCon();

           if ($tipo == 1) {
              $sql = 'select CASE
                            WHEN b.familia_prod = 1 THEN "Filtro Aceite"
                            WHEN b.familia_prod = 2 THEN "Filtro Aire"
                            WHEN b.familia_prod = 25 THEN "Filtro Aire Elem"
                            WHEN b.familia_prod = 22 THEN "Filtro combuistible"
                            WHEN b.familia_prod = 24 THEN "Filtro Combustible"
                            WHEN b.familia_prod = 20 THEN "Filtro elemeto Aceite"
                            WHEN b.familia_prod = 21 THEN "Filtro elemeto Comb."
                            WHEN b.familia_prod = 23 THEN "Filtro Hidraulico"
                            ELSE b.nom_prod
                        END nom_prod,
                         a.cant_dcot, c.desc_item, a.precio_uni_dcot, precio_total_dcot
                         from det_cot a, producto b, tab_param c  where b.uni_med_pro = c.cod_item and 
                         c.cod_grupo = 1 and b.id_prod = a.id_prod_det_cot and a.id_cab_cot = :id';
           }else if ($tipo == 2) {
              $sql = 'select a.id_prod_det_cot,b.nom_prod,b.marca_prod,b.cod_barra_prod,
                         a.cant_dcot, c.desc_item, a.precio_uni_dcot, a.precio_total_dcot,b.id_prov_prod
                         from det_cot a, producto b, tab_param c  where b.uni_med_pro = c.cod_item and 
                         c.cod_grupo = 1 and b.id_prod = a.id_prod_det_cot and a.id_cab_cot = :id';
           }
                   
           
               
                  
           
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
    Cargar datos de cabecera cot
    //////////////////////////////////////*/
    public function cargar_datos_cab_cot($id){
        try{
           
           
           $pdo = AccesoDB::getCon();
                   
           
                $sql = "select b.nom_cli, b.mail_cli, c.nom_marca, b.anio_veh_cli, a.km_cot,b.fono_cli, b.modelo_veh_cli,ifnull(b.patente_veh_cli,0) patente_veh_cli,a.obs_cot, 
                        round(a.precio_total_cot/1.19) neto, round((a.precio_total_cot/1.19)*0.19) iva, a.precio_total_cot, a.dscto_cot,DATE_FORMAT(a.fec_cot, '%d-%m-%Y') fec_cot
                        from cotizacion a LEFT JOIN clientes b ON a.id_cli_cot = b.id_cli
                        LEFT JOIN marcas_veh c ON b.marca_veh_cli = c.id_marca
                        where id_cot = :id";
                  
           
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
    Cargar condicion pago
    //////////////////////////////////////*/
    public function cargar_cond_pago($vig){
        try{
           
           
           $pdo = AccesoDB::getCon();

              if($vig == 1){
                $sql = "select * from tab_param where vig_item = 1 and cod_grupo = 5 and cod_item <> 0 order by desc_item desc";
              } else{
                $sql = "select * from tab_param where  cod_grupo = 5 and cod_item <> 0";
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
    informe detalle venta modal
    //////////////////////////////////////*/
    public function cargar_det_ven_mod($id_ven){
        try{
           
           
           $pdo = AccesoDB::getCon();

              
                $sql = "select b.cod_barra_prod, b.nom_prod, b.marca_prod, a.cant_dventa, a.precio_uni_dventa, a.precio_total_dventa 
                        from det_venta a inner join producto b on a.id_prod_det_venta = b.id_prod 
                        where a.id_cab_venta = :id_ven ";

                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":id_ven", $id_ven, PDO::PARAM_INT);
                

           $stmt->execute();
           $response = $stmt->fetchAll();
           return $response;
       } catch (Exception $e) {
           echo"-1";
            //echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../../index.html';</script>";
       }
   }


    /*///////////////////////////////////////
    informe cabecera venta modal
    //////////////////////////////////////*/
    public function cargar_cab_ven_mod($id_ven){
        try{
           
           
           $pdo = AccesoDB::getCon();

              
                $sql = "select a.id_venta,ifnull(b.nom_cli, ' ') nom_cli, ifnull(b.patente_veh_cli, ' ') patente_veh_cli, ifnull(c.nom_marca, ' ') nom_marca,
                        ifnull(b.modelo_veh_cli, ' ') modelo_veh_cli,
                        ifnull(a.km_venta, 0) km_venta, ifnull(a.km_prox_venta, 0) km_prox_venta,
                        DATE_FORMAT(a.fec_venta, '%d-%m-%Y') fec_venta,TIME_FORMAT(a.fec_venta,'%H:%i') hora, 
                        if(a.est_venta=1,'Vigente','Anulada') as estado,
                        ifnull(a.obs_venta, ' ') obs_venta, a.dscto_venta, a.precio_total_venta
                        from venta a left join clientes b on a.id_cli_venta = b.id_cli left join marcas_veh c on b.marca_veh_cli = c.id_marca
                        where a.id_venta = :id_ven ";

                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":id_ven", $id_ven, PDO::PARAM_INT);
                

           $stmt->execute();
           $response = $stmt->fetchAll();
           return $response;
       } catch (Exception $e) {
           echo"-1";
            //echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../../index.html';</script>";
       }
   }



    /*///////////////////////////////////////
    informe venta por cliente
    //////////////////////////////////////*/
    public function cargar_inf_venta_cli($cli){
        try{
           
           
           $pdo = AccesoDB::getCon();

              
                $sql = "select a.id_venta,DATE_FORMAT(a.fec_venta, '%d-%m-%Y') fec_venta,TIME_FORMAT(a.fec_venta,'%H:%i') hora, if(a.est_venta=1,'Vigente','Anulada') as estado,a.dscto_venta, a.precio_total_venta, ifnull(a.obs_venta, ' ') obs_venta, ifnull(b.patente_veh_cli, ' ') patente_veh_cli 
                        from venta a left join clientes b on a.id_cli_venta = b.id_cli
                        where b.patente_veh_cli = :cli order by 2 desc";

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
    informe venta por periodo
    //////////////////////////////////////*/
    public function cargar_inf_venta_per($desde, $hasta){
        try{
           
           
           $pdo = AccesoDB::getCon();

              
                $sql = "select a.id_venta,DATE_FORMAT(a.fec_venta, '%d-%m-%Y') fec_venta,TIME_FORMAT(a.fec_venta,'%H:%i') hora, if(a.est_venta=1,'Vigente','Anulada') as estado,a.dscto_venta, a.precio_total_venta, ifnull(a.obs_venta, ' ') obs_venta, ifnull(b.patente_veh_cli, ' ') patente_veh_cli 
                        from venta a left join clientes b on a.id_cli_venta = b.id_cli
                        where a.fec_venta between :desde and :hasta order by 2 desc";

                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":desde", $desde, PDO::PARAM_STR);
                $stmt->bindParam(":hasta", $hasta, PDO::PARAM_STR);

           $stmt->execute();
           $response = $stmt->fetchAll();
           return $response;
       } catch (Exception $e) {
           echo"-1";
            //echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../../index.html';</script>";
       }
   }



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
                            WHEN b.familia_prod = 25 THEN "Filtro Aire Elem"
                            WHEN b.familia_prod = 22 THEN "Filtro combuistible"
                            WHEN b.familia_prod = 24 THEN "Filtro Combustible"
                            WHEN b.familia_prod = 20 THEN "Filtro elemeto Aceite"
                            WHEN b.familia_prod = 21 THEN "Filtro elemeto Comb."
                            WHEN b.familia_prod = 23 THEN "Filtro Hidraulico"
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
                        round(a.precio_total_venta/1.19) neto, round((a.precio_total_venta/1.19)*0.19) iva, a.precio_total_venta, a.dscto_venta, a.km_prox_venta, d.desc_item cond_pago
                        from venta a LEFT JOIN clientes b ON a.id_cli_venta = b.id_cli
                        LEFT JOIN marcas_veh c ON b.marca_veh_cli = c.id_marca
                        LEFT JOIN tab_param d ON a.cond_pago_venta = d.cod_item and d.cod_grupo = 5
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