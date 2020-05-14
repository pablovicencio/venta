<?php
require_once '../recursos/db/db.php';

/*/////////////////////////////
Clase Proveedores
////////////////////////////*/

class ProveedoresDAO    
{
    private $id_prov;
    private $nom_prov;
    private $desc_prov;
    private $fono_prov;
    private $mail_prov;
    private $vig_prov;
    private $usu_cre_prov;
    private $fec_cre_prov;
    private $web_prov;



    public function __construct( $id_prov=null,
                                 $nom_prov=null,
                                 $desc_prov=null,
                                 $fono_prov=null,
                                 $mail_prov=null,
                                 $vig_prov=null,
                                 $usu_cre_prov=null,
                                 $fec_cre_prov=null,
                                 $web_prov=null) 
                                {


    $this->$id_prov         =$id_prov;
    $this->$nom_prov        =$nom_prov;
    $this->$desc_prov       =$desc_prov;
    $this->$fono_prov       =$fono_prov;
    $this->$mail_prov       =$mail_prov;
    $this->$vig_prov        =$vig_prov;
    $this->$usu_cre_prov    =$usu_cre_prov;
    $this->$fec_cre_prov    =$fec_cre_prov;
    $this->$web_prov        =$web_prov
                                    

    }

    public function getprov() {
    return $this->id_prov;
    }


    /*///////////////////////////////////////
    Crear Proveedor
    //////////////////////////////////////*/
    public function crear_prov() {


        try{
             
                $pdo = AccesoDB::getCon();

                $sql_crear_prov = "";


                $stmt = $pdo->prepare(sql_crear_prov);
                $stmt->bindParam(":", , PDO::PARAM_INT);
                
                $stmt->execute();

                
                
                return $stmt->rowCount();
                 
        

            } catch (Exception $e) {
                //echo"-1";
                echo $e->getMessage();
            }
    }




    /*///////////////////////////////////////
    Modificar Proveedor
    //////////////////////////////////////*/
    public function mod_prov() {


        try{
             
                $pdo = AccesoDB::getCon();

                $sql_mod_prov = "";


                $stmt = $pdo->prepare($sql_mod_prov);
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