<?php
  header('Content-type: text/plain; charset=utf-8');
  session_start();
  include('../mysql.php');
  $resultado = "Error -1";
  if(isset($_POST["Clave"]))
  {
    $sql = "";
    $sql.= "select * from cat_dev_insumos where Clave='" . trim($_POST["Clave"]) . "' ";
    $rsp = odbc_exec($conn,$sql);
    if (odbc_fetch_row($rsp))
    {
      $resultado = "OK|" . odbc_result($rsp,"Clave") . "|" . odbc_result($rsp,"Nombre") . "|" . odbc_result($rsp,"CaducaSN");         
    }
    else
    {
      $resultado = "Error -2";
    }
  }
  else
  {
    $resultado = "Error -1";
  }
  echo $resultado;
?>