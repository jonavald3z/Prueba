<?php
namespace App\controllers;
defined("APPPATH") OR die("Access denied");

use \Install\View;
use \App\models\Home AS TransporteDao;


class Home{
    public function index() {
        
        $extraHeader =<<<html
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Home</title>
        <link rel="stylesheet" href="../../assets_2/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../assets_2/css/style.css">
html;
        $extraFooter =<<<html
 
html;


        $transporte = TransporteDao::getAll();
        $tabla= '';
        foreach ($transporte as $key => $value)
        {
            $tabla.=<<<html
                <tr>
                    <td><h6 class="mb-0 text-sm">{$value['matricula']}</h6></td>
                    <td><h6 class="mb-0 text-sm">{$value['marca']}</h6></td>
                    <td><h6 class="mb-0 text-sm">{$value['modelo']}</h6></td>
                    <td><h6 class="mb-0 text-sm">{$value['color']}</h6></td>
                    <td><h6 class="mb-0 text-sm">{$value['descripcion']}</h6></td>
                </tr>
html;
        }

        View::set('header',$extraHeader);
        View::set('footer',$extraFooter);
        View::set('tabla',$tabla);
        View::render("home_all");
    }

    public function Add() {

        $extraHeader =<<<html
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Home</title>
        <link rel="stylesheet" href="../../assets_2/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../assets_2/css/style.css">

html;
        $extraFooter =<<<html

        <script src="../../assets_2/js/jquery-1.12.1.min.js"></script>
        <script src="../../assets_2/js/jquery.validate.min.js"></script>
        <script src="../../assets_2/js/custom.js"></script>
        <script>
html;


        View::set('header',$extraHeader);
        View::set('footer',$extraFooter);
        View::render("transporte_add");
    }

    public function TransporteAdd(){
        $transporte = new \stdClass();

        $transporte -> _matricula = $_POST['matricula'];
        $transporte -> _marca = $_POST['marca'];
        $transporte -> _modelo = $_POST['modelo'];
        $transporte -> _color = $_POST['color'];
        $transporte -> _descripcion = $_POST['descripcion'];


        $id = TransporteDao::insert($transporte);
        if($id >= 1){
            $this->alerta($id,'add');
        }else{
            $this->alerta($id,'error');
        }
    }

    public function alerta($id, $parametro){

        $extraHeader =<<<html
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Home</title>
        
        <link rel="stylesheet" href="../../assets_2/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../assets_2/css/style.css">
html;


        $regreso = "/Home/";

        if($parametro == 'add'){
            $mensaje = "Se ha agregado correctamente";
            $class = "success";
        }

        $regreso = "/Home/";

        if($parametro == 'error'){
            $mensaje = "Error de Registro, reintente";
            $class = "danger";
        }

        View::set('class',$class);
        View::set('header',$extraHeader);
        View::set('regreso',$regreso);
        View::set('mensaje',$mensaje);
        View::render("alerta");
    }







}
