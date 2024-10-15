<?php include "./src/includes/header.php"; ?>
<div class="">
  <div class="row page-titles mb-3">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active">
        <a href="javascript:void(0)">Inicio</a>
      </li>
      <li class="breadcrumb-item">
        <a href="javascript:void(0)">Proformas</a>
      </li>
      <li class="breadcrumb-item">
        <a href="javascript:void(0)">Consultas</a>
      </li>
    </ol>
  </div>
  
  <style>
    .col-numero, .col-esposo, .col-cedula, .col-telefono1, .col-correo1, 
    .col-esposa, .col-cedula, .col-telefono2, .col-fecha-contacto, 
    .col-conjunto, .col-tiempo-entrega, .col-casa, .col-financiera, 
    .col-estado, .col-subestado, .col-area, .col-patio, .col-parqueadero, 
    .col-terraza, .col-valor-total, .col-valor-entrada, .col-credito, 
    .col-fecha-registro, .col-responsable, .col-opciones {
        width: 100px; /* Ajusta el valor según lo necesites */
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    
    .col-observacion {
        width: 300px; /* Ajusta este valor según el espacio horizontal que quieras dedicarle */
    }

    .observacion-content {
        max-width: 300px; /* Mantén el mismo valor que el ancho de la columna */
        height: 50px; /* Ajusta la altura según lo que prefieras */
        overflow-x: auto; /* Habilita el desplazamiento horizontal */
        overflow-y: hidden; /* Desactiva el desplazamiento vertical */
        white-space: nowrap; /* Evita que el texto se divida en múltiples líneas */
    }
  </style>

  <!-- Formulario de filtros -->
  <div class="card p-3 mb-3">
    <form method="GET" action="<?= URL::to("/admin/proformas/view_historial") ?>">
      <div class="row">
        <div class="col-md-3">
          <label for="filter">Filtrar por:</label>
          <select class="form-control" name="filter" id="filter">
            <option value="all">Todos</option>
            <option value="PROCO_id">Coti #</option>
            <option value="PROCO_nombre_esposo">Nombre</option>
            <option value="PROCO_email02">Fecha próximo contacto</option>
            <option value="PROCO_conjunto01">Conjunto</option>
            <option value="PROCO_num_casa">casa #</option>
            <option value="PROCO_estado_visita">Estado</option>
            <option value="PROCO_sub_estado">Su estado</option>
            <option value="PROCO_fecha_registro">Fecha de registro</option>
            <option value="PROCO_usuario">Responsable</option>
          </select>
        </div>
        <div class="col-md-3">
          <label for="value">Valor a buscar:</label>
          <input type="date" class="form-control" name="value" id="value" placeholder="Ingrese el valor">
        </div>
        <div class="col-md-3 d-flex align-items-end">
          <button type="submit" class="btn btn-primary" >Buscar</button>
        </div>
      </div>
    </form>
  </div>

  <div class="card p-3">
    <div class="table-responsive">
    <table id="dataTableTarjetas" class="display dataTable" style="overflow-y: auto;">
      <thead>
          <tr>
              <th class="col-numero">#</th>
              <th class="col-esposo">Esposo</th>
              <th class="col-cedula">Cédula</th>
              <th class="col-telefono1">Teléfono 01</th>
              <th class="col-correo1">Correo 01</th>
              <th class="col-esposa">Esposa</th>
              <th class="col-cedula">Cédula</th>
              <th class="col-telefono2">Medio de contacto</th>
              <th class="col-fecha-contacto">Fecha Próximo Contacto</th>
              <th class="col-conjunto">Conjunto</th>
              <th class="col-tiempo-entrega">Tiempo de entrega</th>
              <th class="col-casa"># casa</th>
              <th class="col-financiera">Institución financiera</th>
              <th class="col-estado">Estado</th>
              <th class="col-subestado">Subestado</th>
              <th class="col-area">Area de construcción (m2)</th>
              <th class="col-patio">Patio (m2)</th>
              <th class="col-parqueadero">Parqueadero (m2)</th>
              <th class="col-terraza">Proyección a terraza (m2)</th>
              <th class="col-valor-total">Valor total</th>
              <th class="col-valor-entrada">Valor de la entrada</th>
              <th class="col-credito">Crédito bancario</th>
              <th class="col-observacion">Observación</th>
              <th class="col-fecha-registro">Fecha registro</th>
              <th class="col-responsable">Responsable</th>
              <th class="col-opciones">Opciones</th>
          </tr>
      </thead>
      <tbody>
          <?php foreach ($proformas as $proforma) : if ($proforma->PROCO_estado == 0) continue; //aqui es donde excluye los registros los 40 primero
          $fechaRegistro = new DateTime($proforma->PROCO_fecha_registro);
          $fechaContacto = new DateTime($proforma->PROCO_email02);
          ?>
              <tr data-table="<?= $proforma->PROCO_id ?>">
                  <td class="col-numero"><?= sprintf("%07d", $proforma->PROCO_id) ?></td>
                  <td class="col-esposo"><?= $proforma->PROCO_nombre_esposo ?></td>
                  <td class="col-cedula"><?= $proforma->PROCO_cedula_esposo ?></td>
                  <td class="col-telefono1"><?= $proforma->PROCO_tel01 ?></td>
                  <td class="col-correo1"><?= $proforma->PROCO_email01 ?></td>
                  <td class="col-esposa"><?= $proforma->PROCO_nombre_esposa ?></td>
                  <td class="col-cedula"><?= $proforma->PROCO_cedula_esposa ?></td>
                  <td class="col-telefono2"><?= $proforma->PROCO_tel02 ?></td>
                  <td class="col-fecha-contacto"><?= $fechaContacto->format('d-m-Y') ?></td>
                  <td class="col-conjunto"><?= $proforma->PROCO_conjunto01 ?></td>
                  <td class="col-tiempo-entrega"><?= $proforma->PROCO_tiempo_entrega ?></td>
                  <td class="col-casa"><?= $proforma->PROCO_num_casa ?></td>
                  <td class="col-financiera"><?= $proforma->PROCO_financiera ?></td>
                  <td class="col-estado"><?= $proforma->PROCO_estado_visita ?></td>
                  <td class="col-subestado"><?= $proforma->PROCO_sub_estado ?></td>
                  <td class="col-area"><?= $proforma->PROCO_area ?></td>
                  <td class="col-patio"><?= $proforma->PROCO_patio ?></td>
                  <td class="col-parqueadero"><?= $proforma->PROCO_parqueadero ?></td>
                  <td class="col-terraza"><?= $proforma->PROCO_terraza ?></td>
                  <td class="col-valor-total"><?= $proforma->PROCO_valor_inmueble ?></td>
                  <td class="col-valor-entrada"><?= $proforma->PROCO_valor_entrada ?></td>
                  <td class="col-credito"><?= $proforma->PROCO_credito_bancario ?></td>
                  <td class="col-observacion">
                    <div class="observacion-content">
                        <?= $proforma->PROCO_observacion ?>
                    </div>
                  </td>
                  <td class="col-fecha-registro"><?= $fechaRegistro->format('d-m-Y') ?></td>
                  <td class="col-responsable"><?= $proforma->responsable->USU_nombres . " " . $proforma->responsable->USU_apellidos ?></td>
                  <td class="col-opciones text-center">
                      <a href="<?php echo URL::base() . "/admin/proformas/view_actualizar/" . $proforma->PROCO_id ?>" class="text-primary">
                          <i class="fas fa-edit fa-lg"></i>
                      </a>
                      <a href="#" data-id_proforma='<?= $proforma->PROCO_id ?>' onclick="generarTarjetaPDF(this)" class="text-primary">
                          <i class="fa-solid fa-file fa-lg"></i>
                      </a>
                      <a href="#" data-id_proforma='<?= $proforma->PROCO_id ?>' onclick="eliminarProforma(this)" class="text-primary">
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

<?php include "./src/includes/footer.php"; ?>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="<?= URL::to("public/assets/vendor/JSZip-2.5.0/jszip.min.js") ?>"></script>
<script src="<?= URL::to("public/assets/vendor/pdfmake-0.1.36/pdfmake.min.js") ?>"></script>
<script src="<?= URL::to("public/assets/vendor/pdfmake-0.1.36/vfs_fonts.js") ?>"></script>
<script src="<?= URL::to("public/assets/vendor/Buttons-1.6.5/js/buttons.html5.min.js") ?>"></script>
<script src="<?= URL::to("public/assets/js/modulos/proformas.js") ?>" type="text/javascript"></script>