document.addEventListener("DOMContentLoaded", (e) => {
  if (document.querySelector("[data-admin_panel]") !== null) {
    activarItemSidebar();
  }
});

function hideLoader() {
  let loader = document.getElementById("preloader");
  if (loader !== null) {
    loader.style.setProperty("visibility", "hidden");
    loader.style.setProperty("opacity", 0);
  }
}

function showLoader() {
  let loader = document.getElementById("preloader");
  if (loader !== null) {
    loader.style.setProperty("visibility", "visible");
    loader.style.setProperty("opacity", 1);
  }
}

const validarFormulario = (formulario) => {
  const listaCampos = formulario.querySelectorAll(`[data-validate]`);
  let validacion = true;

  if (listaCampos.length > 0) {
    listaCampos.forEach((elemento) => {
      const tipoElemento = elemento.getAttribute("type");
      //validamos campos con value
      if (elemento.value === "") {
        validacion = false;
        elemento.style.setProperty("border", "1px solid red");
        setTimeout(() => {
          elemento.style.setProperty("border", "");
        }, 2000);
      }

      //validamos campos tipo checkbox
      if (tipoElemento === "checkbox" && !elemento.checked) {
        validacion = false;
        elemento.style.setProperty("border", "1px solid red");
        setTimeout(() => {
          elemento.style.setProperty("border", "");
        }, 2000);
      }

      //validamos campos tipo radio
      if (tipoElemento === "radio") {
        const name = elemento.getAttribute("name");
        const inputsRadio = document.querySelectorAll(
          `input[type="radio"][name="${name}"]`
        );
        let checked = false;

        inputsRadio.forEach((radio) => {
          if (radio.checked) {
            checked = true;
          }
        });

        if (!checked) {
          validacion = false;
        }
      }
    });
  }
  return validacion;
};

const customFetch = async (
  url,
  method = "GET",
  datos = null,
  parseType = "json"
) => {
  try {
    const options = {
      method: method,
      body: datos,
    };
    showLoader();
    const response = await fetch(url, options);
    if (!response.ok) {
      throw new Error("Error de red: " + response.status);
    }
    hideLoader();
    switch (parseType) {
      case "text":
        return await response.text();
      case "buffer":
        return await response.arrayBuffer();
      case "json":
      default:
        return await response.json();
    }
  } catch (error) {
    throw error;
  }
};

// Ejemplo de uso
const ToastAlert = (
  title = "Toast por defecto",
  icon = "success",
  position = "bottom-end"
) => {
  const Toast = Swal.mixin({
    toast: true,
    position,
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.onmouseenter = Swal.stopTimer;
      toast.onmouseleave = Swal.resumeTimer;
    },
  });
  Toast.fire({
    icon,
    title,
  });
};

const boxAlert = (
  title = "Mensaje por defecto",
  icon = "success",
  tiempo = "3000"
) => {
  Swal.fire({
    position: "center",
    icon: icon,
    title: title,
    showConfirmButton: false,
    timer: tiempo,
  });
};

document.addEventListener("click", (e) => {
  if (e.target.matches(".btnSidebar")) {
    localStorage.setItem("idActiveElSidebarPaita", e.target.id);
  }
});

const activarItemSidebar = () => {
  let idElementoActivo = localStorage.getItem("idActiveElSidebarPaita");
  let elementoActivo = document.getElementById(idElementoActivo);
  let elementoMenuPadre = elementoActivo.parentNode.parentNode.parentNode;
  //obtener el dropdown padre
  if (elementoMenuPadre.dataset.parent !== undefined) {
    //elementoActivo.style.setProperty('color', 'white', 'important');
    elementoMenuPadre.classList.add("mm-active");
   
  } else {
    let selectorParent = "[data-parent]";
    let selectorChild = "[data-child]";
    let liParent = elementoActivo.closest(selectorParent);
    let liChild = elementoActivo.closest(selectorChild);

    liParent.classList.add("mm-active");
    liChild.classList.add("mm-active");
    //elementoActivo.style.setProperty('color', 'white', 'important');
  }
};

