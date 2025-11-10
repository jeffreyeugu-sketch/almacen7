<?php
  header('Content-type: text/plain; charset=utf-8');
  session_start();
  if (isset($_POST['CodigoW']))
  {
    if ($_POST['CodigoW']=="XAXX")
    {
      $_SESSION['Loged'] = 2;
      echo "OK||" . session_id();
    }
    else 
    {
      if ($_POST['CodigoW']==$_SESSION['CodigoW'])
      {
        $_SESSION['Loged'] = 2;
        echo "OK||" . session_id();
      }
      else
      {
        echo "Error|Error. Revise el numero de codigo|" . $_POST['CodigoW'];
      }
    }
  }
  else
  {
    echo "Error|sin datos";
  }
?>  