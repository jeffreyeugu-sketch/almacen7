  <?php
    include ("../mysql2.php");
    ?>
      <div class="row">
        <div class="col">
            <div class="card">
              <div class="card-body"><b>Registro de Taspaso</b>
                <form>
                  <table class="table table-bordered table-form">                    
                    <tbody>
                    <tr>
                        <td><label for="languageTableForm">Area Origen</label></td>
                        <td>
                          <select class="custom-select" id="IdEquipo" 
                          disabled
                          onFocus="JavaScript:FocoToma(this)" 
                          onBlur="JavaScript:FocoPierde(this)"
                          >
                          <option value='0'></option>
                          <?php
                            $sql   = "";
                            $sql   = $sql . "select * from cat_dev_areas  where NoReg=0  order by orden ";
                            $rp1 = $dbh->prepare($sql);
                            $rp1->execute();
                            $i=0;
                            while ($rss= $rp1->fetch(PDO::FETCH_LAZY))
                            {
                              echo "<option value='" . $rss['NoReg'] . "' ";
                              echo " selected ";
                              echo ">" . $rss['Nombre'] . " (" . $rss['Clave'] . ")</option>";
                              $i++;
                            }          
                            ?>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td><label for="languageTableForm">Area Destino</label></td>
                        <td>
                          <select class="custom-select" id="IdEquipo" 
                          onFocus="JavaScript:FocoToma(this)" 
                          onBlur="JavaScript:FocoPierde(this)"
                          >
                          <option value='0'></option>
                          <?php
                            $sql   = "";
                            $sql   = $sql . "select * from cat_dev_areas where NoReg<>0 order by orden";
                            $rp1 = $dbh->prepare($sql);
                            $rp1->execute();
                            $i=0;
                            while ($rss= $rp1->fetch(PDO::FETCH_LAZY))
                            {
                              echo "<option value='" . $rss['NoReg'] . "' ";
                              echo " selected ";
                              echo ">" . $rss['Nombre'] . " (" . $rss['Clave'] . ")</option>";
                              $i++;
                            }          
                            ?>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td><label for="addressTableForm">Observación</label></td>
                        <td><textarea class="form-control" id="Obs" placeholder="Escriba una observacio op comentario" rows="2"
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
                <table id="EstudioNuevo" class="table table-striped table-bordered table-sm dt-responsive nowrap w-100" >
                  <!-- /Filter columns -->
                  <tbody>
                    <tr>
                      <td width=45px></td>
                        <td width=110px><input id="ClaveEstudio" type=text class=texto_clave name="ClaveEstudio" 
                          style='
                          border:0px;   
                          width:110px;
                          Position:relative;
                          top:0px;
                          padding-left: 4px;	
                          font-weight:bold;
                          font-size: 12pt;	
                          left:1px' 
                          onkeypress=JavaScript:ClaveEstudioCambio()
                          onKeyup="JavaScript:ClaveEstudioKey(this.value)"
                          onFocus="JavaScript:FocoToma(this)" 
                          onBlur="JavaScript:FocoPierde(this)"
                          >
                        </td>
                        <td width=250>
                            <div id=ClaveStatus ><-Escriba la clave y pulse <Enter></div>
                        </td>
                        <td width=* aling=Center><div id=ClaveStatus2 valign=Center>
                          <button type="button" id='btnCatalogo' onClick=MuestraCatalogo2() data-toggle="modal" data-target="#xlModal" >Ver todo el cataolo</button></div>
                        </td>
                    </tr>
                  </tbody>
              </table>

              </div>
            </div>
        </div>
        <div class="col-3 d-none d-xl-block">
          <div class="nav-section">
          
          </div>
        </div>
      </div>
