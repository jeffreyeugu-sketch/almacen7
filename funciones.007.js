function Init()
{
    wsConnect();
}
function  wsConnect()
{
    Ruta = '' + document.location + ''
    Ruta = Mid(Ruta,1,RInStr(Ruta,"/"))
    Ruta = Mid(Ruta,1,RInStr(Ruta,"/"))
    Ruta = Mid(Ruta,1,RInStr(Ruta,"/"))
    Ruta = Mid(Ruta,1,RInStr(Ruta,"/"))
    Ruta = Mid(Ruta,8,20)
    websocket = new WebSocket("ws://" + Ruta + ":3000");
    websocket.onopen = function(evt){
    onOpen(evt);
    }
    websocket.onclose = function(evt){
        onClose(evt);
    }
    websocket.onmessage = function(evt){
        onMessage(evt);
    }
    websocket.onerror = function(evt){
        onError(evt);
    }
}
function onOpen(evt){
    console.log("Conectado...");    
    doSend(userid+"|Abrir|"+sessionid);    
}
function onClose(evt){
    console.log("Desconectado");
    setTimeout(wsConnect(), 500);
}
function onMessage(evt){
    console.log("Recibido: " + evt.data);
    Dato = evt.data    
    Datos =  Dato.split("|")
    switch(Datos[0]) {
        case '1':
            switch(Datos[1]) {
                case '1':
                case '-1':
                    try
                    {   
                        Ruta = '' + document.location + ''
                        Ruta = Mid(Ruta,1,RInStr(Ruta,"/"))
                        Pagina_Requerida = XMLHttp()                        
                        Pagina_Requerida.open("POST",Ruta + "/index_sesion_termina.asp",false)
                        Pagina_Requerida.setRequestHeader("Accept", "*/*")  
                        Pagina_Requerida.setRequestHeader("Content-Type","application/x-www-form-urlencoded") 
                        Pagina_Requerida.send()
                        location.replace(Ruta+"/index.asp")
                    }
                    catch (e)
                    {
                        alert("Error al enviar la informacion codigo 1.1.1")
                    }          
                    console.log("Se solicita cerrar");
                    break;
                    break;
                case '-2':
                Ruta = '' + document.location + ''
                Ruta = Mid(Ruta,1,RInStr(Ruta,"/"))
                location.replace(Ruta+"/error_sesion.html")
                    break;
                default:
                  // code block
            }    
            break;
        case '2':
            // Replicas
            //alert(Datos[1])            
            Datos1 = Datos[1].split("^")
            Cadena = ""
            Cadena = Cadena + "<h6 class='card-title text-secondary font-size-sm'><i data-feather='database' class='mr-2'></i>Replica Lab. Guadalupe</h6>"
                Cadena = Cadena + "<div class='d-flex align-items-center mb-1'>"
                if (Datos1[1]=='Yes'){
                    Cadena = Cadena + "<span class='badge badge-success'>&nbsp;&nbsp;IO&nbsp;&nbsp;</span>&nbsp;"
                }
                else{
                    Cadena = Cadena + "<span class='badge badge-secondary'>&nbsp;&nbsp;IO&nbsp;&nbsp;</span>&nbsp;"
                }
                if (Datos1[2]=='Yes'){
                    Cadena = Cadena + "<span class='badge badge-success'>SQL</span>&nbsp;"
                }
                else{
                    Cadena = Cadena + "<span class='badge badge-secondary'>SQL</span>&nbsp;"
                }
                if (Datos1[1]=='Yes'){
                    Cadena = Cadena + "<span class='small text-success'>" + Datos1[3] + "</span>"
                }
                else{
                    Cadena = Cadena + "<span class='small text-secondary'>" + Datos1[3] + "</span>"
                }
                Cadena = Cadena + "&nbsp;/&nbsp;"
                if (Datos1[2]=='Yes'){
                    Cadena = Cadena + "<span class='small text-success'>" + Datos1[4] + "</span>"
                }
                else
                {
                    Cadena = Cadena + "<span class='small text-secondary'>" + Datos1[4] + "</span>"
                }
            Cadena = Cadena + "</div>"
            document.getElementById('Replica_001').innerHTML = Cadena
            
            break;
        case '3' :
            MuestraDatos(Datos[1],Datos[2])
        default:
          // code block
    }
}
function onError(evt){ 
    console.log("Error: " + evt.data);
}
function doSend(message){
    websocket.send(message);
}
function enviarTexto(Cubiculo,Paciente)
{
    doSend(Cubiculo + "|Pantalla1|" + Paciente)
}
function enviarUsuario(Usuario)
{
    doSend(Usuario);
}
function cerrarSession(event)
{
    console.log("Cerrando Session 1");
    onClose(event);    
}
window.addEventListener("load", Init, false);

