  <?php
    include ("../mysql2.php");
    $NoReg = 0;
    if (isset($_POST['NoReg']) and $_POST['NoReg']<>"") 
    {      
      $NoReg = $_POST['NoReg'];
      $sql = "";
      $sql.= "select * from cat_dev_insumos where NoReg = " . $_POST['NoReg'];
      //*echo $sql;
      $rp = $dbh->prepare($sql);
      $rp->execute();
      $num_row=$rp->rowCount();
      if ($num_row>0)
      {
        $rs = $rp->fetch(PDO::FETCH_LAZY);
      }
    }
    ?>
      <div class="row">
        <div class="col">
            <div class="card">
              <div class="card-body"><b>Consulta de insumos y/o reacticvos</b>
                <form>
                  <table class="table table-bordered table-form">
                    <tbody>
                      <tr>
                        <td><label for="firstNameTableForm">Clave</label></td>
                        <td><input type="text" class="form-control" id="Clave" placeholder="Escriba la Clave del Registro"
                        <?php                        
                        if ($NoReg==0)
                        {
                        }
                        else
                        {
                          ?>
                            value="<?php echo $rs['Clave'] ?>"
                            disabled
                          <?php
                        }
                        ?>
                        onFocus="JavaScript:FocoToma(this)" 
                        onBlur="JavaScript:FocoPierde(this)"
                        ></td>
                      </tr>
                      <tr>
                        <td><label for="languageTableForm">Status</label></td>
                        <td>
                          <select class="custom-select" id="Status"
                          <?php                        
                          if ($NoReg==0)
                          {
                          }
                          else
                          {
                            ?>
                              disabled
                            <?php
                          }
                          ?>
                          onFocus="JavaScript:FocoToma(this)" 
                          onBlur="JavaScript:FocoPierde(this)"
                          >
                            <option value='1'<?php
                            if ($rs['status']==1)
                              echo " selected ";
                            ?>>Activo</option>
                            <option value='2'<?php
                            if ($rs['status']==2)
                              echo " selected ";
                            ?>>Inactivo</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td><label for="lastNameTableForm">Nombre</label></td>
                        <td><input type="text" class="form-control" id="Nombre" placeholder="Escriba el Nombre del Registro"
                        <?php
                        if ($NoReg==0)
                        {

                        }
                        else
                        {
                          ?>
                            value="<?php echo $rs['Nombre'] ?>" 
                            disabled
                          <?php
                        }
                        ?>
                        onFocus="JavaScript:FocoToma(this)" 
                        onBlur="JavaScript:FocoPierde(this)"					
                        ></td>
                      </tr>
                      <tr>
                        <td><label for="languageTableForm">Tipo</label></td>
                        <td>
                          <select class="custom-select" id="IdTipo"
                          <?php                        
                          if ($NoReg==0)
                          {
                          }
                          else
                          {
                            ?>
                              disabled
                            <?php
                          }
                          ?>
                          onFocus="JavaScript:FocoToma(this)" 
                          onBlur="JavaScript:FocoPierde(this)"
                          >
                          <option value='0'></option>
                          <?php
                            $sql   = "";
                            $sql   = $sql . "select * from cat_dev_tipo_insumo order by orden ";
                            $rp1 = $dbh->prepare($sql);
                            $rp1->execute();
                            while ($rss= $rp1->fetch(PDO::FETCH_LAZY))
                            {
                              echo "<option value='" . $rss['NoReg'] . "' ";
                              if ($rss['NoReg']==$rs['IdTipo'])
                              {
                                echo " selected ";
                              }
                              echo ">" . $rss['Nombre'] . " (" . $rss['Clave'] . ")</option>";
                              $i++;
                            }          
                            ?>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td><label for="languageTableForm">Equipo</label></td>
                        <td>
                          <select class="custom-select" id="IdEquipo" 
                          <?php                        
                          if ($NoReg==0)
                          {
                          }
                          else
                          {
                            ?>
                              disabled
                            <?php
                          }
                          ?>
                          onFocus="JavaScript:FocoToma(this)" 
                          onBlur="JavaScript:FocoPierde(this)"
                          >
                          <option value='0'></option>
                          <?php
                            $sql   = "";
                            $sql   = $sql . "select * from cat_dev_equipos order by orden ";
                            $rp1 = $dbh->prepare($sql);
                            $rp1->execute();
                            while ($rss= $rp1->fetch(PDO::FETCH_LAZY))
                            {
                              echo "<option value='" . $rss['NoReg'] . "' ";
                              if ($rss['NoReg']==$rs['IdEquipo'])
                              {
                                echo " selected ";
                              }
                              echo ">" . $rss['Nombre'] . " (" . $rss['Clave'] . ")</option>";
                              $i++;
                            }          
                            ?>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td><label for="languageTableForm">Presentación</label></td>
                        <td>
                          <select class="custom-select" id="IdPresentacion"
                          <?php                        
                          if ($NoReg==0)
                          {
                          }
                          else
                          {
                            ?>
                              disabled
                            <?php
                          }
                          ?>
                          onFocus="JavaScript:FocoToma(this)" 
                          onBlur="JavaScript:FocoPierde(this)"
                          >
                          <option value='0'></option>
                          <?php
                            $sql   = "";
                            $sql   = $sql . "select * from cat_dev_presentacion order by orden ";
                            $rp1 = $dbh->prepare($sql);
                            $rp1->execute();
                            while ($rss= $rp1->fetch(PDO::FETCH_LAZY))
                            {
                              echo "<option value='" . $rss['NoReg'] . "' ";
                              if ($rss['NoReg']==$rs['IdPresentacion'])
                              {
                                echo " selected ";
                              }
                              echo ">" . $rss['Nombre'] . " (" . $rss['Clave'] . ")</option>";
                              $i++;
                            }          
                            ?>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td><label for="lastNameTableForm">Rendimiento</label></td>
                        <td><input type="text" class="form-control" id="Rendimiento" placeholder="Capture la cantidad de pruebas por presentación"
                        <?php
                        if ($NoReg==0)
                        {

                        }
                        else
                        {
                          ?>
                            value="<?php echo $rs['Rendimiento'] ?>" 
                            disabled
                          <?php
                        }
                        ?>
                        onFocus="JavaScript:FocoToma(this)" 
                        onBlur="JavaScript:FocoPierde(this)"					
                        ></td>
                      </tr>
                      <tr>
                        <td><label for="lastNameTableForm">Consumo minimo</label></td>
                        <td><input type="text" class="form-control" id="Minimo" placeholder="Establesca el consumo minimo"
                        <?php
                        if ($NoReg==0)
                        {

                        }
                        else
                        {
                          ?>
                            value="<?php echo $rs['Minimo'] ?>" 
                            disabled
                          <?php
                        }
                        ?>
                        onFocus="JavaScript:FocoToma(this)" 
                        onBlur="JavaScript:FocoPierde(this)"					
                        ></td>
                      </tr>
                      <tr>
                        <td><label for="lastNameTableForm">Consumo maximo</label></td>
                        <td><input type="text" class="form-control" id="Maximo" placeholder="Establesca el consumo maximo"
                        <?php
                        if ($NoReg==0)
                        {

                        }
                        else
                        {
                          ?>
                            value="<?php echo $rs['Maximo'] ?>" 
                            disabled
                          <?php
                        }
                        ?>
                        onFocus="JavaScript:FocoToma(this)" 
                        onBlur="JavaScript:FocoPierde(this)"					
                        ></td>
                      </tr>
                      <tr>
                        <td><label for="lastNameTableForm">Consumo Mensual</label></td>
                        <td><input type="text" class="form-control" id="Consumo" placeholder="Escriba el promedio mensual"
                        <?php
                        if ($NoReg==0)
                        {

                        }
                        else
                        {
                          ?>
                            value="<?php echo $rs['Consumo'] ?>" 
                            disabled
                          <?php
                        }
                        ?>
                        onFocus="JavaScript:FocoToma(this)" 
                        onBlur="JavaScript:FocoPierde(this)"					
                        ></td>
                      </tr>
                      <tr>
                        <td>Caducidad S/N</td>
                        <td class="pl-1" id=tdCaducaSN 
 
                        <?php
                          if ($NoReg==0)
                          {

                          }
                          else
                          {
                            ?>
                              disabled
                              style = 'background-color: #EDF2F7'
                            <?php
                          }
                          ?>
                          >
                          <div class="custom-control custom-checkbox form-control " id=divCaducaSN 
                          <?php
                          if ($NoReg==0)
                          {

                          }
                          else
                          {
                            ?>
                              disabled
                              style = 'background-color: #EDF2F7'
                            <?php
                          }
                          ?>                          
                          >
                            <input type="checkbox" class="custom-control-input" id="CaducaSN" 
 
                            <?php
                          if ($NoReg==0)
                          {

                          }
                          else
                          {
                            if ($rs["CaducaSN"]==1)
                            {
                              ?> checked <?php
                            }
                            ?>
                              disabled
                            <?php
                          }
                          ?>                            >
                            <label class="custom-control-label" for="CaducaSN" id="lblCaducaSN" >Capturar fecha</label>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td><label for="languageTableForm">Ubicación</label></td>
                        <td>
                          <select class="custom-select" id="IdUbicacion"
                          <?php                        
                          if ($NoReg==0)
                          {
                          }
                          else
                          {
                            ?>
                              disabled
                            <?php
                          }
                          ?>
                          onFocus="JavaScript:FocoToma(this)" 
                          onBlur="JavaScript:FocoPierde(this)"
                          >
                          <option value='0'></option>
                          <?php
                            $sql   = "";
                            $sql   = $sql . "select * from cat_dev_ubicaciones order by orden ";
                            $rp1 = $dbh->prepare($sql);
                            $rp1->execute();
                            while ($rss= $rp1->fetch(PDO::FETCH_LAZY))
                            {
                              echo "<option value='" . $rss['NoReg'] . "' ";
                              if ($rss['NoReg']==$rs['IdUbicacion'])
                              {
                                echo " selected ";
                              }
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
                        <?php
                        if ($NoReg==0)
                        {

                        }
                        else
                        {
                          ?>
                            disabled
                          <?php
                        }
                        ?>
                        onFocus="JavaScript:FocoToma(this)" 
                        onBlur="JavaScript:FocoPierde(this)"					
                       ><?php
                        if ($NoReg==0)
                        {

                        }
                        else
                        {
                          echo $rs['Obs'];
                        }
                        ?></textarea></td>
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
              <div class="card-body">Detalle de movimientos
              </div>
            </div>
        </div>
        <div class="col-3 d-none d-xl-block">
          <div class="nav-section">
            Indicaciones
          </div>
        </div>
      </div>
