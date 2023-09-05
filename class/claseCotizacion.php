<?php
require_once '../recursos/db/db.php';

/*/////////////////////////////
Clase Cotización
////////////////////////////*/

class CotDAO    
{
    private $id_cot;
    private $fec_cot;
    private $precio_total_cot;
    private $usu_cot;
    private $obs_cot;
    private $id_cli_cot;
    private $km_cot;
    private $dscto_cot;
    private $data_cot;




    public function __construct(    $id_cot=null,
                                    $fec_cot=null,
                                    $precio_total_cot=null,
                                    $obs_cot=null,
                                    $id_cli_cot=null,
                                    $km_cot=null,
                                    $dscto_cot=null,
                                    $data_cot=null) 
                                {


    $this->id_cot               =$id_cot;
    $this->fec_cot              =$fec_cot;
    $this->precio_total_cot     =$precio_total_cot;
    $this->obs_cot              =$obs_cot;
    $this->id_cli_cot           =$id_cli_cot;
    $this->km_cot               =$km_cot;
    $this->dscto_cot            =$dscto_cot;
    $this->data_cot             =$data_cot;


    }

    public function getcot() {
    return $this->id_cot;
    }


    /*///////////////////////////////////////
    Ingresar Cotización
    //////////////////////////////////////*/
    public function ing_cot() {


        try{

                $pdo = AccesoDB::getCon();

                $sql_ing_cot = "INSERT INTO cotizacion
                                    (fec_cot,precio_total_cot,obs_cot,id_cli_cot,km_cot,dscto_cot)
                                    VALUES
                                    (:fec_cot, :precio_total_cot, :obs_cot, (select id_cli from clientes where patente_veh_cli = :id_cli_cot), :km_cot, :dscto_cot)";


                $stmt = $pdo->prepare($sql_ing_cot);
                $stmt->bindParam(":fec_cot", $this->fec_cot, PDO::PARAM_STR);
                $stmt->bindParam(":precio_total_cot", $this->precio_total_cot, PDO::PARAM_INT);
                $stmt->bindParam(":obs_cot", $this->obs_cot, PDO::PARAM_STR);
                $stmt->bindParam(":id_cli_cot", $this->id_cli_cot, PDO::PARAM_STR);
                $stmt->bindParam(":km_cot", $this->km_cot, PDO::PARAM_INT);
                $stmt->bindParam(":dscto_cot", $this->dscto_cot, PDO::PARAM_INT);
                $stmt->execute();


                 $sql= "SELECT id_cot FROM cotizacion ORDER BY id_cot DESC LIMIT 1 ";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $id = $stmt->fetchColumn();


                foreach ($this->data_cot as $row) {
                              $prod = $row['prod'];
                              $cant = $row['cant'];
                              $pre_total = $row['pre_total'];
                              $prov = $row['prov'];

                              $pre_uni = $pre_total/$cant;


                                $sql_det_venta = "INSERT INTO det_cot
                                                    (id_prod_det_cot,cant_dcot,precio_uni_dcot,precio_total_dcot,id_cab_cot)
                                                    VALUES
                                                    (:id_prod_det_cot,:cant_dcot,:precio_uni_dcot,:precio_total_dcot,:id_cab_cot)";


                                $stmt = $pdo->prepare($sql_det_venta);
                                        $stmt->bindParam("id_prod_det_cot", $prod, PDO::PARAM_INT);
                                        $stmt->bindParam("cant_dcot", $cant, PDO::PARAM_STR);
                                        $stmt->bindParam("precio_uni_dcot", $pre_uni, PDO::PARAM_INT);
                                        $stmt->bindParam("precio_total_dcot", $pre_total, PDO::PARAM_INT);
                                        $stmt->bindParam("id_cab_cot", $id, PDO::PARAM_INT);

                                $stmt->execute();


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






















}

    ?> 