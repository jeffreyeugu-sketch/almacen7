<?php
  header('Content-type: text/plain; charset=utf-8');
  session_start();
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  if (isset($_POST['Username']))
  {
    include ("mysql.php");
    $usuarioId = $_POST['Username'];
    $password  = $_POST['Password'];
    $sql = "";
    $sql = $sql . "select Clave, Nombre from sis_usuarios where Clave='" . $usuarioId . "' ";
    $sql = $sql . "and pass=md5(concat('" . $password . "','V0001')) ";  
    $rs  = odbc_exec($conn,$sql);
    if (odbc_num_rows($rs)>0)
    {
      $sql = "";
      $sql = $sql . ""; 
      //$rs  = odbc_exec($conn,$sql);      
      $_SESSION['userid']   = odbc_result($rs,"clave");
      $_SESSION['username'] = odbc_result($rs,"nombre");
      $_SESSION['CodigoW']  = rand(1000,9999);
      
      $respuesta = "ok";
      // print  $server_output ;0
      if ($respuesta == "")
      {        
        //echo "Error|Error no se puede enviar el código";
        echo "OK|Error no se puede enviar el código" . "|" . session_id() . "|" . $_SESSION['CodigoW'] . "|" . $respuesta;
      }
      else
      {
        $_SESSION['Loged'] = 1  ;
        echo "OK|" . odbc_result($rs,"clave") . "|" . session_id() . "|" . $_SESSION['CodigoW'] . "|" . $respuesta;
      }            
    }
    else
    {
      echo "Error|Error. Revise los datos " . $sql;
    }
  }
  else
  {
    echo "Error|sin datos";
  }
?>  