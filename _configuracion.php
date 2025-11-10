      <style>
        .main-body {
          padding: 0;
        }
      </style>
      <script>
        Menu = [[1,'Datos'],[2,'Redes ,VPN'],[3,'Terminales'],[4,'Usuarios'],[5,'Niveles']]
        Ultimo = "01"
      </script>

      <div class="inner-wrapper">

        <!-- Filemanager sidebar -->
        <div class="inner-sidebar">

          <!-- Filemanager sidebar header -->
          <div class="inner-sidebar-header">
            
          </div>
          <!-- /Filemanager sidebar header -->

          <!-- Filemanager sidebar body -->
          <div class="inner-sidebar-body p-0">
            <div class="p-3 h-100" data-simplebar>
              <label class="small text-secondary"><h6>Sistema</h6></label>
              <nav class="nav nav-pills nav-gap-y-1 flex-column">
                <a id=SubMenu_01 href="javascript:ClickSubMenu('01','sis_datos_sistema.php')" class="nav-link nav-link-faded has-icon active"><i class="material-icons mr-2">folder_open</i>Datos del Cliente</a>
                <a id=SubMenu_03 href="javascript:ClickSubMenu('03','sis_unidades.php')" class="nav-link nav-link-faded has-icon"><i class="material-icons mr-2">desktop_mac</i>Unidades</a>
                <a id=SubMenu_04 href="javascript:ClickSubMenu('04','sis_terminales.php')" class="nav-link nav-link-faded has-icon"><i class="material-icons mr-2">desktop_mac</i>Terminales</a>
                <a id=SubMenu_05 href="javascript:ClickSubMenu('05','sis_usuarios.php')" class="nav-link nav-link-faded has-icon"><i class="material-icons mr-2">star_border</i>Usuarios</a>
                <a id=SubMenu_06 href="javascript:ClickSubMenu('06','sis_niveles.php')" class="nav-link nav-link-faded has-icon"><i class="material-icons mr-2">delete_outline</i>Niveles de Acceso</a>
              </nav>
              <label class="small text-secondary mt-3"><h6>Catálogos del almacen</h6></label>
              <nav class="nav nav-pills nav-gap-y-1 flex-column">
                <a id=SubMenu_07 href="javascript:ClickSubMenu('07','cat_alm_insumos.php')"      class="nav-link nav-link-faded has-icon"><i class="fa-fw far mr-2 fa-sticky-note"></i>Insumos</a>
                <a id=SubMenu_08 href="javascript:ClickSubMenu('08','cat_alm_tipos.php')"        class="nav-link nav-link-faded has-icon"><i class="fa-fw far mr-2 fa-sticky-note"></i>Tipos de material</a>
                <a id=SubMenu_09 href="javascript:ClickSubMenu('09','cat_alm_laboratorios.php')" class="nav-link nav-link-faded has-icon"><i class="fa-fw far mr-2 fa-sticky-note"></i>Laboratorios</a>
                <a id=SubMenu_10 href="javascript:ClickSubMenu('10','cat_alm_areas.php')"        class="nav-link nav-link-faded has-icon"><i class="fa-fw far mr-2 fa-sticky-note"></i>Areas</a>
                <a id=SubMenu_11 href="javascript:ClickSubMenu('11','cat_alm_equipos.php')"      class="nav-link nav-link-faded has-icon"><i class="fa-fw far mr-2 fa-sticky-note"></i>Equipos</a>
                <a id=SubMenu_12 href="javascript:ClickSubMenu('12','cat_alm_presentacion.php')" class="nav-link nav-link-faded has-icon"><i class="fa-fw far mr-2 fa-sticky-note"></i>Presentacion</a>
                <a id=SubMenu_13 href="javascript:ClickSubMenu('13','cat_alm_fabricantes.php')"  class="nav-link nav-link-faded has-icon"><i class="fa-fw far mr-2 fa-sticky-note"></i>Fabricantes</a>
              </nav>
            </div>
          </div>
