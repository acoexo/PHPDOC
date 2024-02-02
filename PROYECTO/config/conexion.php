<?php
/**
 * Class Conectar
 *
 * This class handles the database connection using PDO.
 *
 * @package config
 */
class Conectar
{
    /**
     * @var PDO Database handle
     */
    protected $dbh;

    /**
     * Establishes a database connection using PDO.
     *
     * @return PDO The PDO instance representing the database connection.
     * @throws PDOException If an error occurs during the database connection.
     */
    protected function conexion()
    {
        try {
            $conectar = $this->dbh = new PDO('mysql:host=localhost; dbname=andercode_soap', 'root', '');
            return $conectar;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            die();
        }
    }

    /**
     * Sets the character set for the database connection.
     *
     * @return bool Returns true on success, false on failure.
     */
    public function set_names()
    {
        return $this->dbh->query("SET NAMES utf8");
    }

    /**
     * Executes a simple database query.
     *
     * @param string $sql The SQL query to be executed.
     * @return PDOStatement|false The PDOStatement object representing the result set, or false on failure.
     */
    public function consultaSimple($sql)
    {
        $this->conexion();
        $resultado = $this->dbh->query($sql);
        return $resultado;
    }
}
