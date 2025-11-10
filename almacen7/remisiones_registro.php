  <?php
    include ("../mysql2.php");
    $NoReg = 0;
    if (isset($_POST['NoReg']) and $_POST['NoReg']<>"") 
    {
      $NoReg = $_POST['NoReg'];
      $sql = "";
      $sql.= "select * from cat_dev_areas where NoReg = " . $_POST['NoReg'];
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
              <div class="card-body"><b>Registro de remisiones<b>
                <form>
                  <table class="table table-bordered table-form">
                    <tbody>
                      <tr>
                        <td><label for="firstNameTableForm">Remision</label></td>
                        <td><input type="text" class="form-control" id="Remision" placeholder="Escriba la Clave del Registro"
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
                        <td><label for="languageTableForm">Proveedor</label></td>
                        <td>
                          <select class="custom-select" id="IdProveedor"
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
                            $sql   = $sql . "select * from cat_dev_proveedores ";
                            $rp1 = $dbh->prepare($sql);
                            $rp1->execute();
                            while ($rss= $rp1->fetch(PDO::FETCH_LAZY))
                            {
                              echo "<option value='" . $rss['NoReg'] . "' ";
                              if ($rss['NoReg']==$rs['IdLaboratorio'])
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
                        <td><label for="lastNameTableForm">Fecha de Remisi&oacute;n</label></td>
                        <td><input type="text" class="form-control datepicker"  id="Fecha" placeholder="Capture la fechas der la remision"
                        onFocus="JavaScript:FocoToma(this)" 
                        onBlur="JavaScript:FocoPierde(this)"					
                        ></td>
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
                  <button class="btn btn-secondary" type="reset"  id="btnDatosModifica" onClick="JavaScript:Cat_dev_Remisiones_Modifica()" 
                  <?php
                    if ($NoReg==0)
                    {
                      ?>
                        disabled
                      <?php

                    }
                    else
                    {
                    }
                    ?>
                    >Modificar</button>
                  <button class="btn btn-success"   type="button" id="btnDatosGuardar" onClick="JavaScript:Cat_Dev_Remisiones_Guardar(<?php echo $NoReg ?>)" 
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
                  >Guardar</button>
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