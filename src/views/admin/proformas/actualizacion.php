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
        <a href="javascript:void(0)">Actualización</a>
      </li>
    </ol>
  </div>
  <div>
    <form onsubmit="actualizarProforma(this)">
      <div class="card p-3">
        <div class="row">
          <div class="col-12 col-md-6 col-lg-4">
            <label>Nombre del esposo</label>
            <input type="text" class="form-control mb-2" data-validate value="<?= $proforma->PROCO_nombre_esposo ?>" name="PROCO_nombre_esposo">
            <input type="hidden" value="<?= $proforma->PROCO_id ?>" name="PROCO_id">
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <label>Cedula del esposo</label>
            <input type="text" class="form-control mb-2" data-validate value="<?= $proforma->PROCO_cedula_esposo ?>" name="PROCO_cedula_esposo">
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <label>Teléfono 01</label>
            <input type="text" class="form-control mb-2" data-validate value="<?= $proforma->PROCO_tel01 ?>" name="PROCO_tel01">
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <label>Email 01</label>
            <input type="text" class="form-control mb-2" value="<?= $proforma->PROCO_email01 ?>" name="PROCO_email01">
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <label>Nombre de la esposa</label>
            <input type="text" class="form-control mb-2" value="<?= $proforma->PROCO_nombre_esposa ?>" name="PROCO_nombre_esposa">
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <label>Cedula del esposa</label>
            <input type="text" class="form-control mb-2" value="<?= $proforma->PROCO_cedula_esposa ?>" name="PROCO_cedula_esposa">
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <label>Medio de contacto</label>
            <input type="text" class="form-control mb-2" value="<?= $proforma->PROCO_tel02 ?>" name="PROCO_tel02">
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <label>Fecha Próximo Contacto</label>
            <input type="date" class="form-control mb-2"  value="<?= $proforma->PROCO_email02 ?>" name="PROCO_email02" id="PROCO_email02">
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <label class="d-block">Conjunto</label>
            <input type="text" class="form-control mb-2"  value="<?= $proforma->PROCO_conjunto01 ?>" name="PROCO_conjunto01" id="PROCO_conjunto01">
            <!-- <div class="mt-3">
              <label class="mt-1">Finca 6</label>
              <input type="checkbox" class="form-check-input mb-2 me-3" <?php if ($proforma->PROCO_conjunto01 == 1) echo 'checked' ?> value="1" id="PROCO_conjunto01" name="PROCO_conjunto01">
              <label class="mt-1">Finca 7</label>
              <input type="checkbox" class="form-check-input mb-2" <?php if ($proforma->PROCO_conjunto02 == 1) echo 'checked' ?> value="1" id="PROCO_conjunto02" name="PROCO_conjunto02">
            </div> -->
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <label>Tiempo de entrega</label>
            <input type="text" class="form-control mb-2"  value="<?= $proforma->PROCO_tiempo_entrega ?>" name="PROCO_tiempo_entrega">
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <label>Nro. de casa</label>
            <input type="text" class="form-control mb-2"  value="<?= $proforma->PROCO_num_casa ?>" name="PROCO_num_casa">
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <label>Institución financiera</label>
            <input type="text" class="form-control mb-2"  value="<?= $proforma->PROCO_financiera ?>" name="PROCO_financiera">
          </div>
        </div>
        <hr>
        <h6>Caracteristicas</h6>
        <div class="row">
          <div class="col-12 col-md-6 col-lg-4">
            <label>Area de contrucción (m2)</label>
            <input type="text" class="form-control mb-2" data-number_format="number"  value="<?= number_format($proforma->PROCO_area, 2, '.', ','); ?>" name="PROCO_area">
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <label>Patio (m2)</label>
            <input type="text" class="form-control mb-2" data-number_format="number"  value="<?= number_format($proforma->PROCO_patio, 2, '.', ','); ?>" name="PROCO_patio">
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <label>Parqueadero (m2)</label>
            <input type="text" class="form-control mb-2" data-number_format="number"  value="<?= number_format($proforma->PROCO_parqueadero, 2, '.', ','); ?>" name="PROCO_parqueadero">
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <label>Proyección a terraza (m2)</label>
            <input type="text" class="form-control mb-2" data-number_format="number"  value="<?= number_format($proforma->PROCO_terraza, 2, '.', ','); ?>" name="PROCO_terraza">
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <label>Estado</label>
            <select name="PROCO_estado_visita" id="PROCO_estado_visita" class="form-control default-select wide">
              <option value="" disabled selected>Selecciona una opción</option>
              <option value="Visitó">Visitó</option>
              <option value="No visitó">No visitó</option>
            </select>
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <label>Sub estado</label>
            <select name="PROCO_sub_estado" id="PROCO_sub_estado" class="form-control default-select wide">
              <option value="" disabled selected>Selecciona una opción</option>
              <option value="No Guardado">No Guardado</option>
              <option value="Interesado">Interesado</option>
              <option value="Papeles">Papeles</option>
              <option value="Calificado">Calificado</option>
              <option value="Venta Futuro">Venta Futuro</option>
              <option value="Venta">Venta</option>
              <option value="Rescillado">Rescillado</option>
              <option value="Cambio">Cambio</option>
              <option value="Eliminado">Eliminado</option>
              <option value="Por Visitar">Por Visitar</option>
              <option value="Por Papeles">Por Papeles</option>
              <option value="No calificado">No calificado</option>
            </select>
          </div>
          <script>
            document.getElementById("PROCO_estado_visita").value = '<?= $proforma->PROCO_estado_visita; ?>'
            document.getElementById("PROCO_sub_estado").value = '<?= $proforma->PROCO_sub_estado; ?>'
          </script>
        </div>

        <h6>Valor total</h6>
        <div class="row">
          <div class="col-12 col-md-6 col-lg-4">
            <label>Valor de la casa</label>
            <input type="text" class="form-control mb-2" data-number_format="money" value="<?= number_format($proforma->PROCO_valor_inmueble, 2, '.', ',');?>" name="PROCO_valor_inmueble" id="PROCO_valor_inmueble">
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <label>Valor de la entrada</label>
            <input type="text" class="form-control mb-2" data-number_format="money" value="<?= number_format($proforma->PROCO_valor_entrada, 2, '.', ','); ?>" name="PROCO_valor_entrada" id="PROCO_valor_entrada">
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <label>Credito bancario</label>
            <input type="text" class="form-control mb-2" data-number_format="money" value="<?= number_format($proforma->PROCO_credito_bancario, 2, '.', ','); ?>" name="PROCO_credito_bancario" id="PROCO_credito_bancario">
          </div>
        </div>
        <hr>
        <h6>Financiamiento entrada</h6>
        <div>
          <button type="button" class="btn light btn-primary" onclick="agregarTemplate('templateFinanciamientoTr', 'containerFinanciamiento', 'ENTRADA');">
            Agregar Entrada
          </button>
          <button type="button" class="btn light btn-primary" onclick="agregarTemplate('templateFinanciamientoTr', 'containerFinanciamiento', 'RESERVA');">
            Agregar Reserva
          </button>
          <button type="button" class="btn light btn-primary" onclick="agregarTemplate('templateFinanciamientoTr', 'containerFinanciamiento', 'CUOTA');">
            Agregar Cuota
          </button>
        </div>

        <div class="table-responsive">
          <table class="table table-responsive-sm">
            <thead>
              <tr>
                <th>Tipo</th>
                <th>Fecha</th>
                <th>Valor</th>
                <th>Saldo</th>
                <th>Descripción</th>
                <th>Banco</th>
                <th>Quitar</th>
              </tr>
            </thead>
            <tbody id="containerFinanciamiento">
              <?php foreach (json_decode($proforma->PROCO_finaciamiento_entrada) as $financiamiento) : ?>
                <tr>
                  <td>
                    <input type="text" class="form-control mb-2 descripcion 
                    <?php if(strpos($financiamiento->tipo, "CUOTA") !== false) echo 'cuotaTable' ?>"
                    value="<?= $financiamiento->tipo ?>" readonly data-validate>
                  </td>
                  <td>
                    <input type="date" class="form-control mb-2" value="<?= $financiamiento->fecha ?>" data-validate>
                  </td>
                  <td>
                    <input type="text" class="form-control mb-2" data-number_format="money" value="<?= number_format($financiamiento->valor, 2, '.', ','); ?>" data-validate>
                  </td>
                  <td>
                    <input type="text" class="form-control mb-2" data-number_format="money" value="<?= number_format($financiamiento->saldo, 2, '.', ','); ?>" data-validate>
                  </td>
                  <td>
                    <input type="text" class="form-control mb-2" value="<?= $financiamiento->descripcion ?>" data-validate>
                  </td>
                  <td>
                    <input type="text" class="form-control mb-2" value="<?= $financiamiento->banco ?>" data-validate>
                  </td>
                  <td>
                    <i class="fa-solid fa-trash fa-2xl text-danger" style="cursor: pointer;" onclick="eliminarFilaFinanciamiento(this)"></i>
                  </td>
                </tr>
              <?php endforeach; ?>

            </tbody>
          </table>
        </div>

        <?php
        $arrayIngresosEgresos = json_decode($proforma->PROCO_ingresos_egresos);
        $sumaIngreso = $arrayIngresosEgresos[0]->ingresoTotal + $arrayIngresosEgresos[1]->ingresoTotal;
        $sumaEgreso = $arrayIngresosEgresos[0]->egresoTotal + $arrayIngresosEgresos[1]->egresoTotal;
        $sumaglobal = $sumaIngreso - $sumaEgreso;
        ?>
        <hr>
        <h6>Ingresos y egresos</h6>
        <div class="table-responsive">
          <table class="table table-responsive-sm">
            <thead>
              <tr>
                <th></th>
                <th>Ingresos fijos</th>
                <th>Ingresos extras</th>
                <th>Total</th>
                <th>Egresos fijos</th>
                <th>De rol de pagos</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody id="containerIngresosEgresos">
              <tr>
                <td>
                  Esposo
                </td>
                <td>
                  <input type="text" id="iFEsposo" value="<?= number_format($arrayIngresosEgresos[0]->ingresoFijo, 2, '.', ','); ?>" oninput="SumaDosCampos('iFEsposo', 'iEEsposo', 'totalIngresoEsposo')" class="form-control mb-2" data-validate data-number_format="money" >
                </td>
                <td>
                  <input type="text" id="iEEsposo" value="<?= number_format($arrayIngresosEgresos[0]->ingresoExtra, 2, '.', ','); ?>" oninput="SumaDosCampos('iFEsposo', 'iEEsposo', 'totalIngresoEsposo')" class="form-control mb-2" data-validate data-number_format="money" >
                </td>
                <td>
                  <input type="text" value="<?= number_format($arrayIngresosEgresos[0]->ingresoTotal, 2, '.', ','); ?>" id="totalIngresoEsposo" class="form-control mb-2 totalFilaIngreso" data-validate data-number_format="money" >
                </td>
                <td>
                  <input type="text" id="eFEsposo" value="<?= number_format($arrayIngresosEgresos[0]->egresoFijo, 2, '.', ','); ?>" oninput="SumaDosCampos('eFEsposo', 'pagosEsposo', 'totalEgresosEsposo')" class="form-control mb-2" data-validate data-number_format="money" >
                </td>
                <td>
                  <input type="text" id="pagosEsposo" value="<?= number_format($arrayIngresosEgresos[0]->rolPago, 2, '.', ',');?>" oninput="SumaDosCampos('eFEsposo', 'pagosEsposo', 'totalEgresosEsposo')" class="form-control mb-2" data-validate data-number_format="money" >
                </td>
                <td>
                  <input type="text" id="totalEgresosEsposo" value="<?= number_format($arrayIngresosEgresos[0]->egresoTotal, 2, '.', ','); ?>" readonly class="form-control mb-2 totalFilaEgreso" data-validate>
                </td>
              </tr>
              <tr>
                <td>
                  Esposa
                </td>
                <td>
                  <input type="text" id="iFEsposa" value="<?= number_format($arrayIngresosEgresos[1]->ingresoFijo, 2, '.', ','); ?>" oninput="SumaDosCampos('iFEsposa', 'iEEsposa', 'totalIngresoEsposa')" class="form-control mb-2" data-validate data-number_format="money">
                </td>
                <td>
                  <input type="text" id="iEEsposa" value="<?= number_format($arrayIngresosEgresos[1]->ingresoExtra, 2, '.', ','); ?>" oninput="SumaDosCampos('iFEsposa', 'iEEsposa', 'totalIngresoEsposa')" class="form-control mb-2" data-validate data-number_format="money">
                </td>
                <td>
                  <input type="text" id="totalIngresoEsposa" value="<?= number_format($arrayIngresosEgresos[1]->ingresoTotal, 2, '.', ','); ?>" readonly class="form-control mb-2 totalFilaIngreso" data-validate data-number_format="money">
                </td>
                <td>
                  <input type="text" id="eFEsposa" value="<?= number_format($arrayIngresosEgresos[1]->egresoFijo, 2, '.', ','); ?>" oninput="SumaDosCampos('eFEsposa', 'pagosEsposa', 'totalEgresosEsposa')" class="form-control mb-2" data-validate data-number_format="money">
                </td>
                <td>
                  <input type="text" id="pagosEsposa" value="<?= number_format($arrayIngresosEgresos[1]->rolPago, 2, '.', ','); ?>" oninput="SumaDosCampos('eFEsposa', 'pagosEsposa', 'totalEgresosEsposa')" class="form-control mb-2" data-validate data-number_format="money">
                </td>
                <td>
                  <input type="text" id="totalEgresosEsposa" value="<?= number_format($arrayIngresosEgresos[1]->egresoTotal, 2, '.', ','); ?>" class="form-control mb-2 totalFilaEgreso" data-validate data-number_format="money">
                </td>
              </tr>

              <tr>
                <td colspan="7"></td>
              </tr>

              <tr>
                <td>
                  Ingresos y egresos
                </td>
                <td>
                </td>
                <td>
                </td>
                <td>
                  <input type="text" id="sumaTotalIngresos" value="<?= number_format($sumaIngreso, 2, '.', ','); ?>" readonly class="form-control mb-2" data-validate>
                </td>
                <td>
                </td>
                <td>
                </td>
                <td>
                  <input type="text" id="sumaTotalEgresos" value="<?= number_format($sumaEgreso, 2, '.', ','); ?>" readonly class="form-control mb-2" data-validate>
                </td>
              </tr>
              <tr>
                <td>
                  Ingreso liquido neto
                </td>
                <td>
                  <input type="text" id="sumaGlobal" value="<?= number_format($sumaglobal, 2, '.', ','); ?>" readonly class="form-control mb-2" data-validate>
                </td>
                <td colspan="5"></td>

              </tr>

            </tbody>
          </table>
        </div>
        <div>
          <label for="">Observaciones</label>
          <textarea name="PROCO_observacion" rows="4" class="form-control"><?= $proforma->PROCO_observacion ?></textarea>
        </div>

        <div class="text-end">
          <button type="submit" class="btn btn-sm btn-primary float-right mt-2">Guardar</button>
        </div>
      </div>
    </form>
  </div>
