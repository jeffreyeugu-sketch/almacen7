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
    if (odbc_num_rows($rs)>=1)
    {
      $sql = "";
      $sql = $sql . ""; 
      //$rs  = odbc_exec($conn,$sql);      
      $_SESSION['userid']   = odbc_result($rs,"clave");
      $_SESSION['username'] = odbc_result($rs,"nombre");
      $_SESSION['CodigoW']  = rand(1000,9999);
      
      error_reporting(E_ALL);
      $numero_wa = "5215542027344";
      $msgB64 = base64_encode($_SESSION['CodigoW'] . " Este es el código TICCMED");
      $vars = 'whatsapp_phone=' . $numero_wa . '&msg='.$msgB64;
      $headers = array(
          'Content-Type: application/x-www-form-urlencoded',
        'nojoch-api-key: A3VkcPUdc1IyXsbvsUiJhUhvnogjnxABsZQzdbhDSqmBoV0yudGff2pNepn1daSuFpyMWyhjoZQYVrMivS2Fn156ZQk90ycUPGufIoqGgrsuiGOApt4CoRDxC8ioJr2qU5/4AU1qJgvOnC+TgegbYCf2e3M/DOaUu6UXqObbNe4'
      );
      $urlAPI = "https://api.nojoch.cloud/lis/panda/c42d283f-20a9-11ec-b2d1-02a34b1f789f";      
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$urlAPI . "/envia/whatsapp/msg");
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS,$vars);  //Post Fields
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false); 
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $respuesta = curl_exec($ch);
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
      echo "Error|Error. Revise los datos";
    }
  }
  else
  {
    echo "Error|sin datos";
  }
?>  