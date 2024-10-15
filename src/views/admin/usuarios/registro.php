<?php include "./src/includes/header.php"; ?>

<div class="">
  <div class="row page-titles mb-3">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active">
        <a href="javascript:void(0)">Inicio</a>
      </li>
      <li class="breadcrumb-item">
        <a href="javascript:void(0)">Usuarios</a>
      </li>
      <li class="breadcrumb-item">
        <a href="javascript:void(0)">Registro</a>
      </li>
    </ol>
  </div>
  <div>
    <form onsubmit="registrarUsuario(this)">
      <div class="card p-3">
        <div class="row py-5">
          <div class="col-12 col-md-12 col-lg-8 mx-auto">
            <div class="row">
              <div class="col-12 col-lg-6">
                <label>Usuario</label>
                <input type="text" class="form-control form-control-sm mb-2" data-validate name="USU_user">
              </div>
              <div class="col-12 col-lg-6">
                <label>Contraseña</label>
                <input type="text" class="form-control form-control-sm mb-2" data-validate name="USU_password">
              </div>
              <div class="col-12 col-lg-6">
                <label>Rol</label>
                <select name="USU_rol" class="form-control default-select wide" data-validate>
                  <option value="" disabled selected>Selecciona una opción</option>
                  <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                  <option value="VENDEDOR">VENDEDOR</option>
                </select>
              </div>
              <div class="col-12 col-lg-6">
                <label>Nombres</label>
                <input type="text" class="form-control form-control-sm mb-2" data-validate name="USU_nombres">
              </div>
              <div class="col-12 col-lg-6">
                <label>Apellidos</label>
                <input type="text" class="form-control form-control-sm mb-2" data-validate name="USU_apellidos">
              </div>
              <div class="col-12 col-lg-6">
                <label>Correo</label>
                <input type="email" class="form-control form-control-sm mb-2" data-validate name="USU_correo">
              </div>
              <div class="col-12 col-lg-6">
                <label>Teléfono</label>
                <input type="text" class="form-control form-control-sm mb-2" data-validate name="USU_telefono">
              </div>
            </div>

            <div class="text-end">
              <button type="submit" class="btn btn-sm btn-primary float-right mt-3">Guardar</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

<?php include "./src/includes/footer.php"; ?>
<script src="<?= URL::to("public/assets/js/modulos/usuarios.js") ?>" type="text/javascript"></script>