</div>

<template id="templateFinanciamientoTr">
  <tr>
    <td>
      <input type="text" class="form-control mb-2 descripcion" readonly>
    </td>
    <td>
      <input type="date" class="form-control mb-2">
    </td>
    <td>
      <input type="text" class="form-control mb-2" data-number_format="money">
    </td>
    <td>
      <input type="text" class="form-control mb-2" data-number_format="money">
    </td>
    <td>
      <input type="text" class="form-control mb-2">
    </td>
    <td>
      <input type="text" class="form-control mb-2">
    </td>
    <td>
      <i class="fa-solid fa-trash fa-2xl text-danger" style="cursor: pointer;" onclick="eliminarFilaFinanciamiento(this)"></i>
    </td>
  </tr>
</template>

<?php include "./src/includes/footer.php"; ?>
<script src="https://cdn.jsdelivr.net/npm/autonumeric@4"></script>
<script src="<?= URL::to("public/assets/js/modulos/proformas.js") ?>" type="text/javascript"></script>
<script>
function calcularCreditoBancario() {
  // Obtener los valores de los campos de entrada
  let value1 = $('#PROCO_valor_inmueble').val();
  let value2 = $('#PROCO_valor_entrada').val();

  // Eliminar las comas de los valores
  value1 = value1.replace(/,/g, '');
  value2 = value2.replace(/,/g, '');

  // Convertir los valores a números flotantes
  let num1 = parseFloat(value1);
  let num2 = parseFloat(value2);

  // Calcular el resultado
  let result = num1 - num2;

  // Asignar el resultado al campo de salida con dos decimales
  $('#PROCO_credito_bancario').val(result.toFixed(2));
}

$('#PROCO_valor_inmueble, #PROCO_valor_entrada').on('change', calcularCreditoBancario);

</script>