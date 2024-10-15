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
        <a href="javascript:void(0)">Consultas</a>
      </li>
    </ol>
  </div>
  <div class="card p-3">
    <div class="table-responsive">
      <table id="dataTableUsuarios" class="display dataTable" style="overflow-y: auto;">
        <thead>
          <tr class="">
            <th>#</th>
            <th>Usuario</th>
            <th>Rol</th>
            <th>Nombres</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Responsable</th>
            <th>Opciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($usuarios as $usuario) : if ($usuario->USU_estado == 0) continue; ?>
            <tr data-table="<?= $usuario->USU_id ?>">
              <td><?= $usuario->USU_id ?></td>
              <td><?= $usuario->USU_user ?></td>
              <td><?= $usuario->USU_rol ?></td>
              <td><?= $usuario->USU_nombres . " " . $usuario->USU_apellidos ?></td>
              <td><?= $usuario->USU_correo ?></td>
              <td><?= $usuario->USU_telefono ?></td>
              <td><?= $usuario->responsable->USU_nombres . " " .  $usuario->responsable->USU_apellidos ?></td>
              <td class="text-center">
                <a href="#" data-bs-toggle="modal" data-bs-target="#modalUsuario" onclick="obtenerUsuario('<?= $usuario->USU_id ?>')" class="text-primary">
                  <i class="fas fa-edit fa-lg"></i>
                </a>
                <a href="#" data-id_proforma='<?= $usuario->USU_id ?>' onclick="eliminarUsuario('<?= $usuario->USU_id ?>')" class="text-primary">
                  <i class="fa-solid fa-trash fa-lg"></i>
                </a>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- modal actualizar -->
<div class="modal fade" id="modalUsuario" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold">Actualizar usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal">
        </button>
      </div>
      <div class="modal-body">

        <form onsubmit="actualizarUsuario(this)">
          <div class="row py-5">
            <div class="col-12 col-lg-6">
              <label>Usuario</label>
              <input type="text" class="form-control form-control-sm mb-2" data-validate name="USU_user" id="USU_user">
              <input type="hidden" id="USU_id" name="USU_id">
            </div>
            <div class="col-12 col-lg-6">
              <label>Contraseña</label>
              <input type="text" class="form-control form-control-sm mb-2" name="USU_password" id="USU_password">
            </div>
            <div class="col-12 col-lg-6">
              <label>Rol</label>
              <select name="USU_rol" class="form-control wide" data-validate id="USU_rol">
                <option value="" disabled selected>Selecciona una opción</option>
                <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                <option value="VENDEDOR">VENDEDOR</option>
              </select>
            </div>
            <div class="col-12 col-lg-6">
              <label>Nombres</label>
              <input type="text" class="form-control form-control-sm mb-2" data-validate name="USU_nombres" id="USU_nombres">
            </div>
            <div class="col-12 col-lg-6">
              <label>Apellidos</label>
              <input type="text" class="form-control form-control-sm mb-2" data-validate name="USU_apellidos" id="USU_apellidos">
            </div>
            <div class="col-12 col-lg-6">
              <label>Correo</label>
              <input type="email" class="form-control form-control-sm mb-2" data-validate name="USU_correo" id="USU_correo">
            </div>
            <div class="col-12 col-lg-6">
              <label>Teléfono</label>
              <input type="text" class="form-control form-control-sm mb-2" data-validate name="USU_telefono" id="USU_telefono" >
            </div>
          <div class="text-end">
            <button type="submit" class="btn btn-sm btn-primary float-right mt-3">Guardar</button>
          </div>
      </div>
      </form>

    </div>
  </div>
</div>
</div>
<!-- fin modal actualizar -->
</div>

<?php include "./src/includes/footer.php"; ?>
<script src="<?= URL::to("public/assets/js/modulos/usuarios.js") ?>" type="text/javascript"></script>