const fileToBase64 = (image) => {
  return new Promise((resolve, reject) => {
    // Crear un objeto FileReader para leer el contenido de la imagen
    let reader = new FileReader();

    // Definir una función onload para el objeto FileReader
    reader.onload = function (event) {
      let base64Image = event.target.result;
      resolve(base64Image);
    };
    reader.onerror = function (error) {
      reject(error);
    };

    // Leer el contenido de la imagen como base64
    reader.readAsDataURL(image);
  });
};

const base64ToArrayBuffer = (base64Data) => {
  const binaryString = window.atob(base64Data);
  const byteArray = new Uint8Array(binaryString.length);
  for (let i = 0; i < binaryString.length; i++) {
    byteArray[i] = binaryString.charCodeAt(i);
  }
  return byteArray.buffer;
};

function bufferToDownloadExcel(buffer, nombreArchivo) {
  const blob = new Blob([buffer], { type: "application/octet-stream" });
  const url = window.URL.createObjectURL(blob);
  const a = document.createElement("a");
  a.href = url;
  a.download = nombreArchivo;
  document.body.appendChild(a);
  a.click();
  window.URL.revokeObjectURL(url);
  document.body.removeChild(a);
}

function base64ToDownloadEXCEL(base64Content, nombreArchivo) {
  // Decodificar el contenido Base64
  const byteCharacters = atob(base64Content);
  const byteNumbers = new Array(byteCharacters.length);
  for (let i = 0; i < byteCharacters.length; i++) {
    byteNumbers[i] = byteCharacters.charCodeAt(i);
  }
  const byteArray = new Uint8Array(byteNumbers);

  // Crear un Blob a partir del array de bytes
  const blob = new Blob([byteArray], {
    type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
  });

  // Crear un enlace de descarga y hacer clic en él para descargar el archivo
  const url = URL.createObjectURL(blob);
  const link = document.createElement("a");
  link.href = url;
  link.setAttribute("download", nombreArchivo);
  document.body.appendChild(link);
  link.click();

  // Limpiar
  URL.revokeObjectURL(url);
  document.body.removeChild(link);
}

async function convertirBase64(file) {
  const lector = new FileReader();

  lector.readAsBinaryString(file);

  return new Promise((resolve, reject) => {
    lector.onload = function (evento) {
      const contenido = evento.target.result;
      const base64 = btoa(contenido); // Convierte el contenido a base64
      resolve(base64);
    };
    lector.onerror = function (error) {
      reject(error);
    };
  });
}

function descargarExcel(base64Data) {
  const byteCharacters = atob(base64Data);
  const byteNumbers = new Array(byteCharacters.length);
  for (let i = 0; i < byteCharacters.length; i++) {
    byteNumbers[i] = byteCharacters.charCodeAt(i);
  }
  const byteArray = new Uint8Array(byteNumbers);

  // Crear un blob con los datos decodificados
  const blob = new Blob([byteArray], {
    type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
  });

  // Crear un objeto URL para el blob
  const blobUrl = URL.createObjectURL(blob);

  // Crear un enlace para descargar el archivo
  const link = document.createElement("a");
  link.href = blobUrl;
  link.download = "archivo_excel.xlsx"; // Nombre del archivo Excel
  document.body.appendChild(link);
  link.click();
  URL.revokeObjectURL(blobUrl);
}

const arrayBufferToPDF = (idContainer, arrayBuffer) => {
  document.getElementById(idContainer).innerHTML = "";
  $("#modalGeneralPDF").modal("show");
  let blob = new Blob([arrayBuffer], { type: "application/pdf" });
  let blobUrl = URL.createObjectURL(blob);
  let iframe = document.createElement("iframe");
  iframe.src = blobUrl;
  iframe.width = "100%";
  iframe.height = "500px";
  document.getElementById(idContainer).appendChild(iframe);
};

const arrayBufferDownloadPDF = (arrayBuffer) => {
  let blob = new Blob([arrayBuffer], { type: "application/pdf" });
  let downloadLink = document.createElement("a");
  downloadLink.href = URL.createObjectURL(blob);
  downloadLink.download = "Tarjeta_circulacion.pdf";
  downloadLink.style.display = "none";
  downloadLink.click();
};
