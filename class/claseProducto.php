<?php
require_once '../recursos/db/db.php';

/*/////////////////////////////
Clase Producto
////////////////////////////*/

class ProductoDAO    
{
    private $id_prod;
    private $nom_prod;
    private $uni_med_pro;
    private $stock_min_prod;
    private $stock_prod;
    private $vig_prod;
    private $fec_cre_prod;
    private $usu_cred_prod;
    private $precio_bruto_prod;
    private $iva_prod;
    private $porc_ganan_prod;
    private $precio_neto_prod;
    private $id_prov;
    private $embalaje_prod;
    private $cod_barra_prod;
    private $familia_prod;
    private $marca_prod;
    private $precio_compra_neto;
    private $porc_dscto_compra;
    private $valor_dscto_compra;
    private $precio_compra_neto_dscto;
    private $iva_compra;
    private $precio_total_compra;
    private $valor_ganancia;
    private $precio_venta_calc;
    




    public function __construct( $id_prod=null,
                                 $nom_prod=null,
                                 $uni_med_pro=null,
                                 $stock_min_prod=null,
                                 $stock_prod=null,
                                 $vig_prod=null,
                                 $fec_cre_prod=null,
                                 $usu_cred_prod=null,
                                 $precio_bruto_prod=null,
                                 $iva_prod=null,
                                 $porc_ganan_prod=null,
                                 $precio_neto_prod=null,
                                 $id_prov=null,
                                 $embalaje_prod=null,
                                 $cod_barra_prod=null,
                                 $familia_prod=null,
                                 $marca_prod=null,
                                 $precio_compra_neto=null,
                                 $porc_dscto_compra=null,
                                 $valor_dscto_compra=null,
                                 $precio_compra_neto_dscto=null,
                                 $iva_compra=null,
                                 $precio_total_compra=null,
                                 $valor_ganancia=null,
                                 $precio_venta_calc=null) 
                                {


    $this->id_prod                =$id_prod;
    $this->nom_prod               =$nom_prod;
    $this->uni_med_pro            =$uni_med_pro;
    $this->stock_min_prod         =$stock_min_prod;
    $this->stock_prod             =$stock_prod;
    $this->vig_prod               =$vig_prod;
    $this->fec_cre_prod           =$fec_cre_prod;
    $this->usu_cred_prod          =$usu_cred_prod;
    $this->precio_bruto_prod      =$precio_bruto_prod;
    $this->iva_prod               =$iva_prod;
    $this->porc_ganan_prod        =$porc_ganan_prod;
    $this->precio_neto_prod       =$precio_neto_prod;
    $this->id_prov                =$id_prov;
    $this->embalaje_prod          =$embalaje_prod;
    $this->cod_barra_prod         =$cod_barra_prod;
    $this->familia_prod           =$familia_prod;
    $this->marca_prod             =$marca_prod;
    $this->precio_compra_neto     =$precio_compra_neto;
    $this->porc_dscto_compra      =$porc_dscto_compra;
    $this->valor_dscto_compra     =$valor_dscto_compra;
    $this->precio_compra_neto_dscto      =$precio_compra_neto_dscto;
    $this->iva_compra             =$iva_compra;
    $this->precio_total_compra    =$precio_total_compra;
    $this->valor_ganancia         =$valor_ganancia;
    $this->precio_venta_calc      =$precio_venta_calc;

    }

    public function getprod() {
    return $this->id_prod;
    }


