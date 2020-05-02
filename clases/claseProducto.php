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
                                 $embalaje_prod=null) 
                                {


    $this-> $id_prod            =$id_prod;
    $this-> $nom_prod           =$nom_prod;
    $this-> $uni_med_pro        =$uni_med_pro;
    $this-> $stock_min_prod     =$stock_min_prod;
    $this-> $stock_prod         =$stock_prod;
    $this-> $vig_prod           =$vig_prod;
    $this-> $fec_cre_prod       =$fec_cre_prod;
    $this-> $usu_cred_prod      =$usu_cred_prod;
    $this-> $precio_bruto_prod  =$precio_bruto_prod;
    $this-> $iva_prod           =$iva_prod;
    $this-> $porc_ganan_prod    =$porc_ganan_prod;
    $this-> $precio_neto_prod   =$precio_neto_prod;
    $this-> $id_prov            =$id_prov;
    $this-> $embalaje_prod      =$embalaje_prod;
                                    

    }

    public function getprod() {
    return $this->id_prod;
    }


    /*///////////////////////////////////////
    Ingresar producto
    //////////////////////////////////////*/
    public function ing_prod() {


        try{
             
                $pdo = AccesoDB::getCon();

                $sql_ing_prod = "";


                $stmt = $pdo->prepare($sql_ing_prod);
                $stmt->bindParam(":", , PDO::PARAM_INT);
                
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

                $sql_mod_prod = "";


                $stmt = $pdo->prepare($sql_mod_prod);
                $stmt->bindParam(":", $, PDO::PARAM_INT);
                $stmt->execute();



                    return $stmt->rowCount();

        

            } catch (Exception $e) {
                //echo"-1";
                echo $e->getMessage();
            }
    }














  


}

    ?>