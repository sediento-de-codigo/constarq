<body>
  <header>
    <table>
      <tr>
        <td class="w-20">
          <img src="./public/assets/images/logo.png" width="120px" alt="">
        </td>
        <td class="text-center w-60">
          <h2>
            PROFORMA COMPRA VIVIENDA
          </h2>
          <h3 class="text-center text-darkred">N° <?= sprintf("%07d", $proforma->PROCO_id); ?></h3>
        </td>
        <td class="w-20">
          <img src="./public/assets/images/logo.png" width="120px" alt="">
        </td>
      </tr>
      <tr>
        <td colspan="2"></td>
        <td style="font-size: 6.5pt;">Fecha: <?= date('Y-m-d', strtotime($proforma->PROCO_fecha_registro)); ?></td>
      </tr>
    </table>
  </header>
  <table class="table table-sm w-100 table-text-sm my-4 table-border-top-bottom">
    <tr>
      <td class="fw-bold text-uppercase w-15 fs-xs" style="font-size: 6.5pt;">Nombre del esposo:</td>
      <td id="tipoVehiculo" class="w-20"><?= $proforma->PROCO_nombre_esposo ?></td>
      <td class="fw-bold text-uppercase w-12" style="font-size: 6.5pt;">Teléfono 1:</td>
      <td class="w-20"><?= $proforma->PROCO_tel01 ?></td>
      <td class="fw-bold text-uppercase w-18" style="font-size: 6.5pt;">Conjunto:</td>
      <td class="w-15 text-uppercase">
      <?php echo $proforma->PROCO_conjunto01 ?>
        <!-- Finca 6 <input type="checkbox" <?php echo ($proforma->PROCO_conjunto01 == 1) ? 'checked=""' : '' ?>>
        Finca 7 <input type="checkbox" <?php echo ($proforma->PROCO_conjunto02 == 1) ? 'checked=""' : '' ?>> -->
      </td>
    </tr>
    <tr>
      <td class="fw-bold text-uppercase" style="font-size: 6.5pt;">Cedula:</td>
      <td id="tipoVehiculo" class=""><?= $proforma->PROCO_cedula_esposo ?></td>
      <td class="fw-bold text-uppercase" style="font-size: 6.5pt;">Correo 1:</td>
      <td class=""><?= $proforma->PROCO_email01 ?></td>
      <td class="fw-bold text-uppercase" style="font-size: 6.5pt;">Tiempo de entrega:</td>
      <td class=""><?= $proforma->PROCO_tiempo_entrega ?></td>
    </tr>
    <tr>
      <td class="fw-bold text-uppercase" style="font-size: 6.5pt;">Nombre de la esposa:</td>
      <td id="tipoVehiculo" class=""><?= $proforma->PROCO_nombre_esposa ?></td>
      <td class="fw-bold text-uppercase" style="font-size: 6.5pt;">Teléfono 2:</td>
      <td class=""><?= $proforma->PROCO_tel02 ?></td>
      <td class="fw-bold text-uppercase" style="font-size: 6.5pt;">Casa #:</td>
      <td class=""><?= $proforma->PROCO_num_casa ?></td>
    </tr>
    <tr>
      <td class="fw-bold text-uppercase" style="font-size: 6.5pt;">Cedula:</td>
      <td id="tipoVehiculo" class=""><?= $proforma->PROCO_cedula_esposa ?></td>
      <td class="fw-bold text-uppercase" style="font-size: 6.5pt;">Fecha Próximo Contacto:</td>
      <td class=""><?= $proforma->PROCO_email02 ?></td>
      <td class="fw-bold text-uppercase" style="font-size: 6.5pt;">Institucion financiera:</td>
      <td class=""><?= $proforma->PROCO_financiera ?></td>
    </tr>
    <tr>
      <td class="fw-bold text-uppercase" style="font-size: 6.5pt;"></td>
      <td id="tipoVehiculo" class=""></td>
      <td class="fw-bold text-uppercase" style="font-size: 6.5pt;">Estado</td>
      <td class=""><?= $proforma->PROCO_estado_visita ?></td>
      <td class="fw-bold text-uppercase" style="font-size: 6.5pt;">Subestado</td>
      <td class=""><?= $proforma->PROCO_sub_estado ?></td>
    </tr>
  </table>

  <table class="table table-sm table_border w-100 table-text-sm my-4">
    <tr>
      <td class="fw-bold text-uppercase w-20 fs-xs" style="font-size: 6.5pt;">Valor casa:</td>
      <td id="tipoVehiculo" class="w-30"><?= number_format($proforma->PROCO_valor_inmueble, 2, '.', ','); ?></td>
      <td class="fw-bold text-uppercase" colspan="2" style="font-size: 10pt;">Caracteristicas:</td>
    </tr>
    <tr>
      <td class="fw-bold text-uppercase w-20 fs-xs"></td>
      <td id="tipoVehiculo" class="w-30"></td>
      <td class="fw-bold text-uppercase w-20" style="font-size: 6.5pt;">Area de contrucción (m2):</td>
      <td class="text-uppercase w-30"><?= number_format($proforma->PROCO_area, 2, '.', ','); ?></td>
    </tr>
    <tr>
      <td class="fw-bold text-uppercase w-20 fs-xs"></td>
      <td id="tipoVehiculo" class="w-30"></td>
      <td class="fw-bold text-uppercase w-20" style="font-size: 6.5pt;">Patio (m2):</td>
      <td class="text-uppercase w-30"><?= number_format($proforma->PROCO_patio, 2, '.', ','); ?></td>
    </tr>
    <tr>
      <td class="fw-bold text-uppercase w-20 fs-xs" style="font-size: 10pt;" colspan="2">Valor total</td>
      <td class="fw-bold text-uppercase w-20" style="font-size: 6.5pt;">parqueadero (m2):</td>
      <td class="text-uppercase w-30"><?= number_format($proforma->PROCO_parqueadero, 2, '.', ','); ?></td>
    </tr>
    <tr>
      <td class="fw-bold text-uppercase w-20 fs-xs" style="font-size: 6.5pt;">Valor entrada</td>
      <td id="tipoVehiculo" class="w-30"><?= number_format($proforma->PROCO_valor_entrada, 2, '.', ','); ?></td>
      <td class="fw-bold text-uppercase w-20" style="font-size: 6.5pt;">proyeccion a terraza (m2):</td>
      <td class="text-uppercase w-30"><?= number_format($proforma->PROCO_terraza, 2, '.', ','); ?></td>
    </tr>
    <tr>
      <td class="fw-bold text-uppercase w-20 fs-xs" style="font-size: 6.5pt;">crédito bancario</td>
      <td class="text-uppercase w-30"><?= number_format($proforma->PROCO_credito_bancario, 2, '.', ','); ?></td>
      <td class="fw-bold text-uppercase w-30" colspan="2"></td>
    </tr>
  </table>
  <table class="table table-sm table_border w-100 table-text-sm my-4">
    <tr>
      <td colspan="6" class="fw-bold text-center text-uppercase" style="font-size: 10pt;">Financiamiento entrada</td>
    </tr>
    <tr>
      <td class="fw-bold text-uppercase w-15" style="font-size: 6.5pt;"></td>
      <td class="fw-bold text-uppercase w-25 text-center" style="font-size: 6.5pt;">fecha</td>
      <td class="fw-bold text-uppercase w-10 text-center" style="font-size: 6.5pt;">Valor</td>
      <td class="fw-bold text-uppercase w-10 text-center" style="font-size: 6.5pt;">saldo</td>
      <td class="fw-bold text-uppercase w-25 text-center" style="font-size: 6.5pt;">Descripción</td>
      <td class="fw-bold text-uppercase w-25 text-center" style="font-size: 6.5pt;">Banco</td>
    </tr>
    <?php foreach (json_decode($proforma->PROCO_finaciamiento_entrada) as $detalle) : ?>
      <tr>
        <td class="text-center text-uppercase" style="font-size: 6.5pt;"><?= $detalle->tipo ?></td>
        <td class="text-uppercase text-center" style="font-size: 6.5pt;"><?= $detalle->fecha ?></td>
        <td class="text-uppercase text-center" style="font-size: 6.5pt;"><?= number_format($detalle->valor, 2, '.', ','); ?></td>
        <td class="text-uppercase text-center" style="font-size: 6.5pt;"><?= number_format($detalle->saldo, 2, '.', ','); ?></td>
        <td class="text-center text-uppercase" style="font-size: 6.5pt;"><?= $detalle->descripcion ?></td>
        <td class="text-center text-uppercase" style="font-size: 6.5pt;"><?= $detalle->banco ?></td>
      </tr>
    <?php endforeach; ?>
  </table>

  <?php
  $arrayIngresosEgresos = json_decode($proforma->PROCO_ingresos_egresos);
  $sumaIngreso = $arrayIngresosEgresos[0]->ingresoTotal + $arrayIngresosEgresos[1]->ingresoTotal;
  $sumaEgreso = $arrayIngresosEgresos[0]->egresoTotal + $arrayIngresosEgresos[1]->egresoTotal;
  $sumaglobal = $sumaIngreso - $sumaEgreso;
  ?>

  <table class="table table-sm table_border w-100 table-text-sm my-4">
    <tr>
      <td class="fw-bold text-center" style="font-size: 10pt;"></td>
      <td colspan="3" class="fw-bold text-center text-uppercase" style="font-size: 10pt;">Ingresos</td>
      <td colspan="3" class="fw-bold text-center text-uppercase" style="font-size: 10pt;">Egresos</td>
    </tr>
    <tr>
      <td class="fw-bold text-uppercase w-16 text-center" style="font-size: 6.5pt;"></td>
      <td class="fw-bold text-uppercase w-12 text-center" style="font-size: 6.5pt;">Ingresos fijos</td>
      <td class="fw-bold text-uppercase w-12 text-center" style="font-size: 6.5pt;">Ingresos extras</td>
      <td class="fw-bold text-uppercase w-12 text-center" style="font-size: 6.5pt;">Total</td>
      <td class="fw-bold text-uppercase w-12 text-center" style="font-size: 6.5pt;">egresos fijos</td>
      <td class="fw-bold text-uppercase w-12 text-center" style="font-size: 6.5pt;">De rol de pagos</td>
      <td class="fw-bold text-uppercase w-12 text-center" style="font-size: 6.5pt;">Total</td>
    </tr>
    <tr>
      <td class="fw-bold w-16 text-uppercase" style="font-size: 6.5pt;">Esposo</td>
      <td class="w-12 text-center" style="font-size: 6.5pt;"><?= number_format($arrayIngresosEgresos[0]->ingresoFijo, 2, '.', ',');  ?></td>
      <td class="w-12 text-center" style="font-size: 6.5pt;"><?= number_format($arrayIngresosEgresos[0]->ingresoExtra, 2, '.', ',');  ?></td>
      <td class="w-12 text-center" style="font-size: 6.5pt;"><?= number_format($arrayIngresosEgresos[0]->ingresoTotal, 2, '.', ',');  ?></td>
      <td class="w-12 text-center" style="font-size: 6.5pt;"><?= number_format($arrayIngresosEgresos[0]->egresoFijo, 2, '.', ',');  ?></td>
      <td class="w-12 text-center" style="font-size: 6.5pt;"><?= number_format($arrayIngresosEgresos[0]->rolPago, 2, '.', ',');  ?></td>
      <td class="w-12 text-center" style="font-size: 6.5pt;"><?= number_format($arrayIngresosEgresos[0]->egresoTotal, 2, '.', ',');  ?></td>
    </tr>
    <tr>
      <td class="fw-bold w-16 text-uppercase" style="font-size: 6.5pt;">Esposo</td>
      <td class="w-12 text-center" style="font-size: 6.5pt;"><?= number_format($arrayIngresosEgresos[1]->ingresoFijo, 2, '.', ','); ?></td>
      <td class="w-12 text-center" style="font-size: 6.5pt;"><?= number_format($arrayIngresosEgresos[1]->ingresoExtra, 2, '.', ','); ?></td>
      <td class="w-12 text-center" style="font-size: 6.5pt;"><?= number_format($arrayIngresosEgresos[1]->ingresoTotal, 2, '.', ','); ?></td>
      <td class="w-12 text-center" style="font-size: 6.5pt;"><?= number_format($arrayIngresosEgresos[1]->egresoFijo, 2, '.', ','); ?></td>
      <td class="w-12 text-center" style="font-size: 6.5pt;"><?= number_format($arrayIngresosEgresos[1]->rolPago, 2, '.', ','); ?></td>
      <td class="w-12 text-center" style="font-size: 6.5pt;"><?= number_format($arrayIngresosEgresos[1]->egresoTotal, 2, '.', ','); ?></td>
    </tr>
    <tr>
      <td class="fw-bold w-12 text-uppercase" style="font-size: 6.5pt;">Ingresos y egresos</td>
      <td class="fw-bold w-12" style="font-size: 6.5pt;"></td>
      <td class="fw-bold w-12" style="font-size: 6.5pt;"></td>
      <td class="fw-bold w-12" style="font-size: 6.5pt;"></td>
      <td class="fw-bold w-12" style="font-size: 6.5pt;"></td>
      <td class="fw-bold w-12" style="font-size: 6.5pt;"></td>
      <td class="fw-bold w-12" style="font-size: 6.5pt;"></td>
    </tr>
    <tr>
      <td class="text-center w-12" style="font-size: 6.5pt;">.</td>
      <td class="text-center w-12" style="font-size: 6.5pt;"></td>
      <td class="text-center w-12" style="font-size: 6.5pt;"></td>
      <td class="text-center w-12" style="font-size: 6.5pt;"><?= number_format($sumaIngreso, 2, '.', ','); ?></td>
      <td class="text-center w-12" style="font-size: 6.5pt;"></td>
      <td class="text-center w-12" style="font-size: 6.5pt;"></td>
      <td class="text-center w-12" style="font-size: 6.5pt;"><?= number_format($sumaEgreso, 2, '.', ','); ?></td>
    </tr>
    <tr>
      <td class="fw-bold w-12 text-uppercase" style="font-size: 6.5pt;">Ingreso liquido neto</td>
      <td class="w-12 text-center" style="font-size: 6.5pt;"><?= number_format($sumaglobal, 2, '.', ','); ?></td>
      <td class="fw-bold w-12" style="font-size: 6.5pt;" colspan="5"></td>
    </tr>
  </table>

  <table class="table table-sm table_border w-100 table-text-sm my-4">
    <tr>
      <td class="w-20 text-center fw-bold">
        Papeles requeridos para la precalificación
      </td>
      <td class="w-40 fw-bold text-center">
        <h3 class="text-uppercase">Empleados en relación de dependencia</h3>
        <p>Copia a color y original de cedula <input type="checkbox"></p>
        <p>3 ultimos roles de pago <input type="checkbox"></p>
        <p>Mecaniza dies <input type="checkbox"></p>
        <p>Simulación dies <input type="checkbox"></p>
      </td>
      <td class="w-40 fw-bold text-center">
        <h3 class="text-uppercase">Empleados independientes</h3>
        <p>Copia a color y original de cedula <input type="checkbox"></p>
        <p>RUC - RISE <input type="checkbox"></p>
        <p>3 ultimas declaraciones del IVA <input type="checkbox"></p>
        <p>2 ultimas declaraciones de impuesto a la renta <input type="checkbox"></p>
      </td>
    </tr>
  </table>
  <table class="table table-sm w-100 table-text-sm my-4 table_border">
      <tr>
        <td class="fw-bold text-uppercase w-15 fs-xs" style="font-size: 6.5pt;">Observacion:</td>
        <td class="w-80"><?= nl2br($proforma->PROCO_observacion) ?></td>
      </tr>
    
    </table>

</body>