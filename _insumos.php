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
              <label class="small text-secondary"><h6>Insemos y Reactivos</h6></label>
              <nav class="nav nav-pills nav-gap-y-1 flex-column">
                <a id=SubMenu_01 href="javascript:ClickSubMenu('01','entradas.php')" class="nav-link nav-link-faded has-icon active"><i class="material-icons mr-2">folder_open</i>Entradas</a>
                <a id=SubMenu_03 href="javascript:ClickSubMenu('02','salidas.php')" class="nav-link nav-link-faded has-icon"><i class="material-icons mr-2">desktop_mac</i>Salidas</a>
              </nav>
            </div>
          </div>
<script>
  Ruta = '' + document.location + ''
  Ruta = Mid(Ruta,1,RInStr(Ruta,"/"))
  function Datos_Unidades_Modifica()
  {
    try
    {   
      Pagina_Requerida = XMLHttp()
      Pagina_Requerida.onreadystatechange = function()
      {
        Datos_Unidades_Modifica_Carga(Pagina_Requerida)
      }
      Pagina_Requerida.open("POST",Ruta + "/_insumos/sis_unidades_modifica.php",true)
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
                Pagina_Requerida.open("POST",Ruta + "/_insumos/" + archivo + "",true)
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
            <h5 class="mb-0">Almacen</h5>
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