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