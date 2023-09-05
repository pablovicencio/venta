<?php 
session_start(); 
if( isset($_SESSION['id']) ){
    //Si la sesión esta seteada no hace nada
    $id = $_SESSION['id'];
    $nom_usu = $_SESSION['nom'];
    $correo_usu = $_SESSION['correo'];
  }
  else{
    //Si no lo redirige a la pagina index para que inicie la sesion 
    header("location: index.html");
  }   

  
?>