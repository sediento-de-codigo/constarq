<?php

class Usuarios extends ModelGenerico
{
	protected $USU_id;
	protected $USU_user;
	protected $USU_password;
	protected $USU_rol;
	protected $USU_permisos;
	protected $USU_nombres;
	protected $USU_apellidos;
	protected $USU_correo;
	protected $USU_telefono;
	protected $USU_id01;
	protected $EMPR_id01;
	protected $USU_estado;

	public function __construct($propiedades = null)
	{
		parent::__construct("usuarios", Usuarios::class, $propiedades);
	}

	public function getUSU_id() {
		return $this->USU_id;
	}

	public function setUSU_id($value) {
		$this->USU_id = $value;
	}

	public function getUSU_user() {
		return $this->USU_user;
	}

	public function setUSU_user($value) {
		$this->USU_user = $value;
	}

	public function getUSU_password() {
		return $this->USU_password;
	}

	public function setUSU_password($value) {
		$this->USU_password = $value;
	}

	public function getUSU_rol() {
		return $this->USU_rol;
	}

	public function setUSU_rol($value) {
		$this->USU_rol = $value;
	}

	public function getUSU_permisos() {
		return $this->USU_permisos;
	}

	public function setUSU_permisos($value) {
		$this->USU_permisos = $value;
	}

	public function getUSU_nombres() {
		return $this->USU_nombres;
	}

	public function setUSU_nombres($value) {
		$this->USU_nombres = $value;
	}

	public function getUSU_apellidos() {
		return $this->USU_apellidos;
	}

	public function setUSU_apellidos($value) {
		$this->USU_apellidos = $value;
	}

	public function getUSU_correo() {
		return $this->USU_correo;
	}

	public function setUSU_correo($value) {
		$this->USU_correo = $value;
	}

	public function getUSU_telefono() {
		return $this->USU_telefono;
	}

	public function setUSU_telefono($value) {
		$this->USU_telefono = $value;
	}

	public function getUSU_id01() {
		return $this->USU_id01;
	}

	public function setUSU_id01($value) {
		$this->USU_id01 = $value;
	}

	public function getEMPR_id01() {
		return $this->EMPR_id01;
	}

	public function setEMPR_id01($value) {
		$this->EMPR_id01 = $value;
	}

	public function getUSU_estado() {
		return $this->USU_estado;
	}

	public function setUSU_estado($value) {
		$this->USU_estado = $value;
	}
}