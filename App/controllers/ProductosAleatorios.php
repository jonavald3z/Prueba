<?php
namespace App\controllers;
defined("APPPATH") OR die("Access denied");

use \Install\View;
use \App\models\ProductosAleatorios AS ProductosAleatoriosDao;


class ProductosAleatorios{
    public function index() {

        for($num1 = 1; $num1 <= 200; $num1++)
        {
            $envio = new \stdClass();

            $TipoComputadora = ["Escritorio ", "Portatil Hib ", "Computadora Escritorio ", "Desktop ", "Matebook ", "Green Desktop ", "Gr Portatil ", "MacBook Air "];
            $Marca = ["HP ", "Sony ", "VAIO ", "Alienware ", "Lenovo ", "Huawei ", "Gamer "];
            $Caracteristicas = ["Blanca 15 Pul ", "Madera Touch ", "Touch con Lapiz ", "Tactil ", "360 Empresarial ", "Verde ", "Oro ", "Plata ", "Gold Premium "];
            $TipoComputadoraAleatorio = $TipoComputadora[ mt_rand(0, count($TipoComputadora) -1) ];
            $MarcaAleatorio = $Marca[ mt_rand(0, count($Marca) -1) ];
            $CaracteristicasAleatorio = $Caracteristicas[ mt_rand(0, count($Caracteristicas) -1) ];

            $envio -> _nombre = $TipoComputadoraAleatorio.$MarcaAleatorio.$CaracteristicasAleatorio;

            $envio -> _SKU =  $this->generateSKU();
            $envio -> _codigo_barras = $this->generateQR();
            $envio -> _id_modelo = $this->generateModel();
            $envio -> _especificaciones = $CaracteristicasAleatorio;
            $envio -> _precio_compra = $this->generatePrecioCompra();
            $envio -> _precio_venta = $envio -> _precio_compra * .21 + $envio -> _precio_compra;
            $envio -> _stock = $this->generateStock();

            $id = ProductosAleatoriosDao::insert($envio);

            if($id >= 1){
                echo 'Inserte el producto con pocisión número: '.$num1.' El producto insertado fue: '.$envio -> _nombre;
                echo "<br>"; //* Esto es un salto de linea
            }else{
                echo 'Se rompio el ciclo de insercción en la pocisión: '.$num1;
                echo "<br>"; //* Esto es un salto de linea
            }
        }

    }

    function generateSKU($length = 11)
    {
        return substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }
    function generateQR($length = 12)
    {
        return substr(str_shuffle("0123456789"), 0, $length);
    }
    function generateModel($length = 1)
    {
        return substr(str_shuffle("123456789"), 0, $length);
    }
    function generatePrecioCompra($length = 5)
    {
        return substr(str_shuffle("123456789"), 0, $length);
    }
    function generateStock($length = 2)
    {
        return substr(str_shuffle("123456789"), 0, $length);
    }


}
