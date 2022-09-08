<?php
namespace App\models;
defined("APPPATH") OR die("Access denied");

use \Install\Database;

class ProductosAleatorios{

    public static function insert($envio){
        $mysqli = Database::getInstance(1);
        $query=<<<sql
        INSERT INTO producto 
        VALUES(
        null, '$envio->_nombre','$envio->_SKU', '$envio->_codigo_barras', '$envio->_id_modelo','$envio->_especificaciones', $envio->_precio_compra,$envio->_precio_venta,$envio->_stock, CURTIME())
sql;

        $id = $mysqli->insert($query);
        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_id = $id;

        return $id;
    }

    public static function insertcomentario($envio){
        $mysqli = Database::getInstance(1);
        $query=<<<sql
        INSERT INTO comentarios
        VALUES(
        null, '$envio->_id_producto','$envio->_texto', '$envio->_nombre', '$envio->_calificacion', CURTIME())
sql;

        $id = $mysqli->insert($query);
        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_id = $id;

        return $id;
    }

}
