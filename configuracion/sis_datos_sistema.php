      <div class="row">
        <div class="col">
            <div class="card">
              <div class="card-body">
                <form>
                  <table class="table table-bordered table-form">
                    <tbody>
                      <?php
                      include ("../mysql.php");
                      $sql = "";
                      $sql = $sql . "select * from sis_info";  
                      $rs  = odbc_exec($conn,$sql);
                      $txtDomicilio = odbc_result($rs,"Domicilio");
                      ?>
                      <tr>
                        <td><label for="firstNameTableForm">Nombre</label></td>
                        <td><input type="text" value='<?php echo odbc_result($rs,"Nombre") ?>' class="form-control" id="Nombre" placeholder="Escriba el nombre comercial"
                        readonly
                        ></td>
                      </tr>
                      <tr>
                        <td><label for="lastNameTableForm">Institución</label></td>
                        <td><input type="text" value='<?php echo odbc_result($rs,"RazonSocial") ?>' class="form-control" id="RazonSocial" placeholder="Escriba la razón social o el nombre de la Institución"
                        readonly
                        ></td>
                      </tr>
                      <tr>
                        <td><label for="emailTableForm">Email</label></td>
                        <td><input type="email" class="form-control" id="email" placeholder="Escriba el correo electrónico"
                        readonly
                        ></td>
                      </tr>
                      <tr>
                        <td><label for="addressTableForm">Dirección</label></td>
                        <td><textarea class="form-control" id="Domicilio" placeholder="Escriba la dirección" rows="2"
                        readonly
                        ><?php echo str_replace('\n',chr(13), $txtDomicilio) ?></textarea></td>
                      </tr>
                      <!-- tr>
                        <td><label for="languageTableForm">Language</label></td>
                        <td>
                          <select class="custom-select" id="languageTableForm">
                            <option selected="">English</option>
                            <option value="1">Spanish</option>
                            <option value="2">Chinese</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td><label for="avatarTableForm">Profil Picture</label></td>
                        <td>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="avatarTableForm">
                            <label class="custom-file-label" for="avatarTableForm">Choose file</label>
                          </div>
                        </td>
                      </tr -->
                    </tbody>
                  </table>
                  <button class="btn btn-secondary" type="reset"  id="btnDatosSistemaModifica" onClick="Datos_Sistema_Modifica()">Modificar</button>
                  <button class="btn btn-success"   type="button" id="btnDatosSistemaGuardar" onClick="Datos_Sistema_Guardar()" disabled>Guardar</button>
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
