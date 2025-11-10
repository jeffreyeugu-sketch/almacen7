<?php
  header('Content-type: text/plain; charset=utf-8');
  session_start();
  include('../mysql.php');
  $resultado = "Error 0";
  if(isset($_POST["Claves"]))
  {
    /*
    xUsuario INT(11),
    xTerminal INT(11),
    xRemision INT(11),
    xInsumo INT(11),
    xLote VARCHAR(50),
    xCaducidad DATE,
    xTemperatura INT(11),
    xCantidad INT(11),
    xTipoMov VARCHAR(1),
    xNoRegOrigen INT(11),
    xNoRegDestino INT(11)
    */
    $Claves    = explode("|",$_POST["Claves"]);
    $Lotes     = explode("|",$_POST["Lotes"]);
    $Fechas    = explode("|",$_POST["Fechas"]);
    $Cantidad  = explode("|",$_POST["Cantidad"]);
    $resultado = "Error 1 - " . count($Claves);
    for($i=0;$i<=2;$i++)
    {
      $sql = "";
      $sql = "select NoReg from cat_dev_insumos where clave='" . $Claves[$i]. "'";
      $rsp = odbc_exec($conn,$sql);
      $sql = "select _almacen_remisiones_registra(" . $_SESSION['userNoReg'] . ",1,30," . odbc_result($rsp,"NoReg") . ",'" . $Lotes[$i] . "','" . $Fechas[$i] . "',0," . $Cantidad[$i] . ",'E',0,6) as Registro";
      $rsa = odbc_exec($conn,$sql);        
      $resultado = $resultado . "|" . odbc_result($rsa,"Registro");
    }
    /*
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
    */
  }
  else
  {
    $resultado = "Error -1";
  }
  echo $resultado;
?>