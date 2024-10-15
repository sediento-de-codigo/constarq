<?php

class ProformaCompra extends ModelGenerico
{

	protected $PROCO_id;
	protected $PROCO_nombre_esposo;
	protected $PROCO_cedula_esposo;
	protected $PROCO_nombre_esposa;
	protected $PROCO_cedula_esposa;
	protected $PROCO_tel01;
	protected $PROCO_email01;
	protected $PROCO_tel02;
	protected $PROCO_email02;
	protected $PROCO_conjunto01;
	protected $PROCO_conjunto02;
	protected $PROCO_tiempo_entrega;
	protected $PROCO_num_casa;
	protected $PROCO_financiera;
	protected $PROCO_valor_inmueble;
	protected $PROCO_area;
	protected $PROCO_patio;
	protected $PROCO_parqueadero;
	protected $PROCO_terraza;
	protected $PROCO_valor_entrada;
	protected $PROCO_credito_bancario;
	protected $PROCO_tiempo_financiamiento;
	protected $PROCO_interes_preferencial;
	protected $PROCO_cuota_aprox;
	protected $PROCO_finaciamiento_entrada;
	protected $PROCO_ingresos_egresos;
	protected $PROCO_estado;
	protected $USU_id01;
	protected $PROCO_fecha_registro;
	protected $PROCO_estado_visita;
	protected $PROCO_sub_estado;
	protected $EMPR_id01;
	protected $PROCO_observacion;
	
	

	public function __construct($propiedades = null)
	{
		parent::__construct("proforma_compra", ProformaCompra::class, $propiedades);
	}

	public function getPROCO_id()
	{
		return $this->PROCO_id;
	}

	public function setPROCO_id($value)
	{
		$this->PROCO_id = $value;
	}

	public function getPROCO_nombre_esposo()
	{
		return $this->PROCO_nombre_esposo;
	}

	public function setPROCO_nombre_esposo($value)
	{
		$this->PROCO_nombre_esposo = $value;
	}

	public function getPROCO_cedula_esposo()
	{
		return $this->PROCO_cedula_esposo;
	}

	public function setPROCO_cedula_esposo($value)
	{
		$this->PROCO_cedula_esposo = $value;
	}

	public function getPROCO_nombre_esposa()
	{
		return $this->PROCO_nombre_esposa;
	}

	public function setPROCO_nombre_esposa($value)
	{
		$this->PROCO_nombre_esposa = $value;
	}

	public function getPROCO_cedula_esposa()
	{
		return $this->PROCO_cedula_esposa;
	}

	public function setPROCO_cedula_esposa($value)
	{
		$this->PROCO_cedula_esposa = $value;
	}

	public function getPROCO_tel01()
	{
		return $this->PROCO_tel01;
	}

	public function setPROCO_tel01($value)
	{
		$this->PROCO_tel01 = $value;
	}

	public function getPROCO_email01()
	{
		return $this->PROCO_email01;
	}

	public function setPROCO_email01($value)
	{
		$this->PROCO_email01 = $value;
	}

	public function getPROCO_tel02()
	{
		return $this->PROCO_tel02;
	}

	public function setPROCO_tel02($value)
	{
		$this->PROCO_tel02 = $value;
	}

	public function getPROCO_email02()
	{
		return $this->PROCO_email02;
	}

	public function setPROCO_email02($value)
	{
		$this->PROCO_email02 = $value;
	}

	public function getPROCO_conjunto01()
	{
		return $this->PROCO_conjunto01;
	}

	public function setPROCO_conjunto01($value)
	{
		$this->PROCO_conjunto01 = $value;
	}

	public function getPROCO_conjunto02()
	{
		return $this->PROCO_conjunto02;
	}

	public function setPROCO_conjunto02($value)
	{
		$this->PROCO_conjunto02 = $value;
	}

	public function getPROCO_tiempo_entrega()
	{
		return $this->PROCO_tiempo_entrega;
	}

	public function setPROCO_tiempo_entrega($value)
	{
		$this->PROCO_tiempo_entrega = $value;
	}

	public function getPROCO_num_casa()
	{
		return $this->PROCO_num_casa;
	}

