<?php

namespace App\Repositorio;

//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Config;

class FunctionsRepository { 
    function getApi($url, $parameter =[], $method){ 
        $data =$parameter;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
        $response = curl_exec($ch);
        curl_close($ch);
        return json_decode($response, JSON_FORCE_OBJECT);
    }
    function getDayFormatName($fecha){
        $month = array('','Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre');
        $fechats = strtotime($fecha); 
        $Name ='';
        switch (date('w', $fechats)){
            case 0: $Name = "Domingo"; 
            case 1: $Name = "Lunes"; 
            case 2: $Name = "Martes"; 
            case 3: $Name = "Miércoles"; 
            case 4: $Name = "Jueves"; 
            case 5: $Name = "Viernes"; 
            case 6: $Name = "Sábado"; 
        }
        return date('d', $fechats) .' de '.$month[intval(date('m', $fechats))] .' del ' .date('Y', $fechats).' '.date('h', $fechats).':'.date('i', $fechats);
    }
    function getMonthName($fecha){
        $month = array('','Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre');
        $fechats = strtotime($fecha); 
        $Name ='';
        switch (date('w', $fechats)){
            case 0: $Name = "Domingo"; 
            case 1: $Name = "Lunes"; 
            case 2: $Name = "Martes"; 
            case 3: $Name = "Miércoles"; 
            case 4: $Name = "Jueves"; 
            case 5: $Name = "Viernes"; 
            case 6: $Name = "Sábado"; 
        }
        return $month[intval(date('m', $fechats))].' ' .date('Y', $fechats);
    }
     
}