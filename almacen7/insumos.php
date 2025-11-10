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
                <th></th>
                <th></th>
                <th><input type="text" class="form-control form-control-sm" placeholder=""></th>
                <th></th>
              </tr>
              <tr>
                <th>No. Reg</th>
                <th>Clave</th>
                <th>Nombre</th>
                <th>Equipo</th>
                <th>Tipo</th>
                <th>Min/Max</th>
                <th>Existencia</th>
                <th>Denominación</th>
                <th>Equivalencia</th>
              </tr>
            </thead>
            <tbody>
              <?php
                include ("../mysql.php");
                $sql = "";
                $sql = $sql . "select i.* ";
                $sql = $sql . ", sum(if(a.TipoMov='E',a.Cantidad,0)) - sum(if(a.TipoMov='S',a.Cantidad,0)) AS Existencia ";
                $sql = $sql . "from cat_dev_insumos i ";
                $sql = $sql . "left join _almacen a ON i.NoREg=a.NoRegIns ";
                $sql = $sql . "group by i.NoReg ";
                odbc_exec($conn,"SET SESSION sql_mode = '';");
                //echo $sql;
                $rsp = odbc_exec($conn,$sql);
                {
                  while (odbc_fetch_row($rsp))
                  {
                    ?>
                    <tr 
                      ondblclick=Insumos_Consulta(<?php echo odbc_result($rsp,"NoREg") ?>)
                      >
                      <td><?php echo odbc_result($rsp,"NoREg") ?></td>
                      <td><?php echo odbc_result($rsp,"Clave") ?></td>
                      <td><?php echo odbc_result($rsp,"Nombre") ?></td>
                      <td><?php echo odbc_result($rsp,"IdEquipo_Nombre") ?></td>
                      <td><?php echo odbc_result($rsp,"IdTipo_Nombre") ?></td>
                      <td><?php echo odbc_result($rsp,"Minimo") . " - " . odbc_result($rsp,"Maximo")?></td>
                      <td><?php echo odbc_result($rsp,"Existencia") ?></td>
                      <td><?php echo odbc_result($rsp,"IdPresentacion_Nombre") ?></td>
                      <td><?php echo odbc_result($rsp,"Consumo") ?></td>
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