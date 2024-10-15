let ROUTE_APP = '';
if (document.querySelector("[data-urlbase]") !== null) {
    ROUTE_APP = document.querySelector("[data-urlbase]").dataset.urlbase;
}

let API_ROUTES = {
    CAPTCHA:`${ROUTE_APP}/admin/tarjetas/valida_captcha`,
    USUARIOS: {
        LOGIN: `${ROUTE_APP}/admin/usuarios/validar_usuario`,
        REGISTRAR: `${ROUTE_APP}/admin/usuarios/registrar`,
        ACTUALIZAR: `${ROUTE_APP}/admin/usuarios/actualizar`,
        ELIMINAR: `${ROUTE_APP}/admin/usuarios/eliminar`,
        USUARIO: `${ROUTE_APP}/admin/usuarios`,
    },
    PROFORMAS: {
        REGISTRAR: `${ROUTE_APP}/admin/proformas/registrar`,
        ACTUALIZAR: `${ROUTE_APP}/admin/proformas/actualizar`,
        ELIMINAR: `${ROUTE_APP}/admin/proformas/eliminar`,
        DETALLE_PDF: `${ROUTE_APP}/admin/proformas/proforma_pdf`,
    },
};