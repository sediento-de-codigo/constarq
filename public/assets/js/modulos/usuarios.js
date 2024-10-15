let dataTableUsuarios = null;

window.addEventListener("load", () => {
  dataTableUsuarios = $("#dataTableUsuarios").DataTable({
    info: false,
    language: {
      url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
    },
  });
});

const validarUsuarioLogin = async (formulario) => {
  try {
    event.preventDefault();
    let data = new FormData(formulario);
    let response = await customFetch(API_ROUTES.USUARIOS.LOGIN, "POST", data);
    if (response["codigo"] >= 0) {
      window.location.href = response["datos"]["url"];
    } else {
      ToastAlert(response["mensaje"], "warning");
    }
  } catch (error) {
    console.log("error :>> ", error);
  }
};

const registrarUsuario = async (formulario) => {

  try {
    event.preventDefault();
    if (!validarFormulario(formulario))
      return ToastAlert("Algunos campos son necesarios", "warning");
    let data = new FormData(formulario);

    let response = await customFetch(
      API_ROUTES.USUARIOS.REGISTRAR,
      "POST",
      data
    );
    console.log("response :>> ", response);
    if (response["codigo"] > 0) {
      formulario.reset();
      $('.default-select').niceSelect('update');
      boxAlert(response["mensaje"], "success");
    } else {
      boxAlert(response["mensaje"], "error");
    }

  } catch (error) {
    console.log("error :>> ", error);
  }
};

const actualizarUsuario = async (formulario) => {
  try {
    event.preventDefault();
    if (!validarFormulario(formulario))
      return ToastAlert("Algunos campos son necesarios", "warning");
    let data = new FormData(formulario);

    let response = await customFetch(
      API_ROUTES.USUARIOS.ACTUALIZAR,
      "POST",
      data
    );
    if (response["codigo"] > 0) {
      boxAlert(response["mensaje"], "success");
      $("#modalUsuario").modal("hide");
      let dataAct = response["datos"];
      // Obtén la fila que deseas actualizar
      let trUpdatedElement = $('[data-table="' + dataAct.USU_id + '"]')[0];
      const trUpdated = dataTableUsuarios.row(trUpdatedElement);
      if (dataAct.USU_estado == 0) {
        return trUpdated.remove().draw(false);
      }
      let btnAct = trUpdatedElement.querySelectorAll("a")[0].outerHTML;
      let btnDelete = trUpdatedElement.querySelectorAll("a")[1].outerHTML;
      trUpdated
        .data([
          dataAct.USU_id,
          dataAct.USU_user,
          dataAct.USU_rol,
          dataAct.USU_nombres,
          dataAct.USU_correo,
          dataAct.USU_telefono,
          dataAct.responsable.USU_nombres|| "" + " " +  dataAct.responsable.USU_apellidos || "",
          btnAct + btnDelete
        ])
        .draw(false);
    } else {
      boxAlert(respuesta["mensaje"], "error");
    }
  } catch (error) {
    console.log("error :>> ", error);
  }

};

const obtenerUsuario = async (idUsuario) => {

  try {
    let response = await customFetch(API_ROUTES.USUARIOS.USUARIO + `/${idUsuario}`, "GET");
    console.log('response :>> ', response);
    if (response["codigo"] > 0) {
      let usuario = response["datos"];
      document.getElementById("USU_nombres").value = usuario.USU_nombres || "";
      document.getElementById("USU_id").value = usuario.USU_id || "";
      document.getElementById("USU_apellidos").value = usuario.USU_apellidos || "";
      document.getElementById("USU_user").value = usuario.USU_user || "";
      document.getElementById("USU_rol").value = usuario.USU_rol || "";
      document.getElementById("USU_correo").value = usuario.USU_correo || "";
      document.getElementById("USU_telefono").value = usuario.USU_telefono || "";
      document.getElementById("USU_password").value = "";
    } else {
      boxAlert(response["mensaje"], "error");
    }
  } catch (error) {
    console.log("error :>> ", error);
  }
};

const eliminarUsuario = async (idUsuario) => {

  try {
    Swal.fire({
      title: "¿Estas seguro de eliminar este registro?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Si, eliminar",
      cancelButtonText: "Cancelar",
    }).then( async (result) => {
      if (result.isConfirmed) {
        let response = await customFetch(API_ROUTES.USUARIOS.ELIMINAR + `/${idUsuario}`, "POST");
        if (response["codigo"] > 0) {
          boxAlert(response["mensaje"], "success");
          let updated = response["datos"];
          let trUpdatedElement = $(
            '[data-table="' + updated.USU_id + '"]'
          )[0];
          const trUpdated = dataTableUsuarios.row(trUpdatedElement);
          return trUpdated.remove().draw(false);
        } else {
          boxAlert(response["mensaje"], "error");
        }
      }
    });
  } catch (error) {
    console.log("error :>> ", error);
  }
};
