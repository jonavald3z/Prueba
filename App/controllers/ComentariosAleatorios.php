<?php
namespace App\controllers;
defined("APPPATH") OR die("Access denied");

use \Install\View;
use \App\models\ProductosAleatorios AS ProductosAleatoriosDao;


class ComentariosAleatorios{
    public function index() {

        for($num1 = 1; $num1 <= 1000; $num1++)
        {
            $envio = new \stdClass();

            $envio -> _id_producto = $this->generateIdProducto();
            $envio -> _texto =  'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged';

            $nombres = ["José ", "Pedro ", "Raúl ", "María ", "Luisa ", "Adriana ", "Angela ", "Alan "];
            $apellidos = ["Pérez ", "Rodriguez ", "Hernández ", "Martínez ", "García ", "Marín ", "Sánchez ", "Smith ", "Rivera ", "Alderson "];
            $nombreAleatorio = $nombres[ mt_rand(0, count($nombres) -1) ];
            $apellidoAleatorio = $apellidos[ mt_rand(0, count($apellidos) -1) ];
            $otroApellidoAleatorio = $apellidos[ mt_rand(0, count($apellidos) -1) ];



            $envio -> _nombre =   $nombreAleatorio.$apellidoAleatorio.$otroApellidoAleatorio;
            $envio -> _calificacion = $this->generateCalificacion();

            $id = ProductosAleatoriosDao::insertcomentario($envio);

            if($id >= 1){
                echo 'Inserte el comentario con pocisión número: '.$num1;
                echo "<br>"; //* Esto es un salto de linea
            }else{
                echo 'Se rompio el ciclo de insercción en la pocisión: '.$num1;
                echo "<br>"; //* Esto es un salto de linea
            }
        }

    }

    function generateIdProducto($length = 2)
    {
        return substr(str_shuffle("123456789"), 0, $length);
    }

    function generateCalificacion($length = 2)
    {
        return substr(str_shuffle("123456789"), 0, $length);
    }



}
