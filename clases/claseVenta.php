<?php
require_once '../recursos/db/db.php';

/*/////////////////////////////
Clase Venta
////////////////////////////*/

class VentaDAO    
{
    private $id_venta;
    private $fec_venta;
    private $est_venta;
    private $precio_total_venta;
    private $tipo_doc_venta;
    private $num_doc_venta;
    private $usu_venta;
    private $usu_anu_venta;
    private $obs_anu_venta;
    private $fec_anu_venta;
    private $obs_venta;
    private $data_venta;




    public function __construct(    $id_venta=null,
                                    $fec_venta=null,
                                    $est_venta=null,
                                    $precio_total_venta=null,
                                    $tipo_doc_venta=null,
                                    $num_doc_venta=null,
                                    $usu_venta=null,
                                    $usu_anu_venta=null,
                                    $obs_anu_venta=null,
                                    $fec_anu_venta=null,
                                    $obs_venta=null,
                                    $data_venta=null) 
                                {


    $this-> $id_venta               =$id_venta;
    $this-> $fec_venta              =$fec_venta;
    $this-> $est_venta              =$est_venta;
    $this-> $precio_total_venta     =$precio_total_venta;
    $this-> $tipo_doc_venta         =$tipo_doc_venta;
    $this-> $num_doc_venta          =$num_doc_venta;
    $this-> $usu_venta              =$usu_venta;
    $this-> $usu_anu_venta          =$usu_anu_venta;
    $this-> $obs_anu_venta          =$obs_anu_venta;
    $this-> $fec_anu_venta          =$fec_anu_venta;
    $this-> $obs_venta              =$obs_venta;
    $this-> $data_venta             =$data_venta;
                                    

    }

    public function getventa() {
    return $this->id_venta;
    }


    /*///////////////////////////////////////
    Ingresar Venta
    //////////////////////////////////////*/
    public function ing_venta() {


        try{
             
                $pdo = AccesoDB::getCon();

                $sql_ing_car_venta = "";


                $stmt = $pdo->prepare($sql_ing_car_venta);
                $stmt->bindParam(":", , PDO::PARAM_INT);
                
                $stmt->execute();


                 $sql= " ";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $id = $stmt->fetchColumn();


                foreach ($this->data_venta as $row) {
                              $part = $row['part'];
                              
                         
                                  $sql_det_venta = "";


                                $stmt = $pdo->prepare($sql_det_venta);
                                        $stmt->bindParam("part", $part, PDO::PARAM_INT);
                                        

                                $stmt->execute();
                
                 }

                
                
                return $stmt->rowCount();
                 
        

            } catch (Exception $e) {
                //echo"-1";
                echo $e->getMessage();
            }
    }




    /*///////////////////////////////////////
    Anular Venta
    //////////////////////////////////////*/
    public function anu_venta() {


        try{
             
                $pdo = AccesoDB::getCon();

                $sql_anu_venta = "";


                $stmt = $pdo->prepare($sql_anu_venta);
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