<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Constarq</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Custom Stylesheet -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body style="background-color: rgba(0, 0, 0, 0.02);" data-urlbase="<?= URL::base(); ?>">
  <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="col-xs-5 col-lg-4 col-md-8 col-sm-12 card-login shadow bg-white p-3 rounded-3">
      <form class="d-flex flex-column" onsubmit="validarUsuarioLogin(this)">
        <div class="p-3">
          <img src="./public/assets/images/logo.png" class="mx-auto img-fluid" alt="gyt">
        </div>
        <MARQUEE class="mx-2 text-uppercase my-2"> INGRESE SU USUARIO Y CONTRASEÑA </MARQUEE>
        <div class="input-group mt-3">
          <span class="input-group-text" id="basic-addon1">
            <i class="fa-solid fa-user"></i>
          </span>
          <input type="text" class="form-control" data-validate name="USU_user" placeholder="Usuario" aria-label="Username" aria-describedby="basic-addon1"><br>
        </div>
        <div class="input-group mt-3">
          <span class="input-group-text verContra" id="basic-addon1">
            <i class="fa-solid fa-eye text-dark"></i>
          </span>
          <input type="password" id="verContra" data-validate name="USU_password" class="form-control" placeholder="Contraseña" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <button type="submit" class="btn text-white mt-3" style="background-color: #dc3545;">Ingresar</button>
      </form>
    </div>
  </div>

  <!-- modulos -->
  <script src="<?= URL::to("public/assets/js/global/app.global.js") ?>"></script>
  <script src="<?= URL::to("public/assets/js/global/rutas.js") ?>"></script>
  <script src="<?= URL::to("public/assets/js/modulos/usuarios.js") ?>"></script>

</body>

</html>