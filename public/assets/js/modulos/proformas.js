let dataTableTarjetas = null;

window.addEventListener("load", () => {
  dataTableTarjetas = $("#dataTableTarjetas").DataTable({
    dom: "Bfrtp",
    pageLength: 25,
    ordering: false,
    language: {
      paginate: {
        next: '<i class="fa fa-angle-double-right fa-xs" aria-hidden="true"></i>',
        previous:
          '<i class="fa fa-angle-double-left fa-xs" aria-hidden="true"></i>',
      },
    },
    buttons: {
      buttons: [
        {
          extend: "excelHtml5",
          text: '<i class="fas fa-file-excel fa-2x"></i>',
          titleattr: "formato excel",
          className: "btn btn-success",
          footer: true,
          title: "listado de proformas",
          exportOptions: {
            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15,16,17,18,19, 20, 21, 22, 23,24],
          },
        },
      ],
    },
  });

});

const agregarTemplate = (
  idTemplate,
  idContainer,
  valuePorDefecto = "ENTRADA"
) => {
  let template = document.getElementById(idTemplate);

  // Clonar el contenido del template
  let templateClonado = template.content.cloneNode(true);
  let inputDescripcion = templateClonado.querySelector(".descripcion");
  let contenedor = document.getElementById(idContainer);
  if (valuePorDefecto === "CUOTA") {
    inputDescripcion.classList.add("cuotaTable");
    let numCuotasExistentes = document.querySelectorAll(
      "#containerFinanciamiento .cuotaTable"
    );
    valuePorDefecto = `CUOTA ${Number(numCuotasExistentes.length) + 1}`;
  }
  contenedor.appendChild(templateClonado);
  $(inputDescripcion).val(valuePorDefecto);
};

const eliminarFilaFinanciamiento = (elemento) => {
  let trPadre = elemento.parentNode.parentNode;
  trPadre.remove();
};


const eliminarProforma = async (element) => {
  try {
    Swal.fire({
      title: "¿Estas seguro de eliminar este registro?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Si, eliminar",
      cancelButtonText: "Cancelar",
    }).then(async (result) => {
      if (result.isConfirmed) {

        let idProforma = element.dataset.id_proforma;
        let data = new FormData();
        data.append("PROCO_id", idProforma);

        let response = await customFetch(
          API_ROUTES.PROFORMAS.ELIMINAR,
          "POST",
          data
        ); if (response["codigo"] > 0) {
          boxAlert(response["mensaje"], "success");
          let updated = response["datos"];
          let trUpdatedElement = $(
            '[data-table="' + updated.PROCO_id + '"]'
          )[0];
          const trUpdated = dataTableTarjetas.row(trUpdatedElement);
          return trUpdated.remove().draw(false);
        } else {
          boxAlert(response["mensaje"], "error");
        }
      }
    })

  } catch (error) {
    console.log("error :>> ", error);
  }

}

const registrarProforma = async (formulario) => {
  try {
    event.preventDefault();
    if (!validarFormulario(formulario)) {
      return ToastAlert("Algunos campos son necesarios", "warning");
    } else {

      let trsProformas = document.querySelectorAll("#containerFinanciamiento tr");
      let arrayFinal = [];
      trsProformas.forEach((row) => {
        let tds = row.querySelectorAll("input");
        let objTemp = {
          tipo: tds[0].value,
          fecha: tds[1].value,
          valor: unformatNumber(tds[2].value),
          saldo: unformatNumber(tds[3].value),
          descripcion: tds[4].value,
          banco: tds[5].value,
        };
        arrayFinal.push(objTemp);
      });

      /* obtener ingresos y egresos */
      let arrayIngresosEgresos = [];
      let objEsposo = {
        tipo: "Esposo",
        ingresoFijo: unformatNumber(document.getElementById("iFEsposo").value),
        ingresoExtra: unformatNumber(document.getElementById("iEEsposo").value),
        ingresoTotal: unformatNumber(document.getElementById("totalIngresoEsposo").value),
        egresoFijo: unformatNumber(document.getElementById("eFEsposo").value),
        rolPago: unformatNumber(document.getElementById("pagosEsposo").value),
        egresoTotal: unformatNumber(document.getElementById("totalEgresosEsposo").value),
      };
      let objEsposa = {
        tipo: "Esposa",
        ingresoFijo: unformatNumber(document.getElementById("iFEsposa").value),
        ingresoExtra: unformatNumber(document.getElementById("iEEsposa").value),
        ingresoTotal: unformatNumber(document.getElementById("totalIngresoEsposa").value),
        egresoFijo: unformatNumber(document.getElementById("eFEsposa").value),
        rolPago: unformatNumber(document.getElementById("pagosEsposa").value),
        egresoTotal: unformatNumber(document.getElementById("totalEgresosEsposa").value),
      };

      arrayIngresosEgresos.push(objEsposo);
      arrayIngresosEgresos.push(objEsposa);

      let data = new FormData(formulario);
      data.append("PROCO_finaciamiento_entrada", JSON.stringify(arrayFinal));
      data.append("PROCO_ingresos_egresos", JSON.stringify(arrayIngresosEgresos));

      let response = await customFetch(
        API_ROUTES.PROFORMAS.REGISTRAR,
        "POST",
        data
      );
      if (response["codigo"] > 0) {
        formulario.reset();
        $('.default-select').niceSelect('update');
        boxAlert(response["mensaje"], "success");
        document.getElementById("containerFinanciamiento").innerHTML = "";
        agregarTemplate("templateFinanciamientoTr", "containerFinanciamiento");
      } else {
        boxAlert(response["mensaje"], "error");
      }
    }
  } catch (error) {
    console.log("error :>> ", error);
  }
};

