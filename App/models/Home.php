<?php
namespace App\models;
defined("APPPATH") OR die("Access denied");

use \Install\Database;

class Home{

    public static function getAll(){
        $mysqli = Database::getInstance();
        $query=<<<sql
       SELECT * FROM transporte
sql;
        return $mysqli->queryAll($query);
    }

    public static function insert($transporte){
        $mysqli = Database::getInstance(1);
        $query=<<<sql
        INSERT INTO transporte VALUES(null, '$transporte->_matricula', '$transporte->_marca', '$transporte->_modelo', '$transporte->_color', '$transporte->_descripcion')
sql;


        $id = $mysqli->insert($query);
        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_id = $id;

        return $id;
    }

    public static function getIdTransporte(){
        $mysqli = Database::getInstance();
        $query=<<<sql
      SELECT * FROM transporte 
sql;
        return $mysqli->queryAll($query);
    }

    public static function insert_10_registros(){
        $mysqli = Database::getInstance(1);
        $query=<<<sql
        INSERT INTO transporte ('id_producto', 'nombre_producto', 'SKU', 'codigo_barras', 'id_modelo', 'especificaciones', 'precio_compra', 'precio_venta', 'stock', 'fecha_alta') 
        VALUES (NULL, 'Holaaaaaa', '11', '11', '7', '11', '11', '11', '11', 'current_timestamp()');
sql;

        $id = $mysqli->insert($query);
        if($id)
        {
            $id =  $mysqli->error;
        }
        else
        {
            $id = $mysqli->errno;
        }

        return $id;
    }

}
