<?php
class Conexion
{
    private static $conexion = null;

    public static function conectar()
    {
        if (self::$conexion == null) {
            try {
                $config = [
                    "driver" => "mysql",
                    "host" => "localhost",
                    "database" => "constarq_2",
                    "port" => 3306,
                    "username" => "root",
                    "password" => "",
                    "charset" => "utf8mb4"
                ];

                $url = "{$config['driver']}:host={$config['host']};port={$config['port']};dbname={$config['database']};charset={$config['charset']}";

                // Crear la conexión
                self::$conexion = new PDO($url, $config['username'], $config['password']);
                
                // Configurar atributos de PDO
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conexion->setAttribute(PDO::ATTR_PERSISTENT, false); // Conexiones no persistentes

            } catch (PDOException $e) {
                error_log("Error de conexión: " . $e->getMessage());
                
                // Intentar reconectar después de un pequeño retraso
                sleep(5);
                return self::conectar(); // Reintentar la conexión
            }
        }
        return self::$conexion;
    }

    // Método para cerrar la conexión explícitamente
    public static function desconectar()
    {
        if (self::$conexion !== null) {
            self::$conexion = null; // Libera la conexión.
        }
    }
}
?>