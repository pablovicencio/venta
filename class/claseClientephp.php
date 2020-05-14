<?php
require_once '../recursos/db/db.php';

/*/////////////////////////////
Clase Clientes
////////////////////////////*/

class ClientesDAO    
{
    private $id_cli;
    private $nom_cli;
    private $mail_cli;
    private $marca_veh_cli;
    private $anio_veh_cli;
    private $km_act_cli;
    private $fono_cli;
    private $dir_cli;
    private $modelo_veh_cli;
    private $patente_veh_cli;




    public function __construct(    $id_cli=null,
                                    $nom_cli=null,
                                    $mail_cli=null,
                                    $marca_veh_cli=null,
                                    $anio_veh_cli=null,
                                    $km_act_cli=null,
                                    $fono_cli=null,
                                    $dir_cli=null,
                                    $modelo_veh_cli=null,
                                    $patente_veh_cli=null) 
                                {


    $this-> $id_cli         =$id_cli;
    $this-> $nom_cli        =$nom_cli;
    $this-> $mail_cli       =$mail_cli;
    $this-> $marca_veh_cli  =$marca_veh_cli;
    $this-> $anio_veh_cli   =$anio_veh_cli;
    $this-> $km_act_cli     =$km_act_cli;
    $this-> $fono_cli       =$fono_cli;
    $this-> $dir_cli        =$dir_cli;
    $this-> $modelo_veh_cli =$modelo_veh_cli;
    $this-> $patente_veh_cli=$patente_veh_cli;
                                    

    }

    public function getcli() {
    return $this->id_cli;
    }


    /*///////////////////////////////////////
    Crear Cliente
    //////////////////////////////////////*/
    public function crear_cli() {


        try{
             
                $pdo = AccesoDB::getCon();

                $sql_crear_cli = "";


                $stmt = $pdo->prepare(sql_crear_cli);
                $stmt->bindParam(":", , PDO::PARAM_INT);
                
                $stmt->execute();

                
                
                return $stmt->rowCount();
                 
        

            } catch (Exception $e) {
                //echo"-1";
                echo $e->getMessage();
            }
    }




    /*///////////////////////////////////////
    Modificar Cliente
    //////////////////////////////////////*/
    public function mod_cli() {


        try{
             
                $pdo = AccesoDB::getCon();

                $sql_mod_cli = "";


                $stmt = $pdo->prepare($sql_mod_cli);
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