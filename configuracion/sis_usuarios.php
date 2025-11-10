      <div class="card">
        <div class="card-body">
          <table id="example" class="table table-striped table-bordered table-sm dt-responsive nowrap w-100">
            <thead>
              <tr class="column-filter dt-column-filter">
                <th style='width:60px'></th>
                <th><input type="text" class="form-control form-control-sm" placeholder="Busca nombres de Usuario"></th>
                <th><input type="text" class="form-control form-control-sm" placeholder="Busca Claves de Usuario"></th>
                <th><input type="text" class="form-control form-control-sm" placeholder="Status"></th>
                <th style='width:60px'></th>
                <th style='width:60px'></th>
                <th></th>
              </tr>
              <tr>
                <th>No.</th>
                <th>Nombre</th>
                <th>Clave</th>
                <th>Status</th>
                <th>WSIS</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
                include ("../mysql.php");
                $sql = "";
                $sql = $sql . "select * from sis_usuarios ";
                $rsp = odbc_exec($conn,$sql);
                {
                  while (odbc_fetch_row($rsp))
                  {
                    ?>
                    <tr>
                      <td><?php echo odbc_result($rsp,"NoReg") ?></td>
                      <td><?php echo odbc_result($rsp,"Nombre") ?></td>
                      <td><?php echo odbc_result($rsp,"Clave") ?></td>
                      <td><?php echo odbc_result($rsp,"StatusN") ?></td>
                      <td class="text-center">
                        <div class="btn-group btn-group-xs" role="group">
                          <a href="javascript:void(0)" class="btn btn-link btn-icon bigger-130 text-success"><i data-feather="external-link"></i></a>
                        </div>
                      </td>
                      <td class="text-center">
                        <div class="btn-group btn-group-xs" role="group">
                          <i class="btn btn-link btn-icon text-danger" data-feather="phone"></i>
                        </div>
                      </td>
                      <td class="text-center">
                        <div class="btn-group btn-group-xs" role="group">
                          <a href="javascript:void(0)" class="btn btn-link btn-icon bigger-130 text-success"><i data-feather="edit"></i></a>
                          <a href="javascript:void(0)" class="btn btn-link btn-icon bigger-130 text-danger"><i data-feather="trash"></i></a>
                        </div>
                      </td>
                    </tr>
                    <?php
                  }
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>