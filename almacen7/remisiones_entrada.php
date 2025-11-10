<?php
  header('Content-type: text/plain; charset=utf-8');
  session_start();
  include('../mysql.php');
  $resultado = "Error 0";
  if(isset($_POST["NoReg"]))
  {
    include ("../mysql.php");
    $sql = "";
    $sql = "select * from _remisiones_detalle where NoReg=" . $_POST["NoReg"];
    odbc_exec($conn,$sql);
    if (odbc_result($rsp,"Status") == 0 )
    {
      $sql.= "update _remisiones_detalle set Recibido = " . $_POST["Cantidad"] . ", Status=1 where NoReg=" . $_POST["NoReg"] . " and Status=0 ";
      odbc_exec($conn,$sql);
      $sql = "";
      $sql.= "insert into _almacen (Fecha, Usuario, Terminal, NoRegRem, NoRegIns, NoRegDestino, Cantidad) values ('2025-09-04', 1, 1, " . $_POST["NoRegRem"] . ", " . $_POST["NoReg"] . ", 1," . $_POST["Cantidad"] . ") ";
      odbc_exec($conn,$sql);
    }
    $resultado = $sql;
  }
  else
  {
    $resultado = "Error -1";
  }
  echo $resultado;
?>