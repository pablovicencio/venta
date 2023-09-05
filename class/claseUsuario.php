<?php
require_once '../recursos/db/db.php';

/*/////////////////////////////
/////////Clase Usuario/////////
/////////////////////////////*/

class UsuarioDAO    
{
    private $id_usu;
    private $nom_usu;
    private $vig_usu;
    private $nick_usu;
    private $pass_usu;
    private $correo_usu;
   






    public function __construct($id_usu=null,
                                $nom_usu=null,
                                $vig_usu=null,
                                $nick_usu=null,
                                $pass_usu=null,
                                $correo_usu=null) 
                                {


    $this->id_usu       = $id_usu;
    $this->nom_usu      = $nom_usu;
    $this->vig_usu      = $vig_usu;
    $this->nick_usu     = $nick_usu;
    $this->pass_usu     = $pass_usu;
    $this->correo_usu   = $correo_usu;
    }

    public function getUsu() {
    return $this->id_usu;
    }
    /*///////////////////////////////////////
    /////////////////Login //////////////////
    ///////////////////////////////////////*/
    public function login(){

        try{

                
                $pdo = AccesoDB::getCon();

                $sql_login = "select id_usu id, nom_usu,pass_usu, correo_usu
                from usuario where vig_usu = 1 and nick_usu = :nick and pass_usu = :pass";

                $stmt = $pdo->prepare($sql_login);
                $stmt->bindParam(":nick", $this->nick_usu, PDO::PARAM_STR);
                $stmt->bindParam(":pass", $this->pass_usu, PDO::PARAM_STR);
           
                $stmt->execute();

               

                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if ($this->pass_usu == $row["pass_usu"]){
                    session_start();
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['nom'] = $row['nom_usu'];
                        $_SESSION['correo'] = $row['correo_usu'];
                        $_SESSION['start'] = time();
                        $_SESSION['expire'] = $_SESSION['start'] + (7 * 60);
                        
                        //echo"<script type=\"text/javascript\">       window.location='../pag_usu/inicio.php';</script>";
                        //diferenciacion entre usuarios y clientes
                        
                            echo"0";
                        
                         
                        
                }else{
                    
                   echo "-3";
                   //echo"<script type=\"text/javascript\">alert('Error, favor verifique sus datos e intente nuevamente o comuniquese con su Administrador de Sistema.');window.location='../index.html';</script>"; 
                }

        } catch (Exception $e) {
                echo"-1";
                //echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../../index.html';</script>"; 
        }
    }



        /*///////////////////////////////////////
    //////////Actualizar Contraseña /////////
    ///////////////////////////////////////*/
    public static function actualizar_contraseña($id,$pwd){

        try{

                
                $pdo = AccesoDB::getCon();

                $sql_pwd = "update usuario
                set pass_usu = :pwd
                where id_usu = :id";


                
                $stmt = $pdo->prepare($sql_pwd);
                $stmt->bindParam(":pwd", $pwd, PDO::PARAM_STR);
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);
           
                $stmt->execute();
        

        } catch (Exception $e) {
                echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../../index.html';</script>"; 
        }
    }





    


    

    


}

    ?>