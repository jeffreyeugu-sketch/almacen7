<?php
include ("mysql.php");

// ===== VALIDACIÓN CRÍTICA =====
if (!isset($_POST["NoReg"]) || empty($_POST["NoReg"]) || !is_numeric($_POST["NoReg"])) {
    echo "<div class='alert alert-danger'>Error: No se recibió un número de registro válido.</div>";
    exit;
}

$NoReg = intval($_POST["NoReg"]); // Asegurar que es entero
?>
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body"><b>Consulta de remisiones..</b>
        <form>
          <table class="table table-bordered table-form">                    
            <tbody><?php 
              include ("../mysql.php");
              
              // Primera consulta - SEGURA
              $sql = "select * from _remisiones where NoReg=" . $NoReg;
              $rsp = odbc_exec($conn,$sql);
              
              if (!$rsp) {
                  die("Error en consulta: " . odbc_errormsg($conn));
              }
              
              if (!odbc_fetch_row($rsp)) {
                  die("No se encontró la remisión con NoReg: " . $NoReg);
              }
              ?>
                      <tr>
                        <td><label for="lastNameTableForm">No de remisión</label></td>
                        <td><input type="text" class="form-control" id="Remision" placeholder="Capture el número de remisión."
                        value='<?php echo odbc_result($rsp,"Remision") ?>'
                        onFocus="JavaScript:FocoToma(this)" 
                        onBlur="JavaScript:FocoPierde(this)"					
                        ></td>
                      </tr>
                      <tr>
                        <td><label for="lastNameTableForm">Fecha de Emitido</label></td>
                        <td><input type="text" class="form-control datepicker"  id="Fecha" placeholder="Fecha de emision"
                        value='<?php echo odbc_result($rsp,"Emitido") ?>'
                        onFocus="JavaScript:FocoToma(this)" 
                        onBlur="JavaScript:FocoPierde(this)"					
                        ></td>
                      </tr>
                      <tr>
                        <td><label for="lastNameTableForm">Fecha de Envío</label></td>
                        <td><input type="text" class="form-control datepicker"  id="Fecha" placeholder="Fecha de envio"
                        value='<?php echo odbc_result($rsp,"Envio") . ' ' . odbc_result($rsp,"Envioa_Hora") ?>'
                        onFocus="JavaScript:FocoToma(this)" 
                        onBlur="JavaScript:FocoPierde(this)"					
                        ></td>
                      </tr>
                      <tr>
                        <td><label for="lastNameTableForm">Mes de Entrega</label></td>
                        <td><input type="text" class="form-control datepicker"  id="Fecha" placeholder="Mes de entrega"
                        value='<?php echo odbc_result($rsp,"Entrega") . ' ' . odbc_result($rsp,"Entrega_Anio") ?>'
                        onFocus="JavaScript:FocoToma(this)" 
                        onBlur="JavaScript:FocoPierde(this)"					
                        ></td>
                      </tr>
                      <tr>
                        <td><label for="addressTableForm">Observación</label></td>
                        <td><textarea class="form-control" id="Obs" placeholder="Escriba una observacion o comentario" rows="2"
                        onFocus="JavaScript:FocoToma(this)" 
                        onBlur="JavaScript:FocoPierde(this)"					
                       ></textarea></td>
                      </tr>
                    </tbody>
                  </table>                  
                </form>
              </div>
            </div>
        </div>
        <div class="col-3 d-none d-xl-block">
          <div class="nav-section">
            Ayuda
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col">
            <div class="card">
              <div class="card-body">Lista de los insumos
                <table class="table table-striped table-bordered table-sm dt-responsive nowrap w-100" >
                <tbody>
                  <tr>
                    <td width=140px>
                      <b>C&oacute;digo</b>
                    </td>
                    <td width=*>
                      <b>Nombre</b>
                    </td>
                    <td width=100 aling=Center><div id=ClaveStatus2 valign=Center>
                      <b>Lote</b>
                    </td>
                    <td width=100 aling=Center><div id=ClaveStatus2 valign=Center>
                      <b>Caducidad</b>
                    </td>
                    <td width=80 aling=Center><div id=ClaveStatus2 valign=Center>
                      <b>Cantidad</b>
                    </td>
                    <td width=80 aling=Center><div id=ClaveStatus2 valign=Center>
                      <b>Recibido</b>
                    </td>
                    <td width=50 aling=Center><div id=ClaveStatus2 valign=Center>
                      &nbsp;
                    </td>
                  </tr><script language=javascript>NumIns = 0</script><input type=hidden name=Clave>
                  <?php
                  $sql = "";
                  $sql.= "select r.* , i.Clave, i.Nombre ";
                  $sql.= "from _remisiones_detalle r ";
                  $sql.= "left join cat_dev_insumos i ON r.RegIns = i.NoReg ";
                  $sql.= "where RegRem=" . $NoReg;
                  $rsp = odbc_exec($conn,$sql);
                  $i=0;
                  while (odbc_fetch_row($rsp))
                  {
                    $i++;
                    ?>                  
                    <tr>
                      <td width=140px><?php echo odbc_result($rsp,"Clave") ?>
                      </td>
                      <td width=*>
                          <div id=ClaveStatus ><?php echo odbc_result($rsp,"Nombre") ?><Enter></div>
                      </td>
                      <td width=100 aling=Center><div id=ClaveStatus2 valign=Center>
                        <?php echo odbc_result($rsp,"Lote") ?>
                      </td>
                      <td width=100 aling=Center><div id=ClaveStatus2 valign=Center>
                        <?php echo odbc_result($rsp,"Caducidad") ?>
                      </td>
                      <td width=80  aling=Center><div id=ClaveStatus2 valign=Center>
                        <input type="text" class="form-control datepicker"  id="Cantidad_<?php echo $i ?>" placeholder="Fecha de envio"
                        value='<?php echo odbc_result($rsp,"Cantidad") ?>'
                        onFocus="JavaScript:FocoToma(this)" 
                        onBlur="JavaScript:FocoPierde(this)" disabled					
                        >
                      </td>
                      <td width=80  aling=Center><div id=ClaveStatus2 valign=Center><input type=hidden id="NoReg_<?php echo $i ?>"
                        value='<?php echo odbc_result($rsp,"NoReg") ?>'
                        >
                        <input type="text" class="form-control datepicker" id="Recibido_<?php echo $i ?>" placeholder="Fecha de envio"
                        value='<?php echo odbc_result($rsp,"Recibido") ?>'
                        onFocus="JavaScript:FocoToma(this)" 
                        onBlur="JavaScript:FocoPierde(this)" disabled					
                        >
                      </td>
                      <td width=50 aling=Center><div id=ClaveStatus2 valign=Center>
                        &nbsp;
                      </td>
                    </tr>
                    <?php 
                  }
                  ?>
                </tbody>
                </table>
                <div id='Insumos123'>
                  <button class="btn btn-secondary" type="reset"  id="btnDatosSistemaModifica" onClick="Datos_Sistema_Modifica()" disabled>Modificar</button>
                  <button class="btn btn-success"   type="button" id="btnDatosSistemaGuardar"  onClick="Registrar_Entrada(<?php echo $i ?>)" >Registrar Entrada</button>
                  <button class="btn btn-success"   type="button" id="btnDatosSistemaRegistra" onClick="Registrar_Guardar(<?php echo $i . "," . $NoReg ?>)" hidden>Guardar Entrada</button>
                </div>
              </div>
            </div>
        </div>
        <div class="col-3 d-none d-xl-block">
          <div class="nav-section">
          
          </div>
        </div>
      </div>