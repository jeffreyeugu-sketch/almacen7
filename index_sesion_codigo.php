<?php
  header('Content-type: text/plain; charset=utf-8');
  session_start();
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  if (isset($_SESSION['Loged']))
  {
    if ($_SESSION['Loged']==1)
    {
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
        echo "OK|" . "|" . session_id() . "|" . $_SESSION['CodigoW'] . "|" . $respuesta;
      }        
    }
    else
    {
      echo "Error|Error. Revise los datos " . $_SESSION['Loged'];
    }
  }
  else
  {
    echo "Error|sin datos";
  }
?>  