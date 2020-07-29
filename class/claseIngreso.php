<?php
require_once '../recursos/db/db.php';

/*/////////////////////////////
Clase Ingreso
////////////////////////////*/

class IngresoDAO    
{
    private $id_ing;
    private $fec_ing;
    private $est_ing;
    private $costo_total_ing;
    private $tipo_doc_ing;
    private $num_doc_ing;
    private $usu_ing;
    private $usu_anu_ing;
    private $obs_anu_ing;
    private $fec_anu_ing;
    private $data_ing;




    public function __construct(    $id_ing=null,
                                    $fec_ing=null,
                                    $est_ing=null,
                                    $costo_total_ing=null,
                                    $tipo_doc_ing=null,
                                    $num_doc_ing=null,
                                    $usu_ing=null,
                                    $usu_anu_ing=null,
                                    $obs_anu_ing=null,
                                    $fec_anu_ing=null,
                                    $data_ing=null) 
                                {


    $this->id_ing               =$id_ing;
    $this->fec_ing              =$fec_ing;
    $this->est_ing              =$est_ing;
    $this->costo_total_ing      =$costo_total_ing;
    $this->tipo_doc_ing         =$tipo_doc_ing;
    $this->num_doc_ing          =$num_doc_ing;
    $this->usu_ing              =$usu_ing;
    $this->usu_anu_ing          =$usu_anu_ing;
    $this->obs_anu_ing          =$obs_anu_ing;
    $this->fec_anu_ing          =$fec_anu_ing;
    $this->data_ing             =$data_ing;


    }

    public function geting() {
    return $this->id_ing;
    }


    /*///////////////////////////////////////
    Registrar Ingreso
    //////////////////////////////////////*/
    public function reg_ing() {


        try{

                $pdo = AccesoDB::getCon();

                $sql_reg_ing = "INSERT INTO ingreso
                                    (fec_ing,est_ing,costo_total_ing,tipo_doc_ing,num_doc_ing, usu_ing)
                                    VALUES
                                    (:fec_ing, :est_ing, :costo_total_ing, :tipo_doc_ing,:num_doc_ing, :usu_ing)";


                $stmt = $pdo->prepare($sql_reg_ing);
                $stmt->bindParam(":fec_ing", $this->fec_ing, PDO::PARAM_STR);
                $stmt->bindParam(":est_ing", $this->est_ing, PDO::PARAM_INT);
                $stmt->bindParam(":costo_total_ing", $this->costo_total_ing, PDO::PARAM_INT);
                $stmt->bindParam(":tipo_doc_ing", $this->tipo_doc_ing, PDO::PARAM_INT);
                $stmt->bindParam(":num_doc_ing", $this->num_doc_ing, PDO::PARAM_INT);
                $stmt->bindParam(":usu_ing", $this->usu_ing, PDO::PARAM_INT);
                $stmt->execute();


                 $sql= "SELECT id_ing FROM ingreso ORDER BY id_ing DESC LIMIT 1 ";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $id = $stmt->fetchColumn();


                foreach ($this->data_ing as $row) {
                              $prod = $row['prod'];
                              $cant = $row['cant'];
                              $pre_total = $row['pre_total'];
                              $prov = $row['prov'];

                              $pre_uni = $pre_total/$cant;


                                $sql_det_ing = "INSERT INTO det_ingreso
                                                    (id_prod_ing,cant_ing,precio_unit_ing,precio_total_ing,prov_prod_ing, id_cab_ing)
                                                    VALUES
                                                    (:id_prod_ing,:cant_ing,:precio_unit_ing,:precio_total_ing,:prov_prod_ing, :id_cab_ing)";


                                $stmt = $pdo->prepare($sql_det_ing);
                                        $stmt->bindParam("id_prod_ing", $prod, PDO::PARAM_INT);
                                        $stmt->bindParam("cant_ing", $cant, PDO::PARAM_STR);
                                        $stmt->bindParam("precio_unit_ing", $pre_uni, PDO::PARAM_INT);
                                        $stmt->bindParam("precio_total_ing", $pre_total, PDO::PARAM_INT);
                                        $stmt->bindParam("prov_prod_ing", $prov, PDO::PARAM_INT);
                                        $stmt->bindParam("id_cab_ing", $id, PDO::PARAM_INT);

                                $stmt->execute();


                                $sql_stock= "update producto
                                             set stock_prod = stock_prod + :cant
                                             where id_prod = :id";
                                $stmt_stock = $pdo->prepare($sql_stock);
                                    $stmt_stock->bindParam("id", $prod, PDO::PARAM_INT);
                                    $stmt_stock->bindParam("cant", $cant, PDO::PARAM_STR);
                                $stmt_stock->execute();

                 }

                 if ($stmt->rowCount() > 0) {
                     return $id;
                 }else{
                     return $stmt->rowCount();
                 }

               



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