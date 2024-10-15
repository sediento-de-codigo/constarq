<?php
class ControllerProformaCompra extends Controller
{

  function __construct()
  {
    parent::__construct();
  }

  public function viewRegistro()
  {
    SessionManager::validateGlobalSession();
    return $this->view("admin/proformas/registro");
  }

  public function viewActualizacion($id)
  {
    SessionManager::validateGlobalSession();
    $proforma = ControllerProformaCompra::buscarProformaPorId($id)->datos;
    return $this->view("admin/proformas/actualizacion", [
      "proforma" => $proforma
    ]);
  }

  public function viewHistorial()
  {
    $filter = $_GET['filter'] ?? null; 
    $value = $_GET['value'] ?? null;
    
    SessionManager::validateGlobalSession();

    if (isset($filter) && isset($value) && $value != "" && $filter !== "all") {
      $proformas = ControllerProformaCompra::buscarProformaPor($filter, $value)->datos;
    } elseif (isset($filter) && $filter == "all") {
      $proformas = ControllerProformaCompra::listarProformas()->datos;
    }else {
      $proformas = ControllerProformaCompra::listarProformas()->datos;
    }
    
    return $this->view("admin/proformas/historial", [
      "proformas" => $proformas,
    ]);
  }

  public static function insertarProforma(Request $request)
  {
    SessionManager::validateGlobalSession();
    date_default_timezone_set('America/Lima');

    $request->__set("PROCO_valor_inmueble", str_replace(',', '', $request->PROCO_valor_inmueble));
    $request->__set("PROCO_area", str_replace(',', '', $request->PROCO_area));
    $request->__set("PROCO_patio", str_replace(',', '', $request->PROCO_patio));
    $request->__set("PROCO_parqueadero", str_replace(',', '', $request->PROCO_parqueadero));
    $request->__set("PROCO_terraza", str_replace(',', '', $request->PROCO_terraza));
    $request->__set("PROCO_valor_entrada", str_replace(',', '', $request->PROCO_valor_entrada));
    $request->__set("PROCO_credito_bancario", str_replace(',', '', $request->PROCO_credito_bancario));

    $proformaModel = new ProformaCompra();
    $usuario = SessionManager::get("userGlobal")["id"];
    $request->__set("USU_id01", $usuario);
    $id = $proformaModel->insert($request->all());
    $v = ($id > 0);
    $respuesta = new Respuesta($v ? EMensajes::INSERCION_EXITOSA : EMensajes::ERROR_INSERSION);
    $respuesta->setCodigo($id);
    return $respuesta;
  }

  public static function listarProformas()
  {
    SessionManager::validateGlobalSession();
    $tarjetaModel = new ProformaCompra();
    
    if (SessionManager::get("userGlobal")["rol"] !== "ADMINISTRADOR") {
      $lista = $tarjetaModel->where("USU_id01", "=", SessionManager::get("userGlobal")["id"] )->get();
    } else {
      $lista = $tarjetaModel->get();
    }

    foreach ($lista as &$proforma) {
      $responsable = ControllerUsuarios::buscarUsuarioPorId($proforma->USU_id01);
      $proforma->responsable = $responsable->datos;
    }
    $v = count($lista);
    $respuesta = new Respuesta($v ? EMensajes::CORRECTO : EMensajes::ERROR);
    $respuesta->setDatos($lista);
    return $respuesta;
  }

  public static function buscarProformaPorId($id)
  {
    $proformaModel = new ProformaCompra();
    $registro = $proformaModel->where("PROCO_id", " = ", $id)->last();
    $v = ($registro != null);
    $respuesta = new Respuesta($v ? EMensajes::CORRECTO : EMensajes::NO_HAY_REGISTROS);
    $respuesta->setDatos($registro);
    return $respuesta;
  }


  public static function actualizarProforma(Request $request)
  {
    SessionManager::validateGlobalSession();

    $request->__set("PROCO_valor_inmueble", str_replace(',', '', $request->PROCO_valor_inmueble));
    $request->__set("PROCO_area", str_replace(',', '', $request->PROCO_area));
    $request->__set("PROCO_patio", str_replace(',', '', $request->PROCO_patio));
    $request->__set("PROCO_parqueadero", str_replace(',', '', $request->PROCO_parqueadero));
    $request->__set("PROCO_terraza", str_replace(',', '', $request->PROCO_terraza));
    $request->__set("PROCO_valor_entrada", str_replace(',', '', $request->PROCO_valor_entrada));
    $request->__set("PROCO_credito_bancario", str_replace(',', '', $request->PROCO_credito_bancario));
    
    $proformaModel = new ProformaCompra();
    $actualizados = $proformaModel->where("PROCO_id", " = ", $request->PROCO_id)->update($request->all());
    $v = ($actualizados >= 0);
    $respuesta = new Respuesta($v ? EMensajes::ACTUALIZACION_EXITOSA : EMensajes::ERROR_ACTUALIZACION);
    return $respuesta;
  }

  public static function eliminarProforma(Request $request)
  {
    SessionManager::validateGlobalSession();

    $proformaModel = new ProformaCompra();
    $actualizados = $proformaModel->where("PROCO_id", " = ", $request->PROCO_id)->update([
      "PROCO_estado" => 0
    ]);
    $v = ($actualizados >= 0);
    $respuesta = new Respuesta($v ? EMensajes::ACTUALIZACION_EXITOSA : EMensajes::ERROR_ACTUALIZACION);
    $respuesta->setDatos(ControllerProformaCompra::buscarproformaPorId($request->PROCO_id)->datos);
    return $respuesta;
  }

  public static function buscarProformaPor($filter, $value)
  {
      SessionManager::validateGlobalSession();
      $proformaModel = new ProformaCompra();

      // Filtros que deben usar el operador '=' en lugar de 'LIKE'
      $filtersWithEqual = [
          'PROCO_id',
          'PROCO_num_casa',
          'PROCO_estado_visita',
          'PROCO_sub_estado',
          'PROCO_fecha_registro',
          'PROCO_usuario'
      ];

      // Determinar el operador a usar según el filtro
      $operator = in_array($filter, $filtersWithEqual) ? '=' : 'LIKE';
      
      // Si es LIKE, adaptar el valor para búsqueda parcial
      //aqui cambie el operador de exaftamente igual a igual
      $searchValue = ($operator ='LIKE') ? "%$value%" : $value;

      //aca manuel colocar la condicion para buscar por date PROCO_fecha_registro aca un ejemplo
      $lista = $proformaModel->where("PROCO_id", " = ", $request->PROCO_id)->get();

      // Ejecutar la consulta con el filtro adecuado
      $lista = $proformaModel->where($filter, $operator, $searchValue)->get();

      // Añadir el responsable a cada proforma
      foreach ($lista as &$proforma) {
          $responsable = ControllerUsuarios::buscarUsuarioPorId($proforma->USU_id01);
          $proforma->responsable = $responsable->datos;
      }

      $v = count($lista);
      $respuesta = new Respuesta($v ? EMensajes::CORRECTO : EMensajes::NO_HAY_REGISTROS);
      $respuesta->setDatos($lista);

      return $respuesta;
  }  
}
