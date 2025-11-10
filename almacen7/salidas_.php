      <div class="card">
        <div class="card-body">
          <table id="example" class="table table-striped table-bordered table-sm dt-responsive nowrap w-100">
            <thead>
              <tr class="column-filter dt-column-filter">
                <th width=80px><input type="text" class="form-control form-control-sm" placeholder=""></th>
                <th><input type="text" class="form-control form-control-sm" placeholder=""></th>
                <th><input type="text" class="form-control form-control-sm" placeholder=""></th>
                <th><input type="text" class="form-control form-control-sm" placeholder=""></th>
                <th><input type="text" class="form-control form-control-sm" placeholder=""></th>
                <th><input type="text" class="form-control form-control-sm" placeholder=""></th>
                <th width=100px><input type="text" class="form-control form-control-sm" placeholder=""></th>
                <th></th>
              </tr>
              <tr>
                <th>Fecha</th>
                <th>Clave</th>
                <th>Nombre</th>
                <th>Equipo</th>
                <th>Tipo</th>
                <th>Observaciones</th>
                <th>Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
                include ("../mysql.php");
                $sql = "";
                $sql = $sql . "SELECT a.*, i.* ";
                $sql = $sql . "from _almacen a ";
                $sql = $sql . "left join cat_dev_insumos i ON a.NoRegInsumo = i.NoReg ";
                $sql = $sql . "where a.TipoMov='S' ";
                $rsp = odbc_exec($conn,$sql);
                {
                  while (odbc_fetch_row($rsp))
                  {
                    ?>
                    <tr 
                      ondblclick=Salidas_Consulta(<?php echo odbc_result($rsp,"NoMov") ?>)
                      >
                      <td><?php echo odbc_result($rsp,"FechaR") ?></td>
                      <td><?php echo odbc_result($rsp,"Clave") ?></td>
                      <td><?php echo odbc_result($rsp,"Nombre") ?></td>
                      <td><?php echo odbc_result($rsp,"IdEquipo_Nombre") ?></td>
                      <td><?php echo odbc_result($rsp,"IdTipo_Nombre") ?></td>
                      <td><?php echo odbc_result($rsp,"Obs") ?></td>
                      <td><?php echo odbc_result($rsp,"StatusN") ?></td>
                      <td class="text-center">
                        <div class="btn-group btn-group-xs" role="group">
                          <a href=JavaScript:Cat_Dev_Fabricantes_Consulta(<?php echo odbc_result($rsp,"NoREg") ?>) class="btn btn-link btn-icon bigger-130 text-success"><i data-feather="edit"></i></a>
                          <a href=JavaScript:alert('1') class="btn btn-link btn-icon bigger-130 text-danger"><i data-feather="trash"></i></a>
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
      <script>
        var plugins = [
          '../../../plugins/datatables/dataTables.bootstrap4.min.css',
          '../../../plugins/datatables/responsive.bootstrap4.min.css',
          '../../../plugins/datatables/jquery.dataTables.bootstrap4.responsive.min.js',
        ]
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
      </script>