	public function setPROCO_num_casa($value)
	{
		$this->PROCO_num_casa = $value;
	}

	public function getPROCO_financiera()
	{
		return $this->PROCO_financiera;
	}

	public function setPROCO_financiera($value)
	{
		$this->PROCO_financiera = $value;
	}

	public function getPROCO_valor_inmueble()
	{
		return $this->PROCO_valor_inmueble;
	}

	public function setPROCO_valor_inmueble($value)
	{
		$this->PROCO_valor_inmueble = $value;
	}

	public function getPROCO_area()
	{
		return $this->PROCO_area;
	}

	public function setPROCO_area($value)
	{
		$this->PROCO_area = $value;
	}

	public function getPROCO_patio()
	{
		return $this->PROCO_patio;
	}

	public function setPROCO_patio($value)
	{
		$this->PROCO_patio = $value;
	}

	public function getPROCO_parqueadero()
	{
		return $this->PROCO_parqueadero;
	}

	public function setPROCO_parqueadero($value)
	{
		$this->PROCO_parqueadero = $value;
	}

	public function getPROCO_terraza()
	{
		return $this->PROCO_terraza;
	}

	public function setPROCO_terraza($value)
	{
		$this->PROCO_terraza = $value;
	}

	public function getPROCO_valor_entrada()
	{
		return $this->PROCO_valor_entrada;
	}

	public function setPROCO_valor_entrada($value)
	{
		$this->PROCO_valor_entrada = $value;
	}

	public function getPROCO_credito_bancario()
	{
		return $this->PROCO_credito_bancario;
	}

	public function setPROCO_credito_bancario($value)
	{
		$this->PROCO_credito_bancario = $value;
	}

	public function getPROCO_tiempo_financiamiento()
	{
		return $this->PROCO_tiempo_financiamiento;
	}

	public function setPROCO_tiempo_financiamiento($value)
	{
		$this->PROCO_tiempo_financiamiento = $value;
	}

	public function getPROCO_interes_preferencial()
	{
		return $this->PROCO_interes_preferencial;
	}

	public function setPROCO_interes_preferencial($value)
	{
		$this->PROCO_interes_preferencial = $value;
	}

	public function getPROCO_cuota_aprox()
	{
		return $this->PROCO_cuota_aprox;
	}

	public function setPROCO_cuota_aprox($value)
	{
		$this->PROCO_cuota_aprox = $value;
	}

	public function getPROCO_finaciamiento_entrada()
	{
		return $this->PROCO_finaciamiento_entrada;
	}

	public function setPROCO_finaciamiento_entrada($value)
	{
		$this->PROCO_finaciamiento_entrada = $value;
	}

	public function getPROCO_ingresos_egresos()
	{
		return $this->PROCO_ingresos_egresos;
	}

	public function setPROCO_ingresos_egresos($value)
	{
		$this->PROCO_ingresos_egresos = $value;
	}

	public function getPROCO_estado()
	{
		return $this->PROCO_estado;
	}

	public function setPROCO_estado($value)
	{
		$this->PROCO_estado = $value;
	}

	public function getUSU_id01()
	{
		return $this->USU_id01;
	}

	public function setUSU_id01($value)
	{
		$this->USU_id01 = $value;
	}

	public function getPROCO_fecha_registro()
	{
		return $this->PROCO_fecha_registro;
	}

	public function setPROCO_fecha_registro($value)
	{
		$this->PROCO_fecha_registro = $value;
	}

	public function getPROCO_estado_visita()
	{
		return $this->PROCO_estado_visita;
	}

	public function setPROCO_estado_visita($value)
	{
		$this->PROCO_estado_visita = $value;
	}

	public function getPROCO_sub_estado()
	{
		return $this->PROCO_sub_estado;
	}

	public function setPROCO_sub_estado($value)
	{
		$this->PROCO_sub_estado = $value;
	}

	public function getEMPR_id01() {
		return $this->EMPR_id01;
	}

	public function setEMPR_id01($value) {
		$this->EMPR_id01 = $value;
	}

	public function getPROCO_observacion() {
		return $this->PROCO_observacion;
	}

	public function setPROCO_observacion($value) {
		$this->PROCO_observacion = $value;
	}
}