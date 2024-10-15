<?php

class ControllerUsuarios extends Controller
{

  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    SessionManager::validateGlobalSession();
    return $this->view("home", ["titlePage" => "menu"]);
  }

  public function viewRegistro()
  {
    SessionManager::validateGlobalSession();
    return $this->view("admin/usuarios/registro");
  }

  public function viewActualizacion($id)
  {
    SessionManager::validateGlobalSession();
    $proforma = ControllerProformaCompra::buscarProformaPorId($id)->datos;
    return $this->view("admin/usuarios/actualizacion", [
      "proforma" => $proforma
    ]);
  }

  public function viewHistorial()
  {
    SessionManager::validateGlobalSession();
    $usuarios = ControllerUsuarios::listarUsuarios()->datos;
    return $this->view("admin/usuarios/historial", [
      "usuarios" => $usuarios,
    ]);
  }

  public function insertarUsuario(Request $request)
  {
    SessionManager::validateGlobalSession();
    $idUsuario = SessionManager::get("userGlobal")["id"];
    $request->__set("USU_id01", $idUsuario);

    $usuarioModel = new Usuarios();
    $existeUser = $usuarioModel->where("USU_user", "=", $request->USU_user)->first();
    if ($existeUser)  return new Respuesta(EMensajes::ERROR, "El usuario ya esta en uso.");

    if ($request->USU_password != null) {
      $request->USU_password = (password_hash($request->USU_password, PASSWORD_DEFAULT, ['cost' => 12]));
    }

    $id = $usuarioModel->insert($request->all());
    $v = ($id > 0);
    $respuesta = new Respuesta($v ? EMensajes::INSERCION_EXITOSA : EMensajes::ERROR_INSERSION);
    $respuesta->setCodigo($id);
    return $respuesta;
  }

  public static function listarUsuarios()
  {
    SessionManager::validateGlobalSession();
    $usuarioModel = new Usuarios();
    $usuarios = $usuarioModel->where("USU_estado", "=", 1)->get();
    foreach ($usuarios as &$usuario) {
      $responsable = ControllerUsuarios::buscarUsuarioPorId($usuario->USU_id01);
      $usuario->responsable = $responsable->datos;
    }
    $v = count($usuarios);
    $respuesta = new Respuesta($v ? EMensajes::CORRECTO : EMensajes::ERROR);
    $respuesta->setDatos($usuarios);
    return $respuesta;
  }

  public function ValidaUsuarioLogin(Request $request)
  {
    $usuarioModel = new Usuarios();
    $respuesta = new Respuesta();
    $usuarioExisteDB = $usuarioModel->where("USU_user", "=", $request->USU_user)->first();
    if (isset($usuarioExisteDB)) {
      if (password_verify($request->USU_password, $usuarioExisteDB->USU_password)) {
        SessionManager::set("userGlobal", [
          "nombres" => $usuarioExisteDB->USU_nombres,
          "apellidos" => $usuarioExisteDB->USU_apellidos,
          "nombreCompleto" => $usuarioExisteDB->USU_nombres . " " . $usuarioExisteDB->USU_apellidos,
          "rol" => $usuarioExisteDB->USU_rol,
          "id" => $usuarioExisteDB->USU_id
        ]);

        $urlLogin = URL::to("/admin/proformas/view_historial");
        $respuesta->setCodigo(1);
        $respuesta->setMensaje("Bienvenido al sistema");
        $respuesta->setDatos(["url" => $urlLogin]);
      } else {
        $respuesta->setCodigo(-1);
        $respuesta->setMensaje("La contraseña no es valida");
      }
    } else {
      $respuesta->setCodigo(-1);
      $respuesta->setMensaje("El usuario no es valido");
    }
    return $respuesta;
  }

  public function cerrarSession()
  {
      // Cerrar la sesión
      $session = new SessionManager();
      $session->destroy();

      // Cerrar la conexión a la base de datos
      Conexion::desconectar();

      // Redirigir al login
      $urlLogin = URL::to("login");
      return header("Location: $urlLogin");
  }

  public function actualizarUsuario(Request $request)
  {
    SessionManager::validateGlobalSession();
    $usuarioModel = new Usuarios();
    if ($request->USU_password != "") {
      $request->USU_password = (password_hash($request->USU_password, PASSWORD_DEFAULT, ['cost' => 12]));
    } else {
      $request->__remove("USU_password");
    }
    $actualizados = $usuarioModel->where("USU_id", " = ", $request->USU_id)->update($request->all());
    $v = ($actualizados >= 0);
    $respuesta = new Respuesta($v ? EMensajes::ACTUALIZACION_EXITOSA : EMensajes::ERROR_ACTUALIZACION);
    $respuesta->setDatos(ControllerUsuarios::buscarUsuarioPorId($request->USU_id)->datos);
    return $respuesta;
  }

  public static function eliminarUsuario($id)
  {
    SessionManager::validateGlobalSession();
    $usuarioModel = new Usuarios();
    $actualizados = $usuarioModel->where("USU_id", " = ", $id)->update([
      "USU_estado" => 0
    ]);
    $v = ($actualizados >= 0);
    $respuesta = new Respuesta($v ? EMensajes::ACTUALIZACION_EXITOSA : EMensajes::ERROR_ACTUALIZACION);
    $respuesta->setDatos(ControllerUsuarios::buscarUsuarioPorId($id)->datos);
    return $respuesta;
  }

  public static function buscarUsuarioPorId($id)
  {
    SessionManager::validateGlobalSession();
    $usuarioModel = new Usuarios();
    $usuario = $usuarioModel->where("USU_id", " = ", $id)->first();
    $responsable = $usuarioModel->where("USU_id01", " = ", $usuario->USU_id01)->first();
    $usuario->responsable = $responsable;
    $v = ($usuario != null);
    $respuesta = new Respuesta($v ? EMensajes::CORRECTO : EMensajes::NO_HAY_REGISTROS);
    $respuesta->setDatos($usuario);
    return $respuesta;
  }
}
