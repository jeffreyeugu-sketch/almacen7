  <?php
    $username = "";
    if (isset($_SESSION["username"]))
    {
      $username = $_SESSION["username"];
    }
  ?>
  <div class="main-header" >
      <a href="#" class="logo d-none d-lg-flex">
        <img src="../../../dist/img/logo.svg" alt="Logo" id="main-logo">
        TICCMED - Desarrollo
      </a>
      <a class="nav-link nav-link-faded rounded-circle nav-icon d-lg-none" href="#" data-toggle="sidebar">
        <i class="material-icons">menu</i>
      </a>
      <form class="form-inline ml-3 d-none d-md-flex">
        <span class="input-icon">
          <i class="material-icons">search</i>
            <input type="text" placeholder="Buscar en todo el sitio" class="form-control bg-gray-200 border-gray-200 rounded-lg">
        </span >
      </form>    
      <ul class="nav nav-circle ml-auto">
        <li class="nav-item d-md-none"><a class="nav-link nav-link-faded nav-icon" data-toggle="modal" href="#searchModal"><i class="material-icons">search</i></a></li>
        <li class="nav-item d-none d-sm-block"><a class="nav-link nav-link-faded nav-icon" href="" id="refreshPage"><i class="material-icons">refresh</i></a></li>
        <li class="nav-item dropdown nav-notif">
          <a class="nav-link nav-link-faded nav-icon has-badge dropdown-toggle no-caret" href="#" data-toggle="dropdown" data-display="static">
            <i data-feather="bell"></i>
            <span class="badge badge-pill badge-danger">4</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right p-0">
            <div class="card">
              <div class="card-header bg-primary text-white">
                <i data-feather="bell" class="mr-2"></i>4 Notificaciones
              </div>
              <div class="card-body p-0 pt-1">
                <div class="list-group list-group-sm list-group-flush">
                  <a href="javascript:void(0)" class="list-group-item list-group-item-action">
                    <div class="media">
                      <span class="bg-primary text-white btn-icon rounded-circle"><i data-feather="user-plus"></i></span>
                      <div class="media-body ml-2">
                        <p class="mb-0">5 Resultados Nuevos</p>
                        <small class="text-secondary">
                          <i class="material-icons icon-inline mr-1">access_time</i>Hace 5 minutes
                        </small>
                      </div>
                    </div>
                  </a>
                  <a href="javascript:void(0)" class="list-group-item list-group-item-action">
                    <div class="media">
                      <span class="bg-info text-white btn-icon rounded-circle"><i data-feather="message-square"></i></span>
                      <div class="media-body ml-2">
                        <p class="mb-0">2 Mensajes de la Recepción del Laboratorio</p>
                        <small class="text-secondary">
                          <i class="material-icons icon-inline mr-1">access_time</i>10 minutes ago
                        </small>
                      </div>
                    </div>
                  </a>
                  <a href="javascript:void(0)" class="list-group-item list-group-item-action">
                    <div class="media">
                      <span class="bg-info text-white btn-icon rounded-circle"><i data-feather="message-square"></i></span>
                      <div class="media-body ml-2">
                        <p class="mb-0">5 Mensajes del Jefe de Laboratorio</p>
                        <small class="text-secondary">
                          <i class="material-icons icon-inline mr-1">access_time</i>10 minutes ago
                        </small>
                      </div>
                    </div>
                  </a>
                  <a href="javascript:void(0)" class="list-group-item list-group-item-action">
                    <div class="media">
                      <span class="bg-success text-white btn-icon rounded-circle"><i data-feather="shopping-bag"></i></span>
                      <div class="media-body ml-2">
                        <p class="mb-0">1 Mensaje de Mercaotecnía<br></p>
                        <small class="text-secondary">
                          <i class="material-icons icon-inline mr-1">access_time</i>Hace 15 minutos
                        </small>
                      </div>
                    </div>
                  </a>
                  <a href="javascript:void(0)" class="list-group-item list-group-item-action">
                    <div class="media">
                      <span class="bg-warning text-white btn-icon rounded-circle"><i data-feather="user-check"></i></span>
                      <div class="media-body ml-2">
                        <p class="mb-0">Complete your account details</p>
                        <small class="text-secondary">
                          <i class="material-icons icon-inline mr-1">access_time</i>20 minutes ago
                        </small>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
              <br>hola mundo
              <div class="card-footer justify-content-center">
                <a href="javascript:void(0)">View more &rsaquo;</a>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item dropdown ml-2">
          <a class="nav-link nav-link-faded rounded nav-link-img dropdown-toggle px-2" href="#" data-toggle="dropdown" data-display="static">
            <img src="../../../dist/img/user.svg" alt="Admin" class="rounded-circle mr-2">
            <span class="d-none d-sm-block"><?php echo $username ?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right pt-0 overflow-hidden">
            <div class="media align-items-center bg-primary text-white px-4 py-3 mb-2">
              <img src="../../../dist/img/user.svg" 4alt="Admin" class="rounded-circle" width="50" height="50">
              <div class="media-body ml-2 text-nowrap">
                <h6 class="mb-0">Raul Aquino Silva</h6>
                <span class="text-gray-400 font-size-sm">raul@aquino.com</span>
              </div>
            </div>
            <a class="dropdown-item has-icon" href="javascript:void(0)"><i class="mr-2" data-feather="user"></i>Perfil del Usuario</a>
            <a class="dropdown-item has-icon" href="#_configuracion.php"><i class="mr-2" data-feather="settings"></i>Configurar sistema</a>
            <a class="dropdown-item has-icon text-danger" href="javascript:Sesion_Termina()"><i class="mr-2" data-feather="log-out"></i>Salir</a>
          </div>
        </li>
      </ul>
    </div>
    <!-- Cerrar sesion -->
    <script>
    </script>
    <!-- /Cearrar sesion -->