<script>
  Ruta = '' + document.location + ''
  Ruta = Mid(Ruta,1,RInStr(Ruta,"/"))
  function Datos_Remisiones_Modifica()
  {
    try
    {   
      Pagina_Requerida = XMLHttp()
      Pagina_Requerida.onreadystatechange = function()
      {
        Datos_Unidades_Modifica_Carga(Pagina_Requerida)
      }
      Pagina_Requerida.open("POST",Ruta + "/configuracion/sis_unidades_modifica.php",true)
      Pagina_Requerida.setRequestHeader("Accept", "*/*")  
      Pagina_Requerida.setRequestHeader("Content-Type","application/x-www-form-urlencoded") 
      Pagina_Requerida.send("")
    }
    catch (e)
    {
      alert("Error al enviar la informacion codigo 1.1." + paso)
    }     
  }
  function Datos_Unidades_Modifica()
  {
    try
    {   
      alert('1')
      Pagina_Requerida = XMLHttp()
      Pagina_Requerida.onreadystatechange = function()
      {
        Datos_Unidades_Modifica_Carga(Pagina_Requerida)
      }
      Pagina_Requerida.open("POST",Ruta + "/configuracion/sis_unidades_modifica.php",true)
      Pagina_Requerida.setRequestHeader("Accept", "*/*")  
      Pagina_Requerida.setRequestHeader("Content-Type","application/x-www-form-urlencoded") 
      Pagina_Requerida.send("")
    }
    catch (e)
    {
      alert("Error al enviar la informacion codigo 1.1." + paso)
    }     
  }
  function Datos_Unidades_Modifica_Carga()
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
        document.getElementById("Pagina").innerHTML = Cadena
      }
      else
      {
      
      }
    }   

  }
  function Datos_Sistema_Modifica()
  {
    //alert(document.getElementById("Nombre").value)
    document.getElementById("Nombre").readOnly      = false
    document.getElementById("RazonSocial").readOnly = false
    document.getElementById("email").readOnly       = false
    document.getElementById("Domicilio").readOnly   = false
    document.getElementById("btnDatosSistemaModifica").disabled = true
    document.getElementById("btnDatosSistemaGuardar").disabled = false
  }
  function Datos_Sistema_Guardar()
  {
    //alert(document.getElementById("Nombre").value)
    Nombre      = document.getElementById("Nombre").value
    RazonSocial = document.getElementById("RazonSocial").value
    email       = document.getElementById("email").value
    Domicilio   = document.getElementById("Domicilio").value
    document.getElementById("btnDatosSistemaGuardar").disabled = true
    //document.getElementById("btnDatosSistemaModifica").disabled = true
    document.getElementById("Nombre").readOnly      = true
    document.getElementById("RazonSocial").readOnly = true
    document.getElementById("email").readOnly       = true
    document.getElementById("Domicilio").readOnly   = true
  }
</script>
          <script>
            function ClickSubMenu(opc,archivo)
            {
              document.getElementById("SubMenu_" + Ultimo).className = "nav-link nav-link-faded has-icon"
              document.getElementById("SubMenu_" + opc   ).className = "nav-link nav-link-faded has-icon active"
              Ultimo = opc
              Catalogo(archivo)
            }
            function Catalogo(archivo)
            {      
              try
              {   
                Pagina_Requerida = XMLHttp()
                Pagina_Requerida.onreadystatechange = function()
                {
                  Catalogo_Carga(Pagina_Requerida,Ruta)
                }
                Pagina_Requerida.open("POST",Ruta + "/configuracion/" + archivo + "",true)
                Pagina_Requerida.setRequestHeader("Accept", "*/*")  
                Pagina_Requerida.setRequestHeader("Content-Type","application/x-www-form-urlencoded") 
                Pagina_Requerida.send("")
              }
              catch (e)
              {
                alert("Error al enviar la informacion codigo 1.1." + paso)
              }     
            }    
            function Catalogo_Carga(Pagina_Requerida,Ruta)
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
                  document.getElementById("Pagina").innerHTML = Cadena
                  cat_insumos2()
                }
                else
                {
                
                }
              }   
            }
          </script>
          <!-- /Filemanager sidebar body -->
        </div>
        <!-- /Filemanager sidebar -->

        <!-- Filemanager main -->
        <div class="inner-main">

          <!-- Filemanager main header -->
          <div class="inner-main-header">
            <a class="nav-link nav-icon rounded-circle nav-link-faded mr-3 d-md-none" href="#" data-toggle="inner-sidebar"><i class="material-icons">arrow_forward_ios</i></a>
            <h5 class="mb-0">Configuración</h5>
          </div>
          <!-- /Filemanager main header -->

          <!-- Filemanager main body -->
          <div class="inner-main-body" id=Pagina>
            Pagina
          </div>
          <!-- /Filemanager main body -->

        </div>
        <!-- /Filemanager main -->

      </div>

      <script>
        var plugins = [
          '../../../plugins/datatables/dataTables.bootstrap4.min.css',
          '../../../plugins/datatables/responsive.bootstrap4.min.css',
          '../../../plugins/datatables/jquery.dataTables.bootstrap5r20.responsive.min.js',
        ]
        App.loadPlugins(null, null).then(() => {
        }).then(() => App.stopLoading())
        function cat_insumos2()
        {
          App.loadPlugins(plugins, null).then(() => {
            App.checkAll()
            // Run datatable
            var table = $('#example').DataTable({
              drawCallback: function() {
                $('.dataTables_paginate > .pagination').addClass('pagination-sm') // make pagination small
              }
            })
            // Apply column filter
            $('#example .dt-column-filter th').each(function(i) {
              $('input', this).on('keyup change', function() {
                if (table.column(i).search() !== this.value) {
                  table
                    .column(i)
                    .search(this.value)
                    .draw()
                }
              })
            })
            // Toggle Column filter function
            var responsiveFilter = function(table, index, val) {
              var th = $(table).find('.dt-column-filter th').eq(index)
              val === true ? th.removeClass('d-none') : th.addClass('d-none')
            }
            // Run Toggle Column filter at first
            $.each(table.columns().responsiveHidden(), function(index, val) {
              responsiveFilter('#example', index, val)
            })
            // Run Toggle Column filter on responsive-resize event
            table.on('responsive-resize', function(e, datatable, columns) {
              $.each(columns, function(index, val) {
                responsiveFilter('#example', index, val)
              })
            })

          }).then(() => App.stopLoading())
        }
      </script>