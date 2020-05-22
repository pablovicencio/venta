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
    private $id_cli_venta;
    private $km_venta;
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
                                    $id_cli_venta=null,
                                    $km_venta=null,
                                    $data_venta=null) 
                                {


    $this->id_venta               =$id_venta;
    $this->fec_venta              =$fec_venta;
    $this->est_venta              =$est_venta;
    $this->precio_total_venta     =$precio_total_venta;
    $this->tipo_doc_venta         =$tipo_doc_venta;
    $this->num_doc_venta          =$num_doc_venta;
    $this->usu_venta              =$usu_venta;
    $this->usu_anu_venta          =$usu_anu_venta;
    $this->obs_anu_venta          =$obs_anu_venta;
    $this->fec_anu_venta          =$fec_anu_venta;
    $this->obs_venta              =$obs_venta;
    $this->id_cli_venta           =$id_cli_venta;
    $this->km_venta               =$km_venta;
    $this->data_venta             =$data_venta;


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

                $sql_ing_venta = "INSERT INTO venta
                                    (fec_venta,est_venta,precio_total_venta,obs_venta,id_cli_venta,km_venta)
                                    VALUES
                                    (:fec_venta, :est_venta, :precio_total_venta, :obs_venta, (select id_cli from clientes where patente_veh_cli = :id_cli_venta), :km_venta)";


                $stmt = $pdo->prepare($sql_ing_venta);
                $stmt->bindParam(":fec_venta", $this->fec_venta, PDO::PARAM_STR);
                $stmt->bindParam(":est_venta", $this->est_venta, PDO::PARAM_INT);
                $stmt->bindParam(":precio_total_venta", $this->precio_total_venta, PDO::PARAM_INT);
                $stmt->bindParam(":obs_venta", $this->obs_venta, PDO::PARAM_STR);
                $stmt->bindParam(":id_cli_venta", $this->id_cli_venta, PDO::PARAM_STR);
                $stmt->bindParam(":km_venta", $this->km_venta, PDO::PARAM_STR);
                $stmt->execute();


                 $sql= "SELECT id_venta FROM venta ORDER BY id_venta DESC LIMIT 1 ";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $id = $stmt->fetchColumn();


                foreach ($this->data_venta as $row) {
                              $prod = $row['prod'];
                              $cant = $row['cant'];
                              $pre_total = $row['pre_total'];
                              $prov = $row['prov'];

                              $pre_uni = $pre_total/$cant;


                                $sql_det_venta = "INSERT INTO det_venta
                                                    (id_prod_det_venta,cant_dventa,precio_uni_dventa,precio_total_dventa,id_cab_venta)
                                                    VALUES
                                                    (:id_prod_det_venta,:cant_dventa,:precio_uni_dventa,:precio_total_dventa,:id_cab_venta)";


                                $stmt = $pdo->prepare($sql_det_venta);
                                        $stmt->bindParam("id_prod_det_venta", $prod, PDO::PARAM_INT);
                                        $stmt->bindParam("cant_dventa", $cant, PDO::PARAM_INT);
                                        $stmt->bindParam("precio_uni_dventa", $pre_uni, PDO::PARAM_INT);
                                        $stmt->bindParam("precio_total_dventa", $pre_total, PDO::PARAM_INT);
                                        $stmt->bindParam("id_cab_venta", $id, PDO::PARAM_INT);

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
                //$stmt->bindParam(":", $, PDO::PARAM_INT);
                $stmt->execute();



                    return $stmt->rowCount();



            } catch (Exception $e) {
                //echo"-1";
                echo $e->getMessage();
            }
    }

















}

    ?> 