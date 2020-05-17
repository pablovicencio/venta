<?php

require_once '../recursos/db/db.php';


class Funciones 
{
	/*///////////////////////////////////////
    Cargar datos de producto
    //////////////////////////////////////*/
    public function cargar_datos_prod($cod,$vig){
        try{
           
           
           $pdo = AccesoDB::getCon();
                   
           if ($vig == 0) {
                $sql = "select * from producto where cod_barra_prod = :cod";
           }else if ($vig == 1) {
               $sql = "select * from producto where cod_barra_prod = :cod and vig_prod = 1";
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