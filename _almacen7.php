      <style>
        padding: 0;
        .main-body {
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
          <!-- /Filemanager sidebar header -->

          <!-- Filemanager sidebar body -->
          <div class="inner-sidebar-body p-0">
            <div class="p-3 h-100" data-simplebar>
              <label class="small text-secondary"><h6>Almacen</h6></label>
              <nav class="nav nav-pills nav-gap-y-1 flex-column">
                <a id=SubMenu_03 href="javascript:ClickSubMenu('03','remisiones')" class="nav-link nav-link-faded has-icon"><i class="fa-fw far mr-2 fa-sticky-note"></i>Remisiones</a>
                <a id=SubMenu_02 href="javascript:ClickSubMenu('02','entradas')"   class="nav-link nav-link-faded has-icon"><i class="fa-fw far mr-2 fa-sticky-note"></i>Entradas</a>
                <a id=SubMenu_04 href="javascript:ClickSubMenu('04','salidas')"  class="nav-link nav-link-faded has-icon"><i class="fa-fw far mr-2 fa-sticky-note"></i>Salidas</a>
                <a id=SubMenu_01 href="javascript:ClickSubMenu('01','insumos')"    class="nav-link nav-link-faded has-icon"><i class="fa-fw far mr-2 fa-sticky-note"></i>Insumos y Reactivos</a>
              </nav>
            </div>
          </div>
<script>
  Ruta = '' + document.location + ''
  Ruta = Mid(Ruta,1,RInStr(Ruta,"/"))
  tCatalogo = ''
</script>
          <script>
            function ClickSubMenu(opc,archivo)
            {
              document.getElementById("SubMenu_" + Ultimo).className = "nav-link nav-link-faded has-icon"
              document.getElementById("SubMenu_" + opc   ).className = "nav-link nav-link-faded has-icon active"
              Ultimo = opc
              tCatalogo = archivo
              Catalogo(archivo + '.php')
            }
            function Catalogo2(archivo)
            {      
              try
              {   
                alert('123')
                alert(archivo)
                Pagina_Requerida = XMLHttp()
                Pagina_Requerida.onreadystatechange = function()
                {
                  Catalogo2_Carga(Pagina_Requerida,Ruta)
                }
                //alert(Ruta + "/almacen7/" + archivo + "")
                Pagina_Requerida.open("POST",Ruta + "/almacen7/" + archivo + "",true)
                Pagina_Requerida.setRequestHeader("Accept", "*/*")  
                Pagina_Requerida.setRequestHeader("Content-Type","application/x-www-form-urlencoded") 
                Pagina_Requerida.send("")
              }
              catch (e)
              {
                alert("Error al enviar la informacion codigo 1.1." + paso)
              }     
            }    
            function Catalogo2_Carga(Pagina_Requerida,Ruta)
            {
              var Cadena
              if(Pagina_Requerida.readyState == 4)
              { 
                if (Pagina_Requerida.status == "12030" || Pagina_Requerida.status == "12152")
                {
                  //No se conecta el servicio
                }
                else if (Pagina_Requerida.status == 200 || window.location.href.indexOf("http") == -1)
                {
                  Cadena = Pagina_Requerida.responseText
                  document.getElementById("Pagina").innerHTML = Cadena                  
                  CargaDates()
                }
                else
                {
                
                }
              }   
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
                Pagina_Requerida.open("POST",Ruta + "/almacen7/" + archivo + "",true)
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
                else if (Pagina_Requerida.status == 200 || window.location.href.indexOf("http") == -1)
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
            function Catalogo_Consulta(archivo,NoReg)
            {      
              try
              {   
                Pagina_Requerida = XMLHttp()
                Pagina_Requerida.onreadystatechange = function()
                {
                  Catalogo_Consulta_Carga(Pagina_Requerida,Ruta)
                }
                Pagina_Requerida.open("POST",Ruta + "/almacen7/" + archivo + "",true)
                Pagina_Requerida.setRequestHeader("Accept", "*/*")  
                Pagina_Requerida.setRequestHeader("Content-Type","application/x-www-form-urlencoded") 
                Pagina_Requerida.send("NoReg="+NoReg)
              }
              catch (e)
              {
                alert("Error al enviar la informacion codigo 1.1." + paso)
              }     
            }    
            function Catalogo_Consulta_Carga(Pagina_Requerida,Ruta)
            {
              var Cadena
              if(Pagina_Requerida.readyState == 4)
              { 
                if (Pagina_Requerida.status == "12030" || Pagina_Requerida.status == "12152")
                {
                  //No se conecta el servicio
                }
                else if (Pagina_Requerida.status == 200 || window.location.href.indexOf("http") == -1)
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
          <div class="inner-main-header" style='height:60px'>
            <a class="nav-link nav-icon rounded-circle nav-link-faded mr-3 d-md-none" href="#" data-toggle="inner-sidebar"><i class="material-icons">arrow_forward_ios</i></a>
            <h5 class="mb-0"></h5>
          </div>
          <!-- /Filemanager main header -->

          <!-- Filemanager main body -->
          <div class="inner-main-body" id=Pagina>
            <?php 
              if (isset($_POST["customFile"]))
              {
                echo "hola";
              }
              //include("almacen7/entradas_registro.php");
            ?>
          </div>
          <!-- /Filemanager main body -->

        </div>
        <!-- /Filemanager main -->

      </div>
      <!-- Modal para subir artchivos -->
        <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h6 class="modal-title" id="basicModalLabel">Modal title</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
      <!-- Fin de Modal para subir archivos -->
      <script>
        var plugins = [
          '../../../plugins/flatpickr/flatpickr.min.css',
          '../../../plugins/flatpickr/plugins/monthSelect/style.css',
          '../../../plugins/clockpicker/bootstrap-clockpicker.min.css',
          '../../../plugins/flatpickr/flatpickr.min.js',
          '../../../plugins/flatpickr/plugins/monthSelect/index.js',
          '../../../plugins/clockpicker/bootstrap-clockpicker.min.js',
          '../../../plugins/datatables/dataTables.bootstrap4.min.css',
          '../../../plugins/datatables/responsive.bootstrap4.min.css',
          '../../../plugins/datatables/jquery.dataTables.bootstrap5r20c.responsive.min.js',
          '../../../plugins/bootbox/bootbox.min.js',
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



        function ClickPaperclip()
        {
          {
            Cadena ="<div class='row'>"
            Cadena = Cadena + "<div class='col-sm-12'>"
            Cadena = Cadena + "<div class='list-with-gap'>"
            Cadena = Cadena + "<div class='custom-file'>"
            Cadena = Cadena + "<form method='POST' enctype='multipart/form-data' action='index.php' id=form1 name=form1>"
            Cadena = Cadena + "<input type='hidden' name='MAX_FILE_SIZE' value='100000'/>"
              Cadena = Cadena + "<input type='file' class='custom-file-input' id='file1'>"
              Cadena = Cadena + "<label class='custom-file-label' for='customFile'>lija un archivo</label>"
              Cadena = Cadena + "<input type='submit' value='Aceptar'>"
            Cadena = Cadena + "</div>"
            Cadena = Cadena + "</div>"
            Cadena = Cadena + "</div>"
            Cadena = Cadena + "</div>"
            bootbox.dialog({
              title: 'Prueba de sistema',
              message: Cadena,
              buttons: {
                cancel: {
                  label: "Cancelar",
                  className: 'btn-danger',
                  callback: () => {
                    //alert('Cancel clicked')
                  }
                }
              }
            })
          }          
        }
        function ClickRecarga()
        {
          Catalogo(tCatalogo + '.php')
        }
        function ClickNuevo()
        {
          if(tCatalogo=="insumos")
          {
            alert('Función no disponoble')
          }
          else
          {
            //alert(tCatalogo + '_registro.php')
            Catalogo2(tCatalogo + '_registro.php')
          }          
        }
      </script>
      <script>
        //Script para Exitencias
        function Insumos_Consulta(NoReg)
        {
          Catalogo_Consulta(tCatalogo + '_consulta.php',NoReg)
        }
      </script>
      <script>
        //Secript para Entradas
        function Entradas_Consulta(NoReg)
        {
          Catalogo_Consulta(tCatalogo + '_consulta.php',NoReg)
        }
      </script>
      <script>
        //Secript para Traspasos
        function Traspasos_Consulta(NoReg)
        {
          Catalogo_Consulta(tCatalogo + '_consulta.php',NoReg)
        }
      </script>
      <script>
        //Script para Salidas
      </script>
      <script>
        //Secript para catalogo de Tipos_Insumos
        function Cat_Dev_Tipo_Insumo_Consulta(NoReg)
        {
          Catalogo_Consulta(tCatalogo + '_consulta.php',NoReg)
        }
      </script>
      <script>
        //Secript para catalogo de presentacion
        function Cat_Dev_Presentacion_Consulta(NoReg)
        {
          Catalogo_Consulta(tCatalogo + '_consulta.php',NoReg)
        }
      </script>
      <script>
        //Script para catalogo de Ubicaciones
        function Cat_Dev_Ubicaciones_Consulta(NoReg)
        {
          Catalogo_Consulta(tCatalogo + '_consulta.php',NoReg)
        }
      </script>
      <script>
        //Secript para catalogo de Insumos
        function Cat_Dev_Insumos_Consulta(NoReg)
        {
          Catalogo_Consulta(tCatalogo + '_consulta.php',NoReg)
        }
        function Cat_Dev_Insumos_Modifica()
        {
          
          document.getElementById("Status").disabled      = false
          FocoPierde(document.getElementById("Status"))
          document.getElementById("Nombre").disabled      = false
          FocoPierde(document.getElementById("Nombre"))

          document.getElementById("IdTipo").disabled      = false
          FocoPierde(document.getElementById("IdTipo"))
          document.getElementById("IdEquipo").disabled      = false
          FocoPierde(document.getElementById("IdEquipo"))
          document.getElementById("IdPresentacion").disabled      = false
          FocoPierde(document.getElementById("IdPresentacion"))

          document.getElementById("Rendimiento").disabled      = false
          FocoPierde(document.getElementById("Rendimiento"))
          document.getElementById("Minimo").disabled      = false
          FocoPierde(document.getElementById("Minimo"))
          document.getElementById("Maximo").disabled      = false
          FocoPierde(document.getElementById("Maximo"))
          document.getElementById("Consumo").disabled      = false
          FocoPierde(document.getElementById("Consumo"))

          document.getElementById("CaducaSN").disabled      = false
          FocoPierde(document.getElementById("divCaducaSN"))
          FocoPierde(document.getElementById("tdCaducaSN"))
          FocoPierde(document.getElementById("lblCaducaSN"))
          document.getElementById("IdUbicacion").disabled      = false
          FocoPierde(document.getElementById("IdUbicacion"))

          document.getElementById("Obs").disabled         = false
          FocoPierde(document.getElementById("Obs"))
          document.getElementById("btnDatosModifica").disabled = true
          document.getElementById("btnDatosGuardar").disabled  = false          
        }
        function Cat_Dev_Insumos_Guardar(NoReg)
        {
          document.getElementById("btnDatosGuardar").disabled = true
          document.getElementById("Clave").disabled        = true
          FocoPierde2(document.getElementById("Clave"))
          document.getElementById("Status").disabled       = true
          FocoPierde2(document.getElementById("Status"))
          document.getElementById("Nombre").disabled       = true
          FocoPierde2(document.getElementById("Nombre"))

          document.getElementById("IdTipo").disabled = true
          FocoPierde2(document.getElementById("IdTipo"))
          document.getElementById("IdEquipo").disabled = true
          FocoPierde2(document.getElementById("IdEquipo"))
          document.getElementById("IdPresentacion").disabled = true
          FocoPierde2(document.getElementById("IdPresentacion"))

          document.getElementById("Rendimiento").disabled      = true
          FocoPierde2(document.getElementById("Rendimiento"))
          document.getElementById("Minimo").disabled      = true
          FocoPierde2(document.getElementById("Minimo"))
          document.getElementById("Maximo").disabled      = true
          FocoPierde2(document.getElementById("Maximo"))
          document.getElementById("Consumo").disabled      = true
          FocoPierde2(document.getElementById("Consumo"))

          document.getElementById("CaducaSN").disabled      = true
          FocoPierde2(document.getElementById("divCaducaSN"))
          FocoPierde2(document.getElementById("tdCaducaSN"))
          FocoPierde2(document.getElementById("lblCaducaSN"))
          document.getElementById("IdUbicacion").disabled      = true
          FocoPierde2(document.getElementById("IdUbicacion"))

          document.getElementById("Obs").disabled   = true
          FocoPierde2(document.getElementById("Obs"))
          Cat_Dev_Insumos_Guardar2(NoReg)
        }
        function Cat_Dev_Insumos_Guardar2(NoReg)
        {
          try
          {  
            CadenaEnv = ""
            Clave  = document.getElementById("Clave").value
            Status = document.getElementById("Status").value
            Nombre = document.getElementById("Nombre").value
            IdTipo = document.getElementById("IdTipo").value
            IdEquipo = document.getElementById("IdEquipo").value
            IdPresentacion = document.getElementById("IdPresentacion").value

            Rendimiento = document.getElementById("Rendimiento").value
            Minimo      = document.getElementById("Minimo").value
            Maximo      = document.getElementById("Maximo").value
            Consumo     = document.getElementById("Consumo").value
            if (document.getElementById("CaducaSN").checked)
            {
              CaducaSN    = '1'
            }
            else
            {
              CaducaSN    = '0'
            }
            IdUbicacion   = document.getElementById("IdUbicacion").value
            Obs    = document.getElementById("Obs").value
            Pagina_Requerida = XMLHttp()
            Pagina_Requerida.onreadystatechange = function()
            {
              Cat_Dev_Insumos_Guardar2_Carga(Pagina_Requerida)
            }
            Pagina_Requerida.open("POST",Ruta + "/configuracion/cat_dev_insumos_guarda_ajax.php",true)
            Pagina_Requerida.setRequestHeader("Accept", "*/*")  
            Pagina_Requerida.setRequestHeader("Content-Type","application/x-www-form-urlencoded") 
            if (NoReg==0)
            {
              CadenaEnv = "Clave="+Clave
            }
            else
            {
              CadenaEnv = "NoReg="+NoReg
            }
            CadenaEnv = CadenaEnv + "&Status="+Status+"&Nombre="+Nombre+"&IdEquipo="+IdEquipo+"&IdTipo="+IdTipo+"&IdPresentacion=" + IdPresentacion + "&Obs="+Obs
            CadenaEnv = CadenaEnv + "&Rendimiento="+Rendimiento+"&Minimo="+Minimo+"&Maximo="+Maximo+"&Consumo="+Consumo+"&CaducaSN="+CaducaSN+"&IdUbicacion="+IdUbicacion
            Pagina_Requerida.send(CadenaEnv)

          }
          catch (e)
          {
            alert("Error al enviar la informacion codigo 1.1.")
          }     
        }
        function Cat_Dev_Insumos_Guardar2_Carga(Pagina_Requerida)
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
              document.getElementById("btnDatosModifica").disabled = false
            }
            else
            {
            
            }
          }   
        }
        //Funcioness nuevas para la getion de remisiones
        function Registrar_Entrada(NumIns)
        {
          document.getElementById("btnDatosSistemaGuardar").disabled = true
          for(i=1;i<=NumIns;i++)
          {
            Cantidad = document.getElementById("Cantidad_"+i).value
            Recibido = document.getElementById("Recibido_"+i)
            Recibido.disabled = false
            Recibido.value = Cantidad
          }
          document.getElementById("btnDatosSistemaRegistra").hidden = false
        }
        function Registrar_Guardar(NumIns,NoReg)
        {
          document.getElementById("btnDatosSistemaRegistra").hidden = true
          for(i=1;i<=NumIns;i++)
          {
            Recibido = document.getElementById("Recibido_"+i)
            Cantidad = Recibido.value
            NoReg1 = document.getElementById("NoReg_"+i)
            NoReg2 = NoReg1.value
            Registrar_Entrada2(NoReg,NoReg2,Cantidad)
            Recibido.disabled = true            
          }
        }
        function Registrar_Entrada2(NoReg,NoReg2,Cantidad)
        {
          try
          {
            Pagina_Requerida = XMLHttp()
            Pagina_Requerida.open("POST",Ruta + "/almacen7/remisiones_entrada.php",false)
            Pagina_Requerida.setRequestHeader("Accept", "*/*")  
            Pagina_Requerida.setRequestHeader("Content-Type","application/x-www-form-urlencoded") 
            b = 0
            alert("NoReg="+NoReg2+"&Cantidad="+Cantidad) 
            Pagina_Requerida.send("NoRegRem="+NoReg+"&NoReg="+NoReg2+"&Cantidad="+Cantidad)            
            Cadena = Pagina_Requerida.responseText
            alert(Cadena)
          }
          catch (e)
          {
            alert("Error al enviar la informacion codigo 1." + b)
          }
        }
        function Cat_Dev_Remisiones_Guardar(NoReg)
        {
          //document.getElementById("btnDatosGuardar").disabled = true
          document.getElementById("Remision").disabled        = true
          FocoPierde2(document.getElementById("Remision"))

          document.getElementById("IdProveedor").disabled     = true
          FocoPierde2(document.getElementById("IdProveedor"))
          document.getElementById("Fecha").disabled           = true
          FocoPierde2(document.getElementById("Fecha"))

          document.getElementById("Obs").disabled             = true
          FocoPierde2(document.getElementById("Obs"))
          Cat_Dev_Remisiones_Guardar2(NoReg)
        }
        function Cat_Dev_Remisiones_Guardar2(NoReg)
        {
          try
          {  
            b=0
            CadenaEnv = ""
            Remision  = document.getElementById("Remision").value
            IdProveedor = document.getElementById("IdProveedor").value
            Fecha  = document.getElementById("Fecha").value
            Obs    = document.getElementById("Obs").value
            b=1
            Pagina_Requerida = XMLHttp()
            b=2
            Pagina_Requerida.onreadystatechange = function()
            {
              Cat_Dev_Remisiones_Guardar2_Carga(Pagina_Requerida)
            }
            b=3
            Pagina_Requerida.open("POST",Ruta + "/_almacen7/remisiones_guarda.php",true)
            Pagina_Requerida.setRequestHeader("Accept", "*/*")  
            Pagina_Requerida.setRequestHeader("Content-Type","application/x-www-form-urlencoded") 
            CadenaEnv = ""
            CadenaEnv = CadenaEnv + "Remision="+Remision+"&IdProveedor="+IdProveedor+"&Fecha="+Fecha+"&Obs="+Obs
            Pagina_Requerida.send(CadenaEnv)
            alert('fin')
          }
          catch (e)
          {
            alert("Error al enviar la informacion codigo 1." + b)
          }     
        }
        function Cat_Dev_Remisiones_Guardar2_Carga(Pagina_Requerida)
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
              alert('Cadena')
              Cadena = Pagina_Requerida.responseText
              //document.getElementById("btnDatosModifica").disabled = false
            }
            else
            {
            
            }
          }   
        }

        //Variables para el catalogo de insumos
        xInsumos   = ""
        xClaves    = ""
        xNombres   = ""
        xLotes     = ""
        xFechas    = ""
        xCantidad  = ""
        function MuestraCatalogo2()
        {
          alert('Cargando 1')
          if (isCargado)
          {
            try
            {
              pagina_requerida = XMLHttp()
              pagina_requerida.onreadystatechange = function()
              {
                MuestraCatalogo2_Carga(pagina_requerida)
              }    
              Ruta = '' + document.location + ''
              pagina_requerida.open("POST",Mid(Ruta,1,RInStr(Ruta,"/")) + "/estudios_ajax.asp",true)
              pagina_requerida.setRequestHeader('Accept', '*/*')	
              pagina_requerida.setRequestHeader("Content-Type","application/x-www-form-urlencoded")
              //alert("ClvCia=hsb&isMovil="+isMovil)
              pagina_requerida.send("ClvCia=csb&isMovil="+isMovil)
            }
            catch (e)
            {
              alert('Error en expedientes carga Paso=')
            }
          }
          else
          {

          }
        }
        function MuestraCatalogo2_Carga(pagina_requerida)
        {
          var Cadena
          if(pagina_requerida.readyState == 4)
          { 
            if (pagina_requerida.status == "12030" || pagina_requerida.status == "12152")
            {
              //No se conecta el servicio
            }
            else if (pagina_requerida.status == 200 || window.location.href.indexOf("http") == -1)
            {
              Cadena = pagina_requerida.responseText
              //alert(Cadena)
                Cadena0 = ""
                Cadena0 = Cadena0 + "<table id='tabCatEstudios' class='table table-striped table-bordered table-sm dt-responsive nowrap w-100'>"
                  Cadena0 = Cadena0 + "<thead class='thead-primary'>"
                    Cadena0 = Cadena0 + "<tr class='column-filter'>"
                      Cadena0 = Cadena0 + "<th scope='col'><a href='javascript:void(0)' class='sorting asc'>Clave</a></th>"
                      Cadena0 = Cadena0 + "<th scope='col'><a href='javascript:void(0)' class='sorting'>Estudio</a></th>"
                    Cadena0 = Cadena0 + "</tr>"
                  Cadena0 = Cadena0 + "</thead>"
                  Cadena0 = Cadena0 + "<tbody id='Lista3'>"
                  Datos1 = Cadena.split("|")
                    for (i=2;i<Datos1.length;i++)
                    {
                      Datos2 = Datos1[i].split("^")
                      Cadena0 = Cadena0 + "<tr id='Clave_Est_" + Datos2[0] + "' onClick=ClaveEstudio2('" + Datos2[0] + "') >"				
                        Cadena0 = Cadena0 + "<td class='font-number'><b>" + Datos2[0] + "</b></td>"
                        Cadena0 = Cadena0 + "<td class='font-number'><b>" + Datos2[1] + "</b></td>"
                      Cadena0 = Cadena0 + "</tr>"
                    }
                  Cadena0 = Cadena0 + "</tbody>"
                Cadena0 = Cadena0 + "</table>"
              strCatEstudios = Cadena0
              document.getElementById("divCatEstudios").innerHTML = Cadena0
              CatalogoOrdena3()
            }
            else
            {
              //alert('Error')
            }
          }
        }
        function RemisionConsulta(NoReg)
        {
          try
          {   
            Pagina_Requerida = XMLHttp()
            Pagina_Requerida.onreadystatechange = function()
            {
              RemisionConsulta_Carga(Pagina_Requerida)
            }
            Pagina_Requerida.open("POST",Ruta + "/almacen7/remisiones_consulta.php",true)
            Pagina_Requerida.setRequestHeader("Accept", "*/*")  
            Pagina_Requerida.setRequestHeader("Content-Type","application/x-www-form-urlencoded") 
            Pagina_Requerida.send("NoReg="+NoReg)
          }
          catch (e)
          {
            alert("Error al enviar la informacion codigo 1.1." + paso)
          }     
        }
        function RemisionConsulta_Carga()
        {
          var Cadena
          if(Pagina_Requerida.readyState == 4)
          { 
            if (Pagina_Requerida.status == "12030" || Pagina_Requerida.status == "12152")
            {
              //No se conecta el servicio
            }
            else if (Pagina_Requerida.status == 200 || window.location.href.indexOf("http") == -1)
            {
              Cadena = Pagina_Requerida.responseText
              document.getElementById("Pagina").innerHTML = Cadena
            }
            else
            {
            
            }
          }   

        }

        function RemisionGuarda()
        {
          /*
          alert(xClaves)
          alert(xLotes)
          alert(xFechas)
          alert(xCantidad)
          */
          try
          { 
            //alert(Clave)
            pagina_requerida = XMLHttp()
            pagina_requerida.onreadystatechange = function()
            {
              RemisionGuarda_Carga(pagina_requerida)
            }
            Valores=""
            Ruta = '' + document.location + ''
            //alert(Mid(Ruta,1,RInStr(Ruta,"/")) + "/almacen7/insumos_busca_ajax.php")
            pagina_requerida.open("POST",Mid(Ruta,1,RInStr(Ruta,"/")) + "/almacen7/entradas_guarda.php",true)
            pagina_requerida.setRequestHeader("Accept", "*/*")	
            pagina_requerida.setRequestHeader("Content-Type","application/x-www-form-urlencoded")
            alert("Claves="+xClaves+"&Lotes="+xLotes+"&Fechas="+xFechas+"&Cantidad="+xCantidad)
            pagina_requerida.send("Claves="+xClaves+"&Lotes="+xLotes+"&Fechas="+xFechas+"&Cantidad="+xCantidad)
            //document.getElementById("ClaveEstudio").value = ""
          }
          catch (e)
          {
            alert("Error al enviar la informacion codigo 1.1")
          }          
        }
        function RemisionGuarda_Carga(pagina_requerida)
        {
          var Cadena0
          if(pagina_requerida.readyState == 4)
          { 
            if (pagina_requerida.status == "12030" || pagina_requerida.status == "12152")
            {
              //No se conecta el servicio
            }
            else if (pagina_requerida.status == 200 || window.location.hrefindexOf("http") == -1)
            {
              Cadena0 = pagina_requerida.responseText
              alert(Cadena0)
            }
            else
            {
            
            }
          }		
        }         
        function CantidadKey(Dato)
        {
          if (event.keyCode==13)
          {
            if (Dato.value=="")
            {
              Dato.value = "1"     
              xCantidad = xCantidad.replace("xxx","1")         
            }
            else
            {
              xCantidad = xCantidad.replace("xxx",Dato.value)         
            }
            document.getElementById("ClaveEstudio").focus()
          }          
        }
        function ClaveEstudioKey(Dato)
        {
          //alert(event.keyCode)
          if (event.keyCode==13)
          {
            if ( Dato  == "")
            {
              //document.getElementById("btnCatalogo").click()
            }
            else
            {	
              ClaveEstudio2(Dato)
            }	    
          }    
        }
        function ClaveEstudio2(Dato)
        {
          var Cadena = "456"
          try
          { 
            Cadena = Dato
            Largo = Dato.length
            Clave = Cadena
            if (Largo == 56)
            {
              Clave = Mid(Cadena,38,11)               
            }
            //alert(Clave)
            pagina_requerida = XMLHttp()
            pagina_requerida.onreadystatechange = function()
            {
              ClaveEstudio2_Carga(pagina_requerida,Dato,Largo)
            }
            Valores=""
            Ruta = '' + document.location + ''
            //alert(Mid(Ruta,1,RInStr(Ruta,"/")) + "/almacen7/insumos_busca_ajax.php")
            pagina_requerida.open("POST",Mid(Ruta,1,RInStr(Ruta,"/")) + "/almacen7/insumos_busca_ajax.php",true)
            pagina_requerida.setRequestHeader("Accept", "*/*")	
            pagina_requerida.setRequestHeader("Content-Type","application/x-www-form-urlencoded")
            pagina_requerida.send("Clave=" + Clave)
            document.getElementById("ClaveEstudio").value = ""
          }
          catch (e)
          {
            alert("Error al enviar la informacion codigo 1.1")
          }
        }
        function ClaveEstudio2_Carga(pagina_requerida,Dato,Largo)
        {
          var Cadena0
          var Cadena1
          var Cadena2
          var Cadena3
          var Cadena
          var EstaSN = 0
          if(pagina_requerida.readyState == 4)
          { 
            if (pagina_requerida.status == "12030" || pagina_requerida.status == "12152")
            {
              //No se conecta el servicio
            }
            else if (pagina_requerida.status == 200 || window.location.href.indexOf("http") == -1)
            {
              
              Cadena0 = pagina_requerida.responseText
              //alert(Cadena0)              
              if (Cadena0=="Error -2")
              {
                alert("No se enconto la clave")
              }
              else
              {
                Datos1 = Cadena0.split("|")
                Cadena = ""
                Cadena1= ""
                Cadena2= ""
                if (Largo == 56)
                {
                  Cadena1 = Mid(Dato,29,6)               
                  Cadena1 = "20" + Mid(Cadena1,1,2) + "-" + Mid(Cadena1,3,2) + "-" + Mid(Cadena1,5,2)
                  Cadena2 = Mid(Dato,17,11)               
                }
                if (xClaves=="")
                {
                }
                else
                {
                  
                  Datos2 = xClaves.split("|")
                  Datos3 = xLotes.split("|")
                  Datos4 = xFechas.split("|")
                  Datos5 = xCantidad.split("|")

                  for (i=0;i<Datos2.length;i++)
                  {
                    if (Datos2[i] == Datos1[1])
                    {
                      EstaSN   = 1                    
                      //alert("Cantidad"+Right("0"+i,2))
                      Cantidad = document.getElementById("Cantidad"+Right("0"+i,2)).value
                      Cantidad = parseInt(Cantidad) + 1
                      document.getElementById("Cantidad"+Right("0"+i,2)).value = Cantidad
                      Datos5[i] = Cantidad                    
                      break
                    }
                  }
                  if ( EstaSN == 1)
                  {
                    xCantidad = Datos5.join("|")
                  }
                }
                //xClaves    = Datos1[1]
                //xLotes     = Cadena2
                //xCantidad  = 1
                //alert(EstaSN)
                if (EstaSN==0)
                {
                  if (xClaves == "")
                  {
                  }
                  else
                  {
                    CreaInsumos(xClaves,xNombres,xLotes,xFechas,xCantidad)
                  }
                  Indice = 0
                  if (xClaves == "")
                  {
                  }
                  else
                  {
                    Indice =  Datos2.length
                  }
                  //alert(Indice)
                  Cadena = ""
                  Cadena = Cadena + "<tr>"
                    Cadena = Cadena + "<td width=141px>"
                      Cadena = Cadena + Datos1[1]
                    Cadena = Cadena + "</td>"
                    Cadena = Cadena + "<td width=*>"
                      Cadena = Cadena + Datos1[2]
                    Cadena = Cadena + "</td>"
                    Cadena = Cadena + "<td width=100 aling=Center>"
                      Cadena = Cadena + "<input id='Lote" + Right('0'+Indice,2) + "' type=text class=texto_clave "
                      Cadena = Cadena + "value='" + Cadena2 + "' "
                      Cadena = Cadena + "style='"
                      Cadena = Cadena + "border:0px;"
                      Cadena = Cadena + "width:90px;"
                      Cadena = Cadena + "Position:relative;"
                      Cadena = Cadena + "top:0px;"
                      Cadena = Cadena + "padding-left: 4px;	"
                      Cadena = Cadena + "font-size: 10pt;	"
                      Cadena = Cadena + "left:1px' "
                      //Cadena = Cadena + "onKeyup='JavaScript:ClaveEstudioKey(this.value)' "
                      Cadena = Cadena + "onFocus='JavaScript:FocoToma(this)' "
                      Cadena = Cadena + "onBlur='JavaScript:FocoPierde(this)' "
                      Cadena = Cadena + "> "
                    Cadena = Cadena + "</td>"
                    Cadena = Cadena + "<td width=150 aling=Center>"
                      Cadena = Cadena + "<input id='Fecha" + Right('0'+Indice,2) + "' type=text class=texto_clave "
                      Cadena = Cadena + "value='" + Cadena1 + "' "
                      Cadena = Cadena + "style='"
                      Cadena = Cadena + "border:0px;"
                      Cadena = Cadena + "width:140px;"
                      Cadena = Cadena + "Position:relative;"
                      Cadena = Cadena + "top:0px;"
                      Cadena = Cadena + "padding-left: 4px;	"
                      Cadena = Cadena + "font-size: 10pt;	"
                      Cadena = Cadena + "left:1px' "
                      //Cadena = Cadena + "onKeyup='JavaScript:ClaveEstudioKey(this.value)' "
                      Cadena = Cadena + "onFocus='JavaScript:FocoToma(this)' "
                      Cadena = Cadena + "onBlur='JavaScript:FocoPierde(this)' "
                      Cadena = Cadena + "> "
                    Cadena = Cadena + "</td>"
                    Cadena = Cadena + "<td width=50 aling=Center>"
                    //alert("Cantidad" + Right('0'+Indice,2))
                    Cadena = Cadena + "<input id='Cantidad" + Right('0'+Indice,2) + "' type=text class=texto_clave "
                      Cadena = Cadena + "value='' "
                      Cadena = Cadena + "style='"
                      Cadena = Cadena + "border:0px;"
                      Cadena = Cadena + "width:40px;"
                      Cadena = Cadena + "Position:relative;"
                      Cadena = Cadena + "top:0px;"
                      Cadena = Cadena + "padding-left: 4px;	"
                      Cadena = Cadena + "font-size: 10pt;	"
                      Cadena = Cadena + "left:1px' "
                      //Cadena = Cadena + "onKeyup='JavaScript:ClaveEstudioKey(this.value)' "
                      Cadena = Cadena + "onKeyup='JavaScript:CantidadKey(this)' "
                      Cadena = Cadena + "onFocus='JavaScript:FocoToma(this)' "
                      Cadena = Cadena + "onBlur='JavaScript:FocoPierde(this)' "
                      Cadena = Cadena + "> "
                    Cadena = Cadena + "</td>"
                  Cadena = Cadena + "</tr>"
                  xInsumos =  Cadena + xInsumos 
                  Cadena = ""
                  Cadena = Cadena + "<table class='table table-striped table-bordered table-sm dt-responsive nowrap w-100' >"
                    Cadena = Cadena + "<tbody>"
                      Cadena = Cadena + xInsumos
                    Cadena = Cadena + "</tbody>"
                  Cadena = Cadena + "</table>"
                  //alert(Cadena)

                  if (xClaves == "")
                  {
                    xClaves    = Datos1[1]
                    xNombres   = Datos1[2]
                    xLotes     = Cadena2
                    xFechas    = Cadena1
                    xCantidad  = "xxx"
                  }
                  else
                  {
                    xClaves    = xClaves   + "|" + Datos1[1]
                    xNombres   = xNombres  + "|" + Datos1[2]
                    xLotes     = xLotes    + "|" + Cadena2
                    xFechas    = xFechas   + "|" + Cadena1
                    xCantidad  = xCantidad + "|" + "xxx"
                  }
                  
                  //alert('123')
                  document.getElementById("Insumos123").innerHTML =  Cadena
                  document.getElementById("Cantidad" + Right('0'+Indice,2)).focus()
                }
              }
              //document.getElementById("ClaveEstudio").focus()
            }
            else
            {
            
            }
          }		
        }  
        function CreaInsumos(xClaves,xNombres,xLotes,xFechas,xCantidad)
        {
          var Cadena
          var Datos1
          var Datos2
          var Datos3
          var Datos4
          var Datos5
          var i
          /*
          alert('CreaInsumos')
          alert(xClaves)
          alert(xNombres)
          alert(xLotes)
          alert(xFechas)
          alert(xCantidad)
          */
          Datos1 = xClaves.split("|")
          Datos2 = xNombres.split("|")
          Datos3 = xLotes.split("|")
          Datos4 = xFechas.split("|")
          Datos5 = xCantidad.split("|")
          xInsumos = ""
          for (i=0;i<Datos1.length;i++)
          {
            Cadena = ""
            Cadena = Cadena + "<tr>"
              Cadena = Cadena + "<td width=141px>"
                Cadena = Cadena + Datos1[i]
              Cadena = Cadena + "</td>"
              Cadena = Cadena + "<td width=*>"
                Cadena = Cadena + "" + Datos2[i] + "..."
              Cadena = Cadena + "</td>"
              Cadena = Cadena + "<td width=100 aling=Center>"
                Cadena = Cadena + "<input id='Lote" + Right('0'+i,2) + "' type=text class=texto_clave name='ClaveEstudio' "
                Cadena = Cadena + "value='" + Datos3[i] + "' "
                Cadena = Cadena + "style='"
                Cadena = Cadena + "border:0px;"
                Cadena = Cadena + "width:90px;"
                Cadena = Cadena + "Position:relative;"
                Cadena = Cadena + "top:0px;"
                Cadena = Cadena + "padding-left: 4px;	"
                Cadena = Cadena + "font-size: 10pt;	"
                Cadena = Cadena + "left:1px' "
                //Cadena = Cadena + "onKeyup='JavaScript:ClaveEstudioKey(this.value)' "
                Cadena = Cadena + "onFocus='JavaScript:FocoToma(this)' "
                Cadena = Cadena + "onBlur='JavaScript:FocoPierde(this)' "
                Cadena = Cadena + "> "
              Cadena = Cadena + "</td>"
              Cadena = Cadena + "<td width=150 aling=Center>"
                Cadena = Cadena + "<input id='Fecha" + Right('0'+i,2) + "' type=text class=texto_clave name='ClaveEstudio' "
                Cadena = Cadena + "value='" + Datos4[i] + "' "
                Cadena = Cadena + "style='"
                Cadena = Cadena + "border:0px;"
                Cadena = Cadena + "width:140px;"
                Cadena = Cadena + "Position:relative;"
                Cadena = Cadena + "top:0px;"
                Cadena = Cadena + "padding-left: 4px;	"
                Cadena = Cadena + "font-size: 10pt;	"
                Cadena = Cadena + "left:1px' "
                //Cadena = Cadena + "onKeyup='JavaScript:ClaveEstudioKey(this.value)' "
                Cadena = Cadena + "onFocus='JavaScript:FocoToma(this)' "
                Cadena = Cadena + "onBlur='JavaScript:FocoPierde(this)' "
                Cadena = Cadena + "> "
              Cadena = Cadena + "</td>"
              Cadena = Cadena + "<td width=50 aling=Center>"
              Cadena = Cadena + "<input id='Cantidad" + Right('0'+i,2) + "' type=text class=texto_clave name='ClaveEstudio' "
                Cadena = Cadena + "value='" + Datos5[i] + "' "
                Cadena = Cadena + "style='"
                Cadena = Cadena + "border:0px;"
                Cadena = Cadena + "width:40px;"
                Cadena = Cadena + "Position:relative;"
                Cadena = Cadena + "top:0px;"
                Cadena = Cadena + "padding-left: 4px;	"
                Cadena = Cadena + "font-size: 10pt;	"
                Cadena = Cadena + "left:1px' "
                //Cadena = Cadena + "onKeyup='JavaScript:ClaveEstudioKey(this.value)' "
                Cadena = Cadena + "onFocus='JavaScript:FocoToma(this)' "
                Cadena = Cadena + "onBlur='JavaScript:FocoPierde(this)' "
                Cadena = Cadena + "> "
              Cadena = Cadena + "</td>"
            Cadena = Cadena + "</tr>"
            xInsumos =  Cadena + xInsumos
          }
        }
        CargaDates()
        function CargaDates()
        {
          App.loadPlugins(plugins, null).then(() => {
            // Inline
            flatpickr('.datepicker-inline', {
              inline: true,
            })

            // Basic
            flatpickr('.datepicker')

            // Datetime
            flatpickr('.datetimepicker', {
              enableTime: true
            })

            // Allow Input
            flatpickr('.datepicker-input', {
              allowInput: true
            })

            // External elements
            flatpickr('.datepicker-wrap', {
              allowInput: true,
              clickOpens: false,
              wrap: true,
            })

            // Date Range
            flatpickr('.daterangepicker', {
              mode: 'range'
            })
            flatpickr('.daterangepicker-wrap', {
              allowInput: true,
              clickOpens: false,
              wrap: true,
              mode: 'range'
            })

            // Multiple Dates
            flatpickr('.datepicker-multiple', {
              mode: 'multiple'
            })
            flatpickr('.datepicker-multiple-wrap', {
              allowInput: true,
              clickOpens: false,
              wrap: true,
              mode: 'multiple'
            })

            // Month Picker
            flatpickr('.monthpicker', {
              plugins: [
                new monthSelectPlugin({
                  shorthand: true,
                  dateFormat: 'Y-m',
                  altFormat: 'Y-m',
                })
              ]
            })
            flatpickr('.monthpicker-wrap', {
              allowInput: true,
              clickOpens: false,
              wrap: true,
              plugins: [
                new monthSelectPlugin({
                  shorthand: true,
                  dateFormat: 'Y-m',
                  altFormat: 'Y-m',
                })
              ]
            })

            // Time Picker
            flatpickr('.timepicker', {
              enableTime: true,
              noCalendar: true,
              dateFormat: 'H:i',
              minuteIncrement: 1,
            })
            flatpickr('.timepicker-wrap', {
              allowInput: true,
              enableTime: true,
              noCalendar: true,
              dateFormat: 'H:i',
              minuteIncrement: 1,
              clickOpens: false,
              wrap: true,
            })

            // Clock Picker
            $('.clockpicker').clockpicker({
              autoclose: true
            })

          }).then(() => App.stopLoading())                      
        }
      </script>