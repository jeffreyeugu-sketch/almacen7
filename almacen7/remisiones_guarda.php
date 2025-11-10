<?php
  header('Content-type: text/plain; charset=utf-8');
  session_start();
  include('../mysql.php');
  $resultado = "Error 0";
  if(isset($_POST["Remision"]))
  {
    /*
    $Remision     = $_POST["Remision"];
    $RegProveedor = $_POST["RegProveedor"];
    $Fecha        = $_POST["Fecha"];
    $Obs          = $_POST["Obs"];
    $sql = "";
    $sql = "sdelect * from _remisiones where remision='" . $Remision. "'";
    $rsp = odbc_exec($conn,$sql);
    $sql = "";
    $sql = "select _remisiones_registra(" . $_SESSION['userNoReg'] . ",1,'"+$Remision+"'," +$RegProveedor+ ",'" + $Fecha+"'+'"+$Obs+"')";
    $rsa = odbc_exec($conn,$sql);        
    */
    $resultado = "1";
  }
  else
  {
    $resultado = "Error -1";
  }
  echo $resultado;
?>