const SumaDosCampos = (idCampo1, idCampo2, idCampoResultado) => {
  let campo1 = unformatNumber(document.getElementById(`${idCampo1}`).value || 0);
  let campo2 = unformatNumber(document.getElementById(`${idCampo2}`).value || 0);

  let totalSuma = parseFloat(campo1) + parseFloat(campo2);
  document.getElementById(`${idCampoResultado}`).value = formatNumber(totalSuma);
  sumarTotalIngresos();
  sumarTotalEgresos();
  sumarIngresosEgresos();
};

const sumarTotalIngresos = () => {
  let elementosASumar = document.querySelectorAll(
    `#containerIngresosEgresos .totalFilaIngreso`
  );
  let sumaGlobal = 0;
  elementosASumar.forEach((inputTotal) => {
    sumaGlobal += parseFloat(unformatNumber(inputTotal.value || 0));
  });
  document.getElementById("sumaTotalIngresos").value = formatNumber(parseFloat(sumaGlobal));
};

const sumarTotalEgresos = () => {
  let elementosASumar = document.querySelectorAll(
    `#containerIngresosEgresos .totalFilaEgreso`
  );
  let sumaGlobal = 0;
  elementosASumar.forEach((inputTotal) => {
    sumaGlobal += parseFloat(unformatNumber(inputTotal.value || 0));
  });

  document.getElementById("sumaTotalEgresos").value = formatNumber(parseFloat(sumaGlobal));
};

const sumarIngresosEgresos = () => {
  let ingresos = unformatNumber(document.getElementById("sumaTotalIngresos").value || 0);
  let egresos = unformatNumber(document.getElementById("sumaTotalEgresos").value || 0);
  let inputGlobal = document.getElementById("sumaGlobal");
  inputGlobal.value = formatNumber(parseFloat(ingresos) - parseFloat(egresos));
};

