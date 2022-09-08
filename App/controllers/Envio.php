<?php
namespace App\controllers;
defined("APPPATH") OR die("Access denied");

use \Install\View;
use \App\models\Envio AS EnvioDao;
use \App\models\Home AS TransporteDao;


class Envio{
    public function index() {

        $extraHeader =<<<html
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Envio</title>
        <link rel="stylesheet" href="../../assets_2/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../assets_2/css/style.css">

html;
        $extraFooter =<<<html

        <script src="../../assets_2/js/jquery-1.12.1.min.js"></script>
        <script src="../../assets_2/js/popper.min.js"></script>
        <script src="../../assets_2/js/bootstrap.min.js"></script>
        <script src="../../assets_2/js/custom.js"></script>
 
html;

        View::set('idVehiculo',$this->getVehiculos());
        View::set('header',$extraHeader);
        View::set('footer',$extraFooter);
        View::render("envio_add");
    }

    public function getVehiculos(){
        $transporte = '';
        foreach (TransporteDao::getIdTransporte() as $key => $value) {
            $transporte .=<<<html
      <option value="{$value['id_transporte']}">{$value['matricula']}</option>
html;
        }
        return $transporte;
    }

    public function EnvioAdd(){
        $envio = new \stdClass();

        $envio -> _destinatario = $_POST['destinatario'];
        $envio -> _emisor = $_POST['emisor'];
        $envio -> _salida = $_POST['salida'];
        $envio -> _llegada = $_POST['llegada'];
        $envio -> _direccion = $_POST['direccion'];
        $envio -> _id_transporte = $_POST['id_transporte'];
        $envio -> _peso = $_POST['peso'];

        $id = EnvioDao::insert($envio);
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
        <title>Envio</title>
        <link rel="stylesheet" href="../../assets_2/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../assets_2/css/style.css">
html;
        $extraFooter =<<<html

        <script src="../../assets_2/js/jquery.form.js"></script>
        <script src="../../assets_2/js/jquery.validate.min.js"></script>
        <script src="../../assets_2/js/mail-script.js"></script>
       
html;

        $regreso = "/Envio/";

        if($parametro == 'add'){
            $mensaje = "Se ha agregado correctamente el envio con clave de ratreo: {$id}";
            $class = "success";
        }

        $regreso = "/Envio/";

        if($parametro == 'error'){
            $mensaje = "Error de Registro, reintente";
            $class = "danger";
        }


        View::set('class',$class);
        View::set('header',$extraHeader);
        View::set('footer',$extraFooter);
        View::set('regreso',$regreso);
        View::set('mensaje',$mensaje);
        View::render("alerta");
    }


}
