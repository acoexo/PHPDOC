<?php
/**
 * Class Usuario
 *
 * This class extends the Conectar class and provides methods for handling user-related database operations.
 *
 * @package models
 */
class Usuario extends Conectar
{
    /**
     * Inserts a new user into the database.
     *
     * @param string $usu_nom The user's first name.
     * @param string $usu_ape The user's last name.
     * @param string $usu_correo The user's email address.
     */
    public function insert_usuario($usu_nom, $usu_ape, $usu_correo)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO tm_usuario(usu_id, usu_nom, usu_ape, usu_correo, est) VALUES (default,?,?,?,'1')";
        $consulta = $conectar->prepare($sql);
        $consulta->bindValue(1, $usu_nom);
        $consulta->bindValue(2, $usu_ape);
        $consulta->bindValue(3, $usu_correo);
        $consulta->execute();
    }
}
