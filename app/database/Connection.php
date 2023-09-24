<?php
class Connection
{
    private static ?PDO $connect = null;
    public static function getConnection()
    {
        if (!self::$connect) {
            self::$connect = new PDO('mysql:host=localhost;dbname=cadastro_empresa', 'root', '', [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            ]);
        }
        return self::$connect;
    }
}