// ============================================================================
// MÓDULO DE REMISIONES - CÓDIGO MODERNIZADO
// ============================================================================
// Este código moderniza las funciones de remisiones del sistema
// Fecha de implementación: [AGREGAR FECHA]
// Reemplaza: XMLHttpRequest por Fetch API, alert() por notificaciones Toast
// ============================================================================

// ==================== CONFIGURACIÓN GLOBAL ====================
const RemisionesConfig = {
    baseUrl: (() => {
      const url = window.location.href;
      const lastSlash = url.lastIndexOf('/');
      return url.substring(0, lastSlash);
    })(),
    
    endpoints: {
      remisionesGuarda: '/almacen7/remisiones_guarda.php',
      remisionesConsulta: '/almacen7/remisiones_consulta.php',
      remisionesEntrada: '/almacen7/remisiones_entrada.php',
      entradasGuarda: '/almacen7/entradas_guarda.php'
    }
  };
  
  // ==================== UTILIDADES ====================
  const RemisionesUtils = {
    showSuccess(message) {
      this.showToast(message, 'success');
    },
  
    showError(message) {
      this.showToast(message, 'danger');
    },
  
    showInfo(message) {
      this.showToast(message, 'info');
    },
  
    showToast(message, type = 'info') {
      // Si existe Toastr
      if (typeof toastr !== 'undefined') {
        toastr[type](message);
        return;
      }
  
      // Fallback con Bootstrap Toast
      let toastContainer = document.getElementById('toastContainer');
      if (!toastContainer) {
        toastContainer = document.createElement('div');
        toastContainer.id = 'toastContainer';
        toastContainer.className = 'toast-container position-fixed top-0 end-0 p-3';
        toastContainer.style.zIndex = '9999';
        document.body.appendChild(toastContainer);
      }
  
      const toastId = 'toast-' + Date.now();
      const bgClass = 'bg-' + type;
      
      const toastHTML = `
        <div id="${toastId}" class="toast align-items-center text-white ${bgClass} border-0" role="alert">
          <div class="d-flex">
            <div class="toast-body">${message}</div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
          </div>
        </div>
      `;
  
      toastContainer.insertAdjacentHTML('beforeend', toastHTML);
      
      const toastElement = document.getElementById(toastId);
      const toast = new bootstrap.Toast(toastElement, { delay: 3000 });
      toast.show();
  
      toastElement.addEventListener('hidden.bs.toast', () => {
        toastElement.remove();
      });
    },
  
    validateRequired(value, fieldName) {
      if (!value || value.trim() === '') {
        this.showError(`El campo ${fieldName} es requerido`);
        return false;
      }
      return true;
    },
  
    toggleButton(buttonId, disabled, text = null) {
      const button = document.getElementById(buttonId);
      if (button) {
        button.disabled = disabled;
        if (text) button.textContent = text;
      }
    },
  
    toggleField(fieldId, disabled) {
      const field = document.getElementById(fieldId);
      if (field) {
        field.disabled = disabled;
        if (disabled) {
          field.classList.add('bg-light');
        } else {
          field.classList.remove('bg-light');
        }
      }
    }
  };
  
  // ==================== API DE REMISIONES ====================
  const RemisionesAPI = {
    async post(endpoint, data) {
      try {
        const formData = new URLSearchParams();
        for (const key in data) {
          formData.append(key, data[key]);
        }
  
        const response = await fetch(RemisionesConfig.baseUrl + endpoint, {
          method: 'POST',
          headers: {
            'Accept': '*/*',
            'Content-Type': 'application/x-www-form-urlencoded'
          },
          body: formData.toString()
        });
  
        if (!response.ok) {
          throw new Error(`Error HTTP: ${response.status}`);
        }
  
        return await response.text();
      } catch (error) {
        console.error('Error en petición:', error);
        throw error;
      }
    },
  
    async guardarRemision(data) {
      return await this.post(RemisionesConfig.endpoints.remisionesGuarda, data);
    },
  
    async consultarRemision(noReg) {
      return await this.post(RemisionesConfig.endpoints.remisionesConsulta, { NoReg: noReg });
    },
  
    async registrarEntrada(data) {
      return await this.post(RemisionesConfig.endpoints.remisionesEntrada, data);
    },
  
    async guardarEntradas(data) {
      return await this.post(RemisionesConfig.endpoints.entradasGuarda, data);
    }
  };
  
  // ==================== CONTROLADOR DE REMISIONES ====================
  const RemisionesController = {
    async guardar(noReg) {
      try {
        const remision = document.getElementById('Remision').value;
        const idProveedor = document.getElementById('IdProveedor').value;
        const fecha = document.getElementById('Fecha').value;
        const obs = document.getElementById('Obs').value;
  
        if (!RemisionesUtils.validateRequired(remision, 'Número de Remisión')) return;
        if (!RemisionesUtils.validateRequired(idProveedor, 'Proveedor')) return;
        if (!RemisionesUtils.validateRequired(fecha, 'Fecha')) return;
  
        RemisionesUtils.toggleField('Remision', true);
        RemisionesUtils.toggleField('IdProveedor', true);
        RemisionesUtils.toggleField('Fecha', true);
        RemisionesUtils.toggleField('Obs', true);
        RemisionesUtils.toggleButton('btnDatosGuardar', true, 'Guardando...');
  
        const data = {
          Remision: remision,
          IdProveedor: idProveedor,
          Fecha: fecha,
          Obs: obs
        };
  
        const resultado = await RemisionesAPI.guardarRemision(data);
  
        if (resultado.includes('1') || resultado.includes('success')) {
          RemisionesUtils.showSuccess('✓ Remisión guardada exitosamente');
          RemisionesUtils.toggleButton('btnDatosModifica', false);
        } else {
          RemisionesUtils.showError('Error al guardar la remisión: ' + resultado);
          RemisionesUtils.toggleField('Remision', false);
          RemisionesUtils.toggleField('IdProveedor', false);
          RemisionesUtils.toggleField('Fecha', false);
          RemisionesUtils.toggleField('Obs', false);
        }
  
      } catch (error) {
        RemisionesUtils.showError('Error de conexión: ' + error.message);
        console.error('Error al guardar remisión:', error);
        
        RemisionesUtils.toggleField('Remision', false);
        RemisionesUtils.toggleField('IdProveedor', false);
        RemisionesUtils.toggleField('Fecha', false);
        RemisionesUtils.toggleField('Obs', false);
      } finally {
        RemisionesUtils.toggleButton('btnDatosGuardar', false, 'Guardar');
      }
    },
  
    modificar() {
      RemisionesUtils.toggleField('Remision', false);
      RemisionesUtils.toggleField('IdProveedor', false);
      RemisionesUtils.toggleField('Fecha', false);
      RemisionesUtils.toggleField('Obs', false);
      RemisionesUtils.toggleButton('btnDatosModifica', true);
      RemisionesUtils.toggleButton('btnDatosGuardar', false);
      RemisionesUtils.showInfo('Puede modificar los campos ahora');
    },
  
    async consultar(noReg) {
      try {
        if (!noReg || isNaN(noReg)) {
          RemisionesUtils.showError('Número de registro inválido');
          return;
        }
  
        const html = await RemisionesAPI.consultarRemision(noReg);
        document.getElementById('Pagina').innerHTML = html;
        RemisionesUtils.showSuccess('Remisión consultada');
  
      } catch (error) {
        RemisionesUtils.showError('Error al consultar remisión: ' + error.message);
        console.error('Error:', error);
      }
    }
  };
  
  // ==================== CONTROLADOR DE ENTRADAS ====================
  const EntradasController = {
    registrarEntrada(numIns) {
      RemisionesUtils.toggleButton('btnDatosSistemaGuardar', true);
      
      for (let i = 1; i <= numIns; i++) {
        const cantidad = document.getElementById(`Cantidad_${i}`).value;
        const recibidoField = document.getElementById(`Recibido_${i}`);
        
        if (recibidoField) {
          recibidoField.disabled = false;
          recibidoField.value = cantidad;
          recibidoField.classList.remove('bg-light');
        }
      }
      
      const btnRegistrar = document.getElementById('btnDatosSistemaRegistra');
      if (btnRegistrar) {
        btnRegistrar.hidden = false;
      }
      
      RemisionesUtils.showInfo('Ajuste las cantidades recibidas si es necesario');
    },
  
    async guardar(numIns, noReg) {
      try {
        const btnRegistrar = document.getElementById('btnDatosSistemaRegistra');
        if (btnRegistrar) {
          btnRegistrar.hidden = true;
        }
  
        let errores = 0;
        let exitosos = 0;
  
        for (let i = 1; i <= numIns; i++) {
          const recibidoField = document.getElementById(`Recibido_${i}`);
          const noRegField = document.getElementById(`NoReg_${i}`);
          
          if (!recibidoField || !noRegField) continue;
  
          const cantidad = recibidoField.value;
          const noReg2 = noRegField.value;
  
          try {
            await this.registrarInsumo(noReg, noReg2, cantidad);
            recibidoField.disabled = true;
            recibidoField.classList.add('bg-light');
            exitosos++;
          } catch (error) {
            errores++;
            console.error(`Error en insumo ${i}:`, error);
          }
        }
  
        if (errores === 0) {
          RemisionesUtils.showSuccess(`✓ Se registraron ${exitosos} insumos correctamente`);
        } else {
          RemisionesUtils.showError(`Se completaron ${exitosos} insumos, ${errores} con errores`);
        }
  
      } catch (error) {
        RemisionesUtils.showError('Error al guardar entradas: ' + error.message);
        console.error('Error:', error);
      }
    },
  
    async registrarInsumo(noReg, noReg2, cantidad) {
      const data = {
        NoRegRem: noReg,
        NoReg: noReg2,
        Cantidad: cantidad
      };
  
      const resultado = await RemisionesAPI.registrarEntrada(data);
      
      if (resultado.includes('Error') || resultado.includes('error')) {
        throw new Error(resultado);
      }
      
      return resultado;
    },
  
    async guardarRemision(claves, lotes, fechas, cantidades) {
      try {
        const data = {
          Claves: claves,
          Lotes: lotes,
          Fechas: fechas,
          Cantidad: cantidades
        };
  
        console.log('Guardando remisión:', data);
        
        const resultado = await RemisionesAPI.guardarEntradas(data);
        
        if (resultado.includes('Error')) {
          RemisionesUtils.showError('Error al guardar: ' + resultado);
        } else {
          RemisionesUtils.showSuccess('✓ Remisión guardada correctamente');
        }
  
      } catch (error) {
        RemisionesUtils.showError('Error de conexión: ' + error.message);
        console.error('Error:', error);
      }
    }
  };
  
  // ==================== FUNCIONES GLOBALES (COMPATIBILIDAD CON HTML EXISTENTE) ====================
  // Estas funciones mantienen los mismos nombres que el código antiguo para compatibilidad
  
  function Cat_Dev_Remisiones_Guardar(noReg) {
    RemisionesController.guardar(noReg);
  }
  
  function Cat_dev_Remisiones_Modifica() {
    RemisionesController.modificar();
  }
  
  function RemisionConsulta(noReg) {
    RemisionesController.consultar(noReg);
  }
  
  function Registrar_Entrada(numIns) {
    EntradasController.registrarEntrada(numIns);
  }
  
  function Registrar_Guardar(numIns, noReg) {
    EntradasController.guardar(numIns, noReg);
  }
  
  function RemisionGuarda(claves, lotes, fechas, cantidad) {
    EntradasController.guardarRemision(claves, lotes, fechas, cantidad);
  }
  
  // ==================== INICIALIZACIÓN ====================
  // Solo se ejecuta si el DOM ya está cargado
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', inicializarModuloRemisiones);
  } else {
    inicializarModuloRemisiones();
  }
  
  function inicializarModuloRemisiones() {
    console.log('✓ Módulo de Remisiones modernizado cargado correctamente');
    
    // Configurar Toastr si está disponible
    if (typeof toastr !== 'undefined') {
      toastr.options = {
        closeButton: true,
        progressBar: true,
        positionClass: 'toast-top-right',
        timeOut: 3000
      };
    }
  }
  
  // ============================================================================
  // FIN DEL MÓDULO DE REMISIONES
  // ============================================================================