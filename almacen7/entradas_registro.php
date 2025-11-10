  <?php
    include ("mysql.php");
  ?>
      <div class="row">
        <div class="col">
            <div class="card">
              <div class="card-body"><b>Registro de Entradas</b>
                <form>
                  <table class="table table-bordered table-form">                    
                    <tbody>
                      <tr>
                        <td><label for="languageTableForm">Area</label></td>
                        <td>
                          <select class="custom-select" id="IdEquipo"  
                          disabled                         
                          onFocus="JavaScript:FocoToma(this)" 
                          onBlur="JavaScript:FocoPierde(this)"
                          >
                          <?php
                            $sql   = "";
                            $sql   = $sql . "select * from cat_dev_areas where clave='' order by orden ";
                            echo $sql;
                            $rsp = odbc_exec($conn,$sql);
                            while (odbc_fetch_row($rsp))
                            {
                              echo "<option value='0'>Seleciona una clave</option>" ;
                              echo "<option value='" . odbc_result($rsp,"NoReg") . "' ";
                              echo " selected ";
                              echo ">" . odbc_result($rsp,"Nombre") . " (" . odbc_result($rsp,"Clave") . ")</option>";
                              $i++;
                            }          
                            ?>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td><label for="lastNameTableForm">No de remisión</label></td>
                        <td><input type="text" class="form-control" id="Remision" placeholder="Capture el número de remisión."
                        onFocus="JavaScript:FocoToma(this)" 
                        onBlur="JavaScript:FocoPierde(this)"					
                        ></td>
                      </tr>
                      <tr>
                        <td><label for="lastNameTableForm">Fecha de Entrada</label></td>
                        <td><input type="text" class="form-control datepicker"  id="Fecha" placeholder="Fecha de entrada"
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
              <div class="card-body">lista de insumos
                <table class="table table-striped table-bordered table-sm dt-responsive nowrap w-100" >
                <tbody>
                  <tr>
                    <td width=140px><input id="ClaveEstudio" type=text class=texto_clave name="ClaveEstudio" 
                      value=''
                      style='
                      border:0px;   
                      width:132px;
                      Position:relative;
                      top:0px;
                      padding-left: 4px;	
                      font-weight:bold;
                      font-size: 12pt;	
                      left:1px' 
                      onKeyup="JavaScript:ClaveEstudioKey(this.value)"
                      onFocus="JavaScript:FocoToma(this)" 
                      onBlur="JavaScript:FocoPierde(this)"
                      >
                    </td>
                    <td width=*>
                        <div id=ClaveStatus ><-Escriba la clave y pulse.<Enter></div>
                    </td>
                    <td width=100 aling=Center><div id=ClaveStatus2 valign=Center>
                      &nbsp;
                    </td>
                    <td width=150 aling=Center><div id=ClaveStatus2 valign=Center>
                      <button 
                      class="btn btn-success btn-sm"   
                      type="button" 
                      id="btnDatosGuardar" 
                      onClick="JavaScript:RemisionGuarda()" 
                      style="width:148px;height:28px"
                      >
                      Guardar
                      </button>
                    </td>
                    <td width=50 aling=Center><div id=ClaveStatus2 valign=Center>
                      &nbsp;
                    </td>
                  </tr>
                </tbody>
                </table>
                <div id='Insumos123'>                
                </div>
              </div>
            </div>
        </div>
        <div class="col-3 d-none d-xl-block">
          <div class="nav-section">
          
          </div>
        </div>
      </div>
