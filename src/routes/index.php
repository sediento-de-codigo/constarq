<?php
#GENERAL
//cerrar session
Route::get("/admin/usuarios/cerrar_session", ControllerUsuarios::class . "@cerrarSession");
//validar usuario
Route::post("/admin/usuarios/validar_usuario", ControllerUsuarios::class . "@ValidaUsuarioLogin");

Route::get("/", function () {
  $urlLogin = URL::to("login");
  return header("Location: $urlLogin");
});

Route::get("/login", function () {
  return (new Controller())->view("login");
});

//TARJETAS
Route::get("/admin/proformas/view_registro", ControllerProformaCompra::class . "@viewRegistro");
Route::get("/admin/proformas/view_actualizar/:id", ControllerProformaCompra::class . "@viewActualizacion");
Route::get("/admin/proformas/view_historial", ControllerProformaCompra::class . "@viewHistorial");
Route::post("/admin/proformas/registrar", ControllerProformaCompra::class . "@insertarProforma");
Route::post("/admin/proformas/actualizar", ControllerProformaCompra::class . "@actualizarProforma");
Route::post("/admin/proformas/eliminar", ControllerProformaCompra::class . "@eliminarProforma");
Route::get("/admin/proformas/:id", ControllerProformaCompra::class . "@buscarTarjetaPorId");
Route::get("/admin/proformas/proforma_pdf/:id", ControllerGeneratePDF::class . "@proforma");


//USUARIOS
Route::get("/admin/usuarios/view_registro", ControllerUsuarios::class . "@viewRegistro");
Route::get("/admin/usuarios/view_actualizar/:id", ControllerUsuarios::class . "@viewActualizacion");
Route::get("/admin/usuarios/view_historial", ControllerUsuarios::class . "@viewHistorial");
Route::post("/admin/usuarios/registrar", ControllerUsuarios::class . "@insertarUsuario");
Route::post("/admin/usuarios/actualizar", ControllerUsuarios::class . "@actualizarUsuario");
Route::post("/admin/usuarios/eliminar/:id", ControllerUsuarios::class . "@eliminarUsuario");
Route::get("/admin/usuarios/:id", ControllerUsuarios::class . "@buscarUsuarioPorId");