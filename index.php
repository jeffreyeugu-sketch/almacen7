<?php
session_start();
$Loged = 0;
if (isset($_SESSION["Loged"]))
{
  $Loged = $_SESSION["Loged"];
}
if($Loged==2)
//este segmento se muestra cuando no hay login
{?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Font & Icon -->
  <link rel="stylesheet" href="../../../font/inter/inter.min.css" id="font-css">
  <link rel="stylesheet" href="../../../plugins/material-design-icons-iconfont/material-design-icons.min.css">
  <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
  <!-- Plugins -->
  <!-- CSS plugins goes here -->
  <!-- Main Style -->
  <link rel="stylesheet" href="../../../plugins/simplebar/simplebar.min.css">
  <link rel="stylesheet" href="../../css/style.min.css" id="main-css">
  <link rel="stylesheet" href="../../css/sidebar-gray.min.css" id="theme-css"> <!-- options: blue,cyan,dark,gray,green,pink,purple,red,royal,ash,crimson,namn,frost -->
  <title>Mimity Admin</title>
  <script>    
    userid    = "<?php echo $_SESSION['userid'] ?>"
    sessionid = "<?php echo session_id() ?>"
    isMonitor=false;
  </script>   
  <script src="funciones.007.js"></script>
</head>

<body class="sticky-navbar">

  <!-- Ajax loader -->
  <div id="ajaxloader" class="fade"></div>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar header -->
    <div class="sidebar-header">
      <a href="index.html" class="logo">
        <img src="../../../dist/img/logo-white.svg" alt="Logo" id="main-logo">
        Nojoch
      </a>
      <a href="#" class="nav-link nav-icon rounded-circle ml-auto" data-toggle="sidebar">
        <i class="material-icons">close</i>
      </a> </div>
    <!-- /Sidebar header -->

    <!-- Sidebar body -->    
    <?php include("index_sidebar_body.php") ?>
    <!-- /Sidebar body -->

  </div>
  <!-- /Sidebar -->

  <!-- Main -->
  <div class="main">

    <!-- Main header -->
    <?php include("index_main_header.php") ?>
    <!-- /Main header -->

    <!-- Main navbar -->
    <?php include("index_main_navbar.php") ?>
    <!-- /Main navbar -->

    <!-- Main body -->
    <div class="main-body">

      Cargando datos

    </div>
    <!-- /Main body -->

  </div>
  <!-- /Main -->

  <!-- Search Modal -->
  <?php include("index_search_modal.php") ?>
  <!-- /Search Modal -->

  <!-- Main Scripts -->
  <script src="../../js/jquery.min.js"></script>
  <script src="../../js/bootstrap.bundle.min.js"></script>
  <script src="../../../plugins/simplebar/simplebar.min.js"></script>
  <script src="../../../plugins/feather-icons/feather.min.js"></script>
  <script src="../../js/script.min.js"></script>
  <script src="../../js/settings.min.js"></script>
  <script src="../../js/ajax.min.js" id="ajax-js"></script>

  <!-- Plugins -->
  <!-- JS plugins goes here -->
  <script>
    App.ajax({
      'container': '.main-body',
      'default': 'indicadores.php',
      'breadcrumb': true
    })
  </script>
</body>

</html>
<?php
}
else
{
//Empieza login
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Font & Icon -->
  <link rel="stylesheet" href="../../../font/inter/inter.min.css">
  <link href="../../../plugins/material-design-icons-iconfont/material-design-icons.min.css" rel="stylesheet">
  <!-- Plugins -->
  <!-- CSS plugins goes here -->
  <!-- Main Style -->
  <link rel="stylesheet" href="../../../plugins/simplebar/simplebar.min.css">
  <link rel="stylesheet" href="../../css/style.min.css" id="main-css">
  <link rel="stylesheet" href="../../css/sidebar-gray.min.css" id="theme-css"> <!-- options: blue,cyan,dark,gray,green,pink,purple,red,royal,ash,crimson,namn,frost -->
  <script>
    sessionid = ""
  </script>
  <script src="funciones.001.js"></script>
  <title>Mimity Admin</title>
</head>

<body class="login-page">
  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-7 col-xl-8 d-none d-lg-block">
        <img src="../../../dist/img/auth.svg" alt="" class="img-fluid w-100">
      </div>
      <div class="col-lg-5 col-xl-4 d-flex justify-content-center align-items-start">
        <div class="card mb-3">
          <div class="card-body p-4">
            <div class="card-body p-4">
              <h3>Inicio de sesion</h3>
              <p class="font-weight-light text-secondary">Bienbenico! Introdusca los datos.</p>
              <hr>            
              <div class="form-group">
                <div id=divUsuario
                  <?php
                  if ($Loged>0)
                  { ?>
                  hidden = true <?php
                  } ?>>
                  <label class="font-size-sm" for="InputEmail">Número de teléfono</label>
                  <input type="text" id="Username" name="Username" onkeydown=Cambia()
                  <?php
                  if ($Loged==1)
                  { ?>
                  disabled <?php
                  } ?>
                  class="form-control bg-gray-200 border-gray-200" placeholder="Celular de TICCMED (10 dígitos)" value='soporte' autocomplete="off">
                  <label class="font-size-sm" for="InputPassword">Contraseña</label>
                  <input type="password" id="Password" name="Password" onkeydown=Cambia()
                  <?php
                  if ($Loged==1)
                  { ?>
                  disabled <?php
                  } ?>
                  class="form-control bg-gray-200 border-gray-200" placeholder="Contraseña" value='123'>
                  <button id=BotonA class="btn btn-primary btn-block" onClick=Sesion_Inicia1() >Aceptar</button>
                </div>
                <div id=divCodigo <?php
                  if ($Loged==0)
                  { ?>
                  hidden = true <?php
                  } ?>>
                  <label class="font-size-sm" for="InputEmail"><b>Código de acceso</b></label>
                  <input type="text" id="CodigoW" name="CodigoW" onkeydown=Cambia() class="form-control bg-gray-200 border-gray-200" 
                    placeholder="Escriba 6 dígitos"
                    value='' autocomplete="off">
                  <label class="font-size-sm" for="InputPassword"></label>                  
                  <button class="btn btn-success btn-block" onClick=Sesion_Inicia2()>Aceptar</button>
                </div>
                <div class="divider-text">O</div>
                </div>
                <div class="list-with-gap">
                  <div id=divCodigo2 <?php
                    if ($Loged==0)
                    { ?>
                    hidden = true <?php
                    } ?>>
                    <button type="button" class="btn btn-success btn-xs" style="width:124px" onClick=Sesion_Inicia3()>Envia otro codigo</button>
                    <button type="button" class="btn btn-danger  btn-xs" style="width:124px" onClick=Sesion_Termina()>Regresar</button>
                  </div>
                </div>               
                <div id=divErrores style='height:70px'>
                </div>  
            </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
  <!-- Inicia sesion -->
  <script>
    function Barra100()
    {
      document.getElementById("Codigo").disabled = false
      document.getElementById("Codigo").placeholder = "1234 escriba cuatro dígitos"
    }
    function Cambia()
    {
      document.getElementById("divErrores").innerHTML = ""
    }
    function Sesion_Inicia1()
    {      
      try
      {   
        document.getElementById("divErrores").innerHTML = "<center><div class='spinner-border' role='status'><span class='sr-only'>Loading...</span></div></center>"
        Ruta = '' + document.location + ''
        Ruta = Mid(Ruta,1,RInStr(Ruta,"/"))
        Pagina_Requerida = XMLHttp()
        Pagina_Requerida.onreadystatechange = function()
        {
          Sesion_Inicia_Carga1(Pagina_Requerida,Ruta)
        }
        Pagina_Requerida.open("POST",Ruta + "/index_sesion_inicia.php",true)
        Pagina_Requerida.setRequestHeader("Accept", "*/*")  
        Pagina_Requerida.setRequestHeader("Content-Type","application/x-www-form-urlencoded") 
        Username = document.getElementById("Username")
        Username = Username.value
        Password = document.getElementById("Password")
        Password = Password.value
        Pagina_Requerida.send("Username=" + Username + "&Password=" + Password)
      }
      catch (e)
      {
        alert("Error al enviar la informacion codigo 1.1." + paso)
      }     
    }    
    function Sesion_Inicia_Carga1(Pagina_Requerida,Ruta)
    {
      var Cadena
      if(Pagina_Requerida.readyState == 4)
      { 
        if (Pagina_Requerida.status == "12030" || Pagina_Requerida.status == "12152")
        {
          //No se conecta el servicio
        }
        else if (Pagina_Requerida.status == 200 || window.location.hrefindexOf("http") == -1)
        {
          Cadena = Pagina_Requerida.responseText
          document.getElementById("divErrores").innerHTML = ""
          alert(Cadena)
          Datos1 = Cadena.split("|")
          if (Datos1[0] == "OK")
          {            
            document.getElementById("divUsuario").hidden = true
            document.getElementById("divCodigo").hidden = false
            document.getElementById("divCodigo2").hidden = false
          }
          else
          {
            document.getElementById("divErrores").innerHTML = Datos1[1]
          }
        }
        else
        {
         
        }
      }   
    }
    function Sesion_Inicia2()
    {      
      //document.getElementById("Barra").style.width = "100%"
      //setTimeout("Barra100()",1000);
      try
      {   
        Ruta = '' + document.location + ''
        Ruta = Mid(Ruta,1,RInStr(Ruta,"/"))
        Pagina_Requerida = XMLHttp()
        Pagina_Requerida.onreadystatechange = function()
        {
          Sesion_Inicia2_Carga(Pagina_Requerida,Ruta)
        }
        Pagina_Requerida.open("POST",Ruta + "/index_sesion_valida.php",true)
        Pagina_Requerida.setRequestHeader("Accept", "*/*")  
        Pagina_Requerida.setRequestHeader("Content-Type","application/x-www-form-urlencoded") 
        CodigoW = document.getElementById("CodigoW").value
        Pagina_Requerida.send("CodigoW=" + CodigoW)
      }
      catch (e)
      {
        //alert("Error al enviar la informacion codigo 1.1." + paso)
      }     
    }    
    function Sesion_Inicia2_Carga(Pagina_Requerida,Ruta)
    {
      var Cadena
      if(Pagina_Requerida.readyState == 4)
      { 
        if (Pagina_Requerida.status == "12030" || Pagina_Requerida.status == "12152")
        {
          //No se conecta el servicio
        }
        else if (Pagina_Requerida.status == 200 || window.location.hrefindexOf("http") == -1)
        {
          Cadena = Pagina_Requerida.responseText
          //alert(Cadena)
          Datos1 = Cadena.split("|")
          if (Datos1[0] == "OK")
          {
            //alert(document.location)
            location.replace(Ruta)
          }
          else
          {
            document.getElementById("divErrores").innerHTML = "<br>" + Datos1[1]
          }
          
        }
        else
        {
         
        }
      }   
    }
    function Sesion_Inicia3()
    {      
      try
      {
        document.getElementById("divErrores").innerHTML = "<br><center><div class='spinner-border' role='status'><span class='sr-only'>Loading...</span></div></center>"
        Ruta = '' + document.location + ''
        Ruta = Mid(Ruta,1,RInStr(Ruta,"/"))
        Pagina_Requerida = XMLHttp()
        Pagina_Requerida.onreadystatechange = function()
        {
          Sesion_Inicia3_Carga(Pagina_Requerida,Ruta)
        }
        Pagina_Requerida.open("POST",Ruta + "/index_sesion_codigo.php",true)
        Pagina_Requerida.setRequestHeader("Accept", "*/*")  
        Pagina_Requerida.setRequestHeader("Content-Type","application/x-www-form-urlencoded") 
        Pagina_Requerida.send("")
      }
      catch (e)
      {
        //alert("Error al enviar la informacion codigo 1.1." + paso)
      }     
    }    
    function Sesion_Inicia3_Carga(Pagina_Requerida,Ruta)
    {
      var Cadena
      if(Pagina_Requerida.readyState == 4)
      { 
        if (Pagina_Requerida.status == "12030" || Pagina_Requerida.status == "12152")
        {
          //No se conecta el servicio
        }
        else if (Pagina_Requerida.status == 200 || window.location.hrefindexOf("http") == -1)
        {
          Cadena = Pagina_Requerida.responseText
          alert(Cadena)
          Datos1 = Cadena.split("|")
          if (Datos1[0] == "OK")
          {
            //alert(document.location)
            document.getElementById("divErrores").innerHTML = ""
            location.replace(Ruta)
          }
          else
          {
            document.getElementById("divErrores").innerHTML = "<br>" + Datos1[1]
          }
          
        }
        else
        {
         
        }
      }   
    }
  </script>
<!-- /Inicia sesion -->
<?php
//Termina login
}
?>
<!-- Objeto hhtp -->
<script>   
    function Sesion_Termina()
    {      
      try
      {   
        Ruta = '' + document.location + ''
        Ruta = Mid(Ruta,1,RInStr(Ruta,"/"))
        Pagina_Requerida = XMLHttp()
        Pagina_Requerida.onreadystatechange = function()
        {
          Sesion_Termina_Carga(Pagina_Requerida,Ruta)
        }
        //alert(Ruta)
        Pagina_Requerida.open("POST",Ruta + "/index_sesion_termina.php",true)
        Pagina_Requerida.setRequestHeader("Accept", "*/*")  
        Pagina_Requerida.setRequestHeader("Content-Type","application/x-www-form-urlencoded") 
        Pagina_Requerida.send()
      }
      catch (e)
      {
        alert("Error al enviar la informacion codigo 1.1." + paso)
      }     
    }    
    function Sesion_Termina_Carga(Pagina_Requerida,Ruta)
    {
      var Cadena
      if(Pagina_Requerida.readyState == 4)
      { 
        if (Pagina_Requerida.status == "12030" || Pagina_Requerida.status == "12152")
        {
          //No se conecta el servicio
        }
        else if (Pagina_Requerida.status == 200 || window.location.hrefindexOf("http") == -1)
        {
          Cadena = Pagina_Requerida.responseText
          //alert(Cadena)
          location.replace(Ruta+"/index.php")
        }
        else
        {
         
        }
      }   
    }
    function XMLHttp()
    {
      var Object;
      if (typeof XMLHttpRequest == "undefined" )
      {
      if(navigator.userAgent.indexOf("MSIE 5") >= 0)
      { 
        Object= new ActiveXObject("Microsoft.XMLHTTP");}
      else
      { 
        Object=new ActiveXObject("Msxml2.XMLHTTP");}
      }
      else
      { 
        Object=new XMLHttpRequest();
      }
      return Object;
    }      
    function Right(s, n){
      // Devuelve los n últimos caracteres de la cadena
      var t=s.length;
      if(n>t)
        n=t;
        
      return s.substring(t-n, t);
    }
    function RInStr(haystack, needle) 
    {
      return haystack.lastIndexOf(needle);
    }
    function Mid(s, n, c){
      // Devuelve una cadena desde la posición n, con c caracteres
      // Si c = 0 devolver toda la cadena desde la posición n
      
      var numargs=Mid.arguments.length;
      
      // Si sólo se pasan los dos primeros argumentos
      if(numargs<3)
        c=s.length-n+1;
        
      if(c<1)
        c=s.length-n+1;
      if(n+c >s.length)
        c=s.length-n+1;
      if(n>s.length)
        return "";
        
      return s.substring(n-1,n+c-1);
    }
    //Objeto Http fin
  </script>
<!-- /objeto hhtp -->