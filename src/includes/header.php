<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Custom Stylesheet -->
  <link rel="stylesheet" href="<?= URL::to("public/assets/vendor/select2/css/select2.min.css") ?>">
  <link href="<?= URL::to("public/assets/vendor/datatables/css/jquery.dataTables.min.css") ?>" rel="stylesheet">
  <link href="<?= URL::to("public/assets/vendor/sweetalert2/dist/sweetalert2.min.css") ?>" rel="stylesheet">
  <link href="<?= URL::to("public/assets/vendor/jquery-nice-select/css/nice-select.css") ?>" rel="stylesheet" />
  <link href="<?= URL::to("public/assets/css/style.css") ?>" rel="stylesheet" />

</head>

<body data-urlbase="<?= URL::base(); ?>" data-admin_panel>
  <!--** Preloader start **-->
  <div id="preloader">
    <div class="lds-ripple">
      <div></div>
      <div></div>
    </div>
  </div>
  <!--** Preloader end ***-->

  <!--**  Main wrapper start **-->
  <div id="main-wrapper">
    <!--** Nav header start **-->
    <div class="nav-header">
      <a href="javascript:void()" class="brand-logo">
        <i class="fa-solid fa-c fa-3x" style="color: #dc3545;"></i>
        <div class="brand-title">
          <h2 class="">CONSTARQ</h2>
          <span class="brand-sub-title">Panel de administración</span>
        </div>
      </a>
      <div class="nav-control">
        <div class="hamburger">
          <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
      </div>
    </div>
    <!--** Nav header end **-->
    <!--** Header start **-->
    <div class="header">
      <div class="header-content">
        <nav class="navbar navbar-expand">
          <div class="collapse navbar-collapse justify-content-between">
            <div class="header-left">
              <div class="dashboard_bar"></div>
            </div>
            <ul class="navbar-nav header-right">
              <!-- <li class="nav-item">
                <a class="nav-link" href="javascript:void(0);" id="btnDarkLightMode">
                  <img src="<?= URL::base() . '/public/assets/images/sun.png' ?>" data-version_to="light" class="img-sun-mode theme_version_icon" width="56" alt="" />
                  <img src="<?= URL::base() . '/public/assets/images/moon.png' ?>" data-version_to="dark" class="img-moon-mode theme_version_icon" width="56" alt="" />
                </a>
              </li> -->
              <li class="nav-item dropdown header-profile">
                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                  <img src="<?= URL::base() . '/public/assets/images/user.jpg' ?>" width="56" alt="" />
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                  <a href="#" class="dropdown-item ai-icon">
                    <span class="ms-2"><?= SessionManager::get("userGlobal")["nombreCompleto"] ?></span>
                  </a>
                  <a href="<?= URL::base() . '/admin/usuarios/cerrar_session' ?>" class="dropdown-item ai-icon">
                    <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                      <polyline points="16 17 21 12 16 7"></polyline>
                      <line x1="21" y1="12" x2="9" y2="12"></line>
                    </svg>
                    <span class="ms-2">Cerrar sesión </span>
                  </a>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>

    <?php include_once("./src/includes/sidebar.php") ?>

    <!--** Content body start **-->
    <div class="content-body">
      <div class="container-fluid">