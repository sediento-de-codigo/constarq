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
        <a href="javascript:void(0)">Registro</a>
      </li>
    </ol>
  </div>
  <div>
    <form onsubmit="registrarProforma(this)">
      <div class="card p-3">
        <div class="row">
          <div class="col-12 col-md-6 col-lg-4">
            <label>Nombre del esposo</label>
            <input type="text" class="form-control mb-2" data-validate name="PROCO_nombre_esposo">
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <label>Cedula del esposo</label>
            <input type="text" class="form-control mb-2" data-validate name="PROCO_cedula_esposo">
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <label>Teléfono 01</label>
            <input type="text" class="form-control mb-2" data-validate name="PROCO_tel01">
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <label>Email 01</label>
            <input type="text" class="form-control mb-2" name="PROCO_email01">
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <label>Nombre de la esposa</label>
            <input type="text" class="form-control mb-2" name="PROCO_nombre_esposa">
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <label>Cedula del esposa</label>
            <input type="text" class="form-control mb-2" name="PROCO_cedula_esposa">
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <label>Medio de contacto</label>
            <input type="text" class="form-control mb-2" name="PROCO_tel02">
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <label>Fecha Próximo Contacto</label>
            <input type="date" class="form-control mb-2" name="PROCO_email02">
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <label class="d-block">Conjunto</label>
            <input type="text" class="form-control mb-2" name="PROCO_conjunto01" id="PROCO_conjunto01">
            <!-- <div class="mt-3">
              <label class="mt-1">Finca 6</label>
              <input type="checkbox" class="form-check-input mb-2 me-3" value="1" name="PROCO_conjunto01">
              <label class="mt-1">Finca 7</label>
              <input type="checkbox" class="form-check-input mb-2" value="1" name="PROCO_conjunto02">
            </div> -->
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <label>Tiempo de entrega</label>
            <input type="text" class="form-control mb-2" name="PROCO_tiempo_entrega">
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <label>Nro. de casa</label>
            <input type="text" class="form-control mb-2" name="PROCO_num_casa">
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <label>Institución financiera</label>
            <input type="text" class="form-control mb-2" name="PROCO_financiera">
          </div>
        </div>
        <hr>
        <h6>Caracteristicas</h6>
        <div class="row">
          <div class="col-12 col-md-6 col-lg-4">
            <label>Area de contrucción (m2)</label>
            <input type="text" class="form-control mb-2" data-number_format="number"  name="PROCO_area">
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <label>Patio (m2)</label>
            <input type="text" class="form-control mb-2" data-number_format="number"  name="PROCO_patio">
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <label>Parqueadero (m2)</label>
            <input type="text" class="form-control mb-2" data-number_format="number"  name="PROCO_parqueadero">
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <label>Proyección a terraza (m2)</label>
            <input type="text" class="form-control mb-2" data-number_format="number"  name="PROCO_terraza">
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <label>Estado</label>
            <select name="PROCO_estado_visita" class="form-control default-select wide">
              <option value="" disabled selected>Selecciona una opción</option>
              <option value="Visitó">Visitó</option>
              <option value="No visitó">No visitó</option>
            </select>
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <label>Sub estado</label>
            <select name="PROCO_sub_estado" class="form-control default-select wide ">
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
        </div>

        <h6>Valor total</h6>
        <div class="row">
          <div class="col-12 col-md-6 col-lg-4">
            <label>Valor de la casa</label>
            <input type="text" class="form-control mb-2" data-number_format="money"  name="PROCO_valor_inmueble" id="PROCO_valor_inmueble" value="0.00">
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <label>Valor de la entrada</label>
            <input type="text" class="form-control mb-2" data-number_format="money"  name="PROCO_valor_entrada" id="PROCO_valor_entrada" value="0.00">
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <label>Credito bancario</label>
            <input type="text" class="form-control mb-2" data-number_format="money"  name="PROCO_credito_bancario" id="PROCO_credito_bancario" value="0.00" readonly>
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

            </tbody>
          </table>
        </div>
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
                  <input type="text" id="iFEsposo" oninput="SumaDosCampos('iFEsposo', 'iEEsposo', 'totalIngresoEsposo')" class="form-control mb-2" data-number_format="money" data-validate value="0.00">
                </td>
                <td>
                  <input type="text" id="iEEsposo" oninput="SumaDosCampos('iFEsposo', 'iEEsposo', 'totalIngresoEsposo')" class="form-control mb-2" data-number_format="money" data-validate value="0.00">
                </td>
                <td>
                  <input type="text" id="totalIngresoEsposo" class="form-control mb-2 totalFilaIngreso" readonly data-number_format="money" data-validate value="0.00">
                </td>
                <td>
                  <input type="text" id="eFEsposo" oninput="SumaDosCampos('eFEsposo', 'pagosEsposo', 'totalEgresosEsposo')" class="form-control mb-2" data-number_format="money" data-validate value="0.00">
                </td>
                <td>
                  <input type="text" id="pagosEsposo" oninput="SumaDosCampos('eFEsposo', 'pagosEsposo', 'totalEgresosEsposo')" class="form-control mb-2" data-number_format="money" data-validate value="0.00">
                </td>
                <td>
                  <input type="text" id="totalEgresosEsposo" readonly class="form-control mb-2 totalFilaEgreso" data-number_format="money" data-validate value="0.00">
                </td>
              </tr>
              <tr>
                <td>
                  Esposa
                </td>
                <td>
                  <input type="text" id="iFEsposa" oninput="SumaDosCampos('iFEsposa', 'iEEsposa', 'totalIngresoEsposa')" class="form-control mb-2" data-number_format="money" data-validate value="0.00">
                </td>
                <td>
                  <input type="text" id="iEEsposa" oninput="SumaDosCampos('iFEsposa', 'iEEsposa', 'totalIngresoEsposa')" class="form-control mb-2" data-number_format="money" data-validate value="0.00">
                </td>
                <td>
                  <input type="text" id="totalIngresoEsposa" readonly class="form-control mb-2 totalFilaIngreso" data-number_format="money" data-validate value="0.00">
                </td>
                <td>
                  <input type="text" id="eFEsposa" oninput="SumaDosCampos('eFEsposa', 'pagosEsposa', 'totalEgresosEsposa')" class="form-control mb-2" data-number_format="money" data-validate value="0.00">
                </td>
                <td>
                  <input type="text" id="pagosEsposa" oninput="SumaDosCampos('eFEsposa', 'pagosEsposa', 'totalEgresosEsposa')" class="form-control mb-2" data-number_format="money" data-validate value="0.00">
                </td>
                <td>
                  <input type="text" id="totalEgresosEsposa" class="form-control mb-2 totalFilaEgreso" data-number_format="money" data-validate value="0.00">
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
                  <input type="text" id="sumaTotalIngresos" readonly class="form-control mb-2" data-validate>
                </td>
                <td>
                </td>
                <td>
                </td>
                <td>
                  <input type="text" id="sumaTotalEgresos" readonly class="form-control mb-2" data-validate>
                </td>
              </tr>
              <tr>
                <td>
                  Ingreso liquido neto
                </td>
                <td>
                  <input type="text" id="sumaGlobal" readonly class="form-control mb-2" data-validate>
                </td>
                <td colspan="5"></td>

              </tr>

            </tbody>
          </table>
        </div>

        <div>
          <label for="">Observaciones</label>
          <textarea name="PROCO_observacion" rows="4" class="form-control"></textarea>
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
      <input type="text" class="form-control mb-2" >
    </td> 
    <td>
      <input type="text" class="form-control mb-2" >
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
  agregarTemplate("templateFinanciamientoTr", "containerFinanciamiento");
</script>
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

sumarTotalIngresos();
sumarTotalEgresos();
sumarIngresosEgresos();

</script>