const actualizarProforma = async (formulario) => {
  try {
    event.preventDefault();
    if (!validarFormulario(formulario))
      return ToastAlert("Algunos campos son necesarios", "warning");

    let trsProformas = document.querySelectorAll("#containerFinanciamiento tr");
    let arrayFinal = [];
    trsProformas.forEach((row) => {
      let tds = row.querySelectorAll("input");
      let objTemp = {
        tipo: tds[0].value,
        fecha: tds[1].value,
        valor: unformatNumber(tds[2].value),
        saldo: unformatNumber(tds[3].value),
        descripcion: tds[4].value,
        banco: tds[5].value,
      };
      arrayFinal.push(objTemp);
    });

    /* obtener ingresos y egresos */
    let arrayIngresosEgresos = [];
    let objEsposo = {
      tipo: "Esposo",
      ingresoFijo: unformatNumber(document.getElementById("iFEsposo").value),
      ingresoExtra: unformatNumber(document.getElementById("iEEsposo").value),
      ingresoTotal: unformatNumber(document.getElementById("totalIngresoEsposo").value),
      egresoFijo: unformatNumber(document.getElementById("eFEsposo").value),
      rolPago: unformatNumber(document.getElementById("pagosEsposo").value),
      egresoTotal: unformatNumber(document.getElementById("totalEgresosEsposo").value),
    };
    let objEsposa = {
      tipo: "Esposa",
      ingresoFijo: unformatNumber(document.getElementById("iFEsposa").value),
      ingresoExtra: unformatNumber(document.getElementById("iEEsposa").value),
      ingresoTotal: unformatNumber(document.getElementById("totalIngresoEsposa").value),
      egresoFijo: unformatNumber(document.getElementById("eFEsposa").value),
      rolPago: unformatNumber(document.getElementById("pagosEsposa").value),
      egresoTotal: unformatNumber(document.getElementById("totalEgresosEsposa").value),
    };
    arrayIngresosEgresos.push(objEsposo);
    arrayIngresosEgresos.push(objEsposa);

    /* checboxs */
    // let PROCO_conjunto01 = (document.getElementById("PROCO_conjunto01").checked) ? 1 : 0
    // let PROCO_conjunto02 = (document.getElementById("PROCO_conjunto02").checked) ? 1 : 0
    let PROCO_conjunto01 = document.getElementById("PROCO_conjunto01").value;

    let data = new FormData(formulario);
    data.append("PROCO_finaciamiento_entrada", JSON.stringify(arrayFinal));
    data.append("PROCO_ingresos_egresos", JSON.stringify(arrayIngresosEgresos));
    data.append("PROCO_conjunto01", PROCO_conjunto01);
    data.append("PROCO_conjunto02", 0);

    let response = await customFetch(
      API_ROUTES.PROFORMAS.ACTUALIZAR,
      "POST",
      data
    );
    if (response["codigo"] > 0) {
      boxAlert(response["mensaje"], "success");
    } else {
      boxAlert(response["mensaje"], "error");
    }
  } catch (error) {
    console.log("error :>> ", error);
  }
};

const generarTarjetaPDF = async (elemento) => {
  try {
    let idProforma = elemento.dataset.id_proforma;
    let response = await customFetch(
      API_ROUTES.PROFORMAS.DETALLE_PDF + `/${idProforma}`,
      "GET",
      null,
      "buffer"
    );
    arrayBufferToPDF("contenidoGeneralPDF", response);
  } catch (error) {
    console.log("error :>> ", error);
  }
};

document.addEventListener('focus', function (e) {
  const target = e.target;

  if (target.matches('[data-number_format]') && !target.hasAttribute('data-autonumeric-initialized')) {
    const formatType = target.dataset.number_format;
    const options = {
      digitGroupSeparator: ',',
      decimalCharacter: '.',
      decimalPlaces: 0, // No agregar decimales automáticamente al principio
      currencySymbol: '',
      currencySymbolPlacement: 's',
      emptyInputBehavior: 'always',
      minimumValue: '0',
      decimalPlaces: 2
    };

    if (formatType === "money") {
      options.decimalPlaces = 2; // Permitir dos decimales para el formato "money"
    } else {
      options.allowDecimalPadding = false;
    }

    new AutoNumeric(target, options);

    // Marcar el elemento como inicializado con AutoNumeric
    target.setAttribute('data-autonumeric-initialized', true);
  }
}, true); // Captura del evento de foco

document.addEventListener('blur', function (e) {
  const target = e.target;

  if (target.matches('[data-autonumeric-initialized]')) {
    // Destruir AutoNumeric cuando se desenfoca el campo de entrada
    AutoNumeric.remove(target);
    target.removeAttribute('data-autonumeric-initialized');
  }
}, true); // Captura del evento de desenfoque




const formatNumber = (number) => {
  const numberFormat = AutoNumeric.format(number, {
    digitGroupSeparator: ',',
    decimalCharacter: '.',
    decimalPlaces: 2,
    currencySymbol: '',
    currencySymbolPlacement: 's',
    negativeSignCharacter: '-',
    allowNegativeValues: true, // Permitir valores negativos
    negativePositiveSignPlacement: "p",
  });
  return numberFormat;
}

const unformatNumber = (formattedNumber) => {
  const str = String(formattedNumber);
  return parseFloat(str.replace(/,/g, ''));
}
