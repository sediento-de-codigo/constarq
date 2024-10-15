<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Consulta el estado de su tarjeta de circulación - Municipalidad Provincial de Paita</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Custom Stylesheet -->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <link href="<?= URL::to("public/assets/vendor/sweetalert2/dist/sweetalert2.min.css") ?>" rel="stylesheet">
  <link href="<?= URL::to("public/assets/vendor/jquery-nice-select/css/nice-select.css") ?>" rel="stylesheet" />
  <link href="<?= URL::to("public/assets/css/style.css") ?>" rel="stylesheet" />

</head>

<body data-urlbase="<?= URL::base(); ?>">
  <!--** Preloader start **-->
  <div id="preloader">
    <div class="lds-ripple">
      <div></div>
      <div></div>
    </div>
  </div>
  <!--** Preloader end ***-->

  <div class="p-2">
    <div class="container">
      <div class="col-4 col-md-2 p-2">
        <img src="<?= URL::base() . '/public/assets/images/logo.png' ?>" class="img-fluid" alt="">
      </div>
    </div>
  </div>

  <div class="">
    <div class="col-12 col-md-5 col-lg-3 mx-auto shadow card p-3">
      <h4 class="fw-bold text-center">Consulte el estado de su tarjeta de circulación</h4>
      <div class="row">
        <form onsubmit="obtenerUltimaTarjetaPorPlaca(true)">
          <div class="">
            <div class="row text-center p-3">
              <a id="btn-scan-qr" href="#" onclick="encenderCamara()">
                <img src="https://assets-v2.lottiefiles.com/a/f1a5aefe-116e-11ee-8abb-fbf02196d0e2/s3ml6SURs3.gif" class="img-fluid text-center">
                <a />
                <canvas hidden="" id="qr-canvas" class="w-100"></canvas>
                <span class="fw-bold text-primary">Presione sobre la imagen <i class="fa-solid fa-hand-point-up fa-lg"></i></span>
            </div>
            <div class="row mx-2 my-2">
              <button class="btn btn-warning btn-sm w-100" type="button" onclick="cerrarCamara()">Detener camara</button>
            </div>
          </div>
          <input type="text" class="form-control my-2" placeholder="Digite la placa" id="placaConsulta">
          <div class="g-recaptcha" data-sitekey="6LeRtKYpAAAAAK11WOcyPrnKCbUTqy4qnAFAehx6"></div>
          <button class="btn btn-primary btn-sm w-100 mt-1" type="submit">Burcar por placa</button>
        </form>
      </div>
    </div>
  </div>

  <!-- modal detalle -->
  <div class="modal fade" id="modalDetalleQr" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fw-bold mx-auto" id="staticBackdropLabel">Detalle consulta</h5>
        </div>
        <div class="modal-body">
          <div class="col-3 col-md-2">
            <img src="<?= URL::base() . '/public/assets/images/logo.png' ?>" class="img-fluid" alt="">
          </div>
          <table class="table table-responsive-sm table-sm">
            <tr>
              <td colspan="4" class="text-center fw-bold" style="text-transform: uppercase;">Datos del vehiculo</td>
            </tr>
            <tr>
              <td class="fw-bold">Tipo de vehiculo:</td>
              <td id="tipoVehiculo"></td>
              <td class="fw-bold">Empresa:</td>
              <td id="empresa"></td>
            </tr>
            <tr>
              <td class="fw-bold">Placa:</td>
              <td id="placa"></td>
              <td class="fw-bold">Marca:</td>
              <td id="marca"></td>
            </tr>
            <tr>
              <td class="fw-bold">Color:</td>
              <td id="color"></td>
              <td class="fw-bold">Propietario:</td>
              <td id="propietario"></td>
            </tr>
            <tr>
              <td class="fw-bold">DNI:</td>
              <td id="dniPropietario"></td>
              <td class="fw-bold">Ruta:</td>
              <td id="ruta"></td>
            </tr>
            <tr>
              <td class="fw-bold">Resolución:</td>
              <td id="resolucion"></td>
              <td class="fw-bold">Fecha de emisión:</td>
              <td id="fechaEmision"></td>
            </tr>
            <tr>
              <td class="fw-bold">Fecha de caducidad:</td>
              <td id="fechaCaducidad"></td>
              <td class="fw-bold">Estado:</td>
              <td id="estadoTarjeta"></td>
            </tr>
            <tr>
              <td class="fw-bold">Nro. Tarjeta:</td>
              <td id="nroTarjeta"></td>
              <td class="fw-bold"></td>
              <td></td>
            </tr>
          </table>

          <table class="table table-responsive-sm table-sm">
            <tr>
              <td colspan="4" class="text-center fw-bold" style="text-transform: uppercase;">Datos del conductor</td>
            </tr>
            <tr>
              <td class="fw-bold">Nombres:</td>
              <td id="conductor"></td>
              <td class="fw-bold">DNI:</td>
              <td id="dniConductor"></td>
            </tr>
            <tr>
              <td class="fw-bold">Licencia:</td>
              <td id="licencia"></td>
              <td class="fw-bold">Clase:</td>
              <td id="clase"></td>
            </tr>
            <tr>
              <td class="fw-bold">Categoria:</td>
              <td id="categoria"></td>
              <td class="fw-bold"></td>
              <td></td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-danger" data-id_tarjeta id="descargaTarjetaPDF" onclick="generarTarjetaPDF(this)">Descargar PDF</button>
          <button type="button" class="btn btn-sm btn-dark" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- fin modal detalle -->

  <script src="<?= URL::to("public/assets/vendor/global/global.min.js") ?>"></script>
  <script src="<?= URL::to("public/assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js") ?>"></script>

  <script src="<?= URL::to("public/assets/vendor/sweetalert2/dist/sweetalert2.min.js") ?>"></script>
  <script src="<?= URL::to("public/assets/js/custom.min.js") ?>"></script>
  <script src="<?= URL::to("public/assets/js/dlabnav-init.js") ?>"></script>
  <script src="<?= URL::to("public/assets/js/demo.js") ?>"></script>
  <script src="<?= URL::to("public/assets/js/styleSwitcher.js") ?>"></script>
  <script src="<?= URL::to("public/assets/js/global/app.global.js") ?>"></script>
  <script src="<?= URL::to("public/assets/js/global/rutas.js") ?>"></script>
  <script src="<?= URL::to("public/assets/plugins/qrCode.min.js") ?>"></script>
  <script src="<?= URL::to("public/assets/js/modulos/consultaTarjetas.js") ?>"></script>
</body>

</html>