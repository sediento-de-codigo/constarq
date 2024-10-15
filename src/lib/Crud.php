<?php

class Crud
{

    protected $tabla;
    protected $conexion;
    protected $wheres = "";
    protected $sql = null;

    public function __construct($tabla = null)
    {
        $this->conexion = (new Conexion())->conectar();
        $this->tabla = $tabla;
    }

    public function get()
    {
        try {
            $this->sql = "SELECT * FROM {$this->tabla} {$this->wheres}";
            $sth = $this->conexion->prepare($this->sql);
            $sth->execute();
            return $sth->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function first()
    {
        $lista = $this->get();
        $this->reiniciarValores();
        if (is_array($lista) && count($lista) > 0) {
            return $lista[0];
        } else {
            return null;
        }
    }

    public function last()
    {
        $lista = $this->get();
        $this->reiniciarValores();
        if (is_array($lista) && count($lista) > 0) {
            return end($lista);
        } else {
            return null;
        }
    }

    public function insert($obj)
    {
        try {
            $campos = implode("`, `", array_keys($obj)); //nombre`, `apellido`, `edad
            $valores = ":" . implode(", :", array_keys($obj)); //:nombre, :apellido, :edad
            $this->sql = "INSERT INTO {$this->tabla} (`{$campos}`) VALUES ({$valores})";
            $this->ejecutar($obj);
            $id = $this->conexion->lastInsertId();
            return $id;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function update($obj)
    {
        try {
            $campos = "";
            foreach ($obj as $llave => $valor) {
                $campos .= "`$llave`=:$llave,"; //`nombres`=:nombres,`edad`=:edad
            }
            $campos = rtrim($campos, ",");
            $this->sql = "UPDATE {$this->tabla} SET {$campos} {$this->wheres}";
            $filasAfectadas = $this->ejecutar($obj);
            return $filasAfectadas;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function delete()
    {
        try {
            $this->sql = "DELETE FROM {$this->tabla} {$this->wheres}";
            $filesAfectadas = $this->ejecutar();
            return $filesAfectadas;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function where($llave, $condicion, $valor)
    {
        $this->wheres .= (strpos($this->wheres, "WHERE")) ? " AND " : " WHERE ";
        $valorFormateado = $this->formatValue($valor);
        $this->wheres .= "`$llave` $condicion $valorFormateado";
        return $this;
    }

    public function orWhere($llave, $condicion, $valor)
    {
        $this->wheres .= (strpos($this->wheres, "WHERE")) ? " OR " : " WHERE ";
        $valorFormateado = $this->formatValue($valor);
        $this->wheres .= "`$llave` $condicion $valorFormateado";
        return $this;
    }

    private function formatValue($valor)
    {
        if (is_string($valor)) {
            $valor = "'" . str_replace("'", "\\'", $valor) . "'";
        } elseif (is_null($valor)) {
            $valor = 'NULL';
        } else {
            $valor = $valor;
        }
        return $valor;
    }

    private function ejecutar($obj = null)
    {   
        $sth = $this->conexion->prepare($this->sql);
        if ($obj !== null) {
            foreach ($obj as $llave => $valor) {
                //modificado: se agrego && $valor != 0, para evitar que los valores en 0 se establescan como NULL
                if (empty($valor) && $valor != 0) {
                    $valor = NULL;
                }
                $sth->bindValue(":$llave", $valor);
            }
        }
        if (!$sth->execute()) {
            var_dump($sth->errorInfo());  // Outputs error information if execution fails
            exit;
        }
        $this->reiniciarValores();
        return $sth->rowCount();
    }

    private function reiniciarValores()
    {
        $this->wheres = "";
        $this->sql = null;
    }
}