    /*///////////////////////////////////////
    Crear producto
    //////////////////////////////////////*/
    public function cre_prod() {


        try{
             
                $pdo = AccesoDB::getCon();

                $sql_cre_prod = "INSERT INTO `producto`
                                (`nom_prod`,`uni_med_pro`,`stock_min_prod`,`stock_prod`,`vig_prod`,`fec_cre_prod`,`usu_cre_prod`,`precio_bruto_prod`,
                                `iva_prod`,`proc_ganan_prod`,`precio_neto_prod`,`id_prov_prod`,`embalaje_prod`,`cod_barra_prod`,`familia_prod`,`marca_prod`,
                                `precio_compra_neto`,`porc_dscto_compra`,`valor_dcto_compra`,`precio_compra_neto_dscto`,`iva_compra`,`precio_total_compra`,`valor_ganancia`,`precio_venta_calc`)
                                VALUES
                                (:nom_prod,:uni_med_pro,:stock_min_prod,0,:vig_prod,:fec_cre_prod,:usu_cre_prod,:precio_bruto_prod,:iva_prod,:proc_ganan_prod,:precio_neto_prod,:id_prov_prod,
                                :embalaje_prod,:cod_barra_prod,:familia_prod,:marca_prod,:precio_compra_neto,:porc_dscto_compra,:valor_dcto_compra,:precio_compra_neto_dscto,
                                :iva_compra,:precio_total_compra,:valor_ganancia,:precio_venta_calc);";


                $stmt = $pdo->prepare($sql_cre_prod);
                $stmt->bindParam(":nom_prod", $this->nom_prod, PDO::PARAM_STR);
                $stmt->bindParam(":uni_med_pro", $this->uni_med_pro, PDO::PARAM_INT);
                $stmt->bindParam(":stock_min_prod", $this->stock_min_prod, PDO::PARAM_INT);
                $stmt->bindParam(":vig_prod", $this->vig_prod, PDO::PARAM_INT);
                $stmt->bindParam(":fec_cre_prod", $this->fec_cre_prod, PDO::PARAM_STR);
                $stmt->bindParam(":usu_cre_prod", $this->usu_cred_prod, PDO::PARAM_INT);
                $stmt->bindParam(":precio_bruto_prod", $this->precio_bruto_prod, PDO::PARAM_INT);
                $stmt->bindParam(":iva_prod", $this->iva_prod, PDO::PARAM_INT);
                $stmt->bindParam(":proc_ganan_prod", $this->porc_ganan_prod, PDO::PARAM_INT);
                $stmt->bindParam(":precio_neto_prod", $this->precio_neto_prod, PDO::PARAM_INT);
                $stmt->bindParam(":id_prov_prod", $this->id_prov, PDO::PARAM_INT);
                $stmt->bindParam(":embalaje_prod", $this->embalaje_prod, PDO::PARAM_INT);
                $stmt->bindParam(":cod_barra_prod", $this->cod_barra_prod, PDO::PARAM_STR);
                $stmt->bindParam(":familia_prod", $this->familia_prod, PDO::PARAM_INT);
                $stmt->bindParam(":marca_prod", $this->marca_prod, PDO::PARAM_STR);
                $stmt->bindParam(":precio_compra_neto", $this->precio_compra_neto, PDO::PARAM_INT);
                $stmt->bindParam(":porc_dscto_compra", $this->porc_dscto_compra, PDO::PARAM_INT);
                $stmt->bindParam(":valor_dcto_compra", $this->valor_dscto_compra, PDO::PARAM_INT);
                $stmt->bindParam(":precio_compra_neto_dscto", $this->precio_compra_neto_dscto, PDO::PARAM_INT);
                $stmt->bindParam(":iva_compra", $this->iva_compra, PDO::PARAM_INT);
                $stmt->bindParam(":precio_total_compra", $this->precio_total_compra, PDO::PARAM_INT);
                $stmt->bindParam(":valor_ganancia", $this->valor_ganancia, PDO::PARAM_INT);
                $stmt->bindParam(":precio_venta_calc", $this->precio_venta_calc, PDO::PARAM_INT);
                $stmt->execute();






                     return $stmt->rowCount();
                

                 
        

            } catch (Exception $e) {
                //echo"-1";
                echo $e->getMessage();
            }
    }




    /*///////////////////////////////////////
    Modificar Producto
    //////////////////////////////////////*/
    public function mod_prod() {


        try{
             
                $pdo = AccesoDB::getCon();



                $sql_log_prod = "INSERT INTO `log_precio`
                                (`cod_producto`,`usu_log`,`precio_anterior`,`precio_nuevo`)
                                VALUES
                                (:id_prod, :usu, (select precio_bruto_prod from producto where id_prod = :id_prod),:precio);";

                $stmt = $pdo->prepare($sql_log_prod);
                $stmt->bindParam(":id_prod", $this->id_prod, PDO::PARAM_INT);
                $stmt->bindParam(":usu", $this->usu_cred_prod, PDO::PARAM_INT);
                $stmt->bindParam(":precio", $this->precio_bruto_prod, PDO::PARAM_INT);
                $stmt->execute();




                $sql_mod_prod = "UPDATE producto
                                SET
                                nom_prod = :nom_prod,
                                uni_med_pro = :uni_med_pro,
                                stock_min_prod = :stock_min_prod,
                                vig_prod = :vig_prod,
                                precio_bruto_prod = :precio_bruto_prod,
                                iva_prod = :iva_prod,
                                proc_ganan_prod = :proc_ganan_prod,
                                precio_neto_prod = :precio_neto_prod,
                                id_prov_prod = :id_prov_prod,
                                embalaje_prod = :embalaje_prod,
                                familia_prod = :familia_prod,
                                marca_prod = :marca_prod,
                                precio_compra_neto = :precio_compra_neto,
                                porc_dscto_compra = :porc_dscto_compra,
                                valor_dcto_compra = :valor_dcto_compra,
                                precio_compra_neto_dscto = :precio_compra_neto_dscto,
                                iva_compra = :iva_compra,
                                precio_total_compra = :precio_total_compra,
                                valor_ganancia = :valor_ganancia,
                                precio_venta_calc = :precio_venta_calc
                                WHERE id_prod = :id_prod ";


                $stmt = $pdo->prepare($sql_mod_prod);
                $stmt->bindParam(":nom_prod", $this->nom_prod, PDO::PARAM_STR);
                $stmt->bindParam(":uni_med_pro", $this->uni_med_pro, PDO::PARAM_INT);
                $stmt->bindParam(":stock_min_prod", $this->stock_min_prod, PDO::PARAM_INT);
                $stmt->bindParam(":vig_prod", $this->vig_prod, PDO::PARAM_INT);
                $stmt->bindParam(":precio_bruto_prod", $this->precio_bruto_prod, PDO::PARAM_INT);
                $stmt->bindParam(":iva_prod", $this->iva_prod, PDO::PARAM_INT);
                $stmt->bindParam(":proc_ganan_prod", $this->porc_ganan_prod, PDO::PARAM_INT);
                $stmt->bindParam(":precio_neto_prod", $this->precio_neto_prod, PDO::PARAM_INT);
                $stmt->bindParam(":id_prov_prod", $this->id_prov, PDO::PARAM_INT);
                $stmt->bindParam(":embalaje_prod", $this->embalaje_prod, PDO::PARAM_INT);
                $stmt->bindParam(":familia_prod", $this->familia_prod, PDO::PARAM_INT);
                $stmt->bindParam(":marca_prod", $this->marca_prod, PDO::PARAM_STR);
                $stmt->bindParam(":precio_compra_neto", $this->precio_compra_neto, PDO::PARAM_INT);
                $stmt->bindParam(":porc_dscto_compra", $this->porc_dscto_compra, PDO::PARAM_INT);
                $stmt->bindParam(":valor_dcto_compra", $this->valor_dscto_compra, PDO::PARAM_INT);
                $stmt->bindParam(":precio_compra_neto_dscto", $this->precio_compra_neto_dscto, PDO::PARAM_INT);
                $stmt->bindParam(":iva_compra", $this->iva_compra, PDO::PARAM_INT);
                $stmt->bindParam(":precio_total_compra", $this->precio_total_compra, PDO::PARAM_INT);
                $stmt->bindParam(":valor_ganancia", $this->valor_ganancia, PDO::PARAM_INT);
                $stmt->bindParam(":precio_venta_calc", $this->precio_venta_calc, PDO::PARAM_INT);
                $stmt->bindParam(":id_prod", $this->id_prod, PDO::PARAM_INT);
                $stmt->execute();



                     return $stmt->rowCount();
                

        

            } catch (Exception $e) {
                //echo"-1";
                echo $e->getMessage();
            }
    }














  


}

    ?>