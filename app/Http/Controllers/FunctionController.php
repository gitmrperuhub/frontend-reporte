<?php

namespace App\Http\Controllers;

use CURLFile;
use Illuminate\Http\Request;

class FunctionController extends Controller
{
    
    public static function ApiRest($url, $parameter =array(), $method){ 
        //$APP_URL_MR = 'http://localhost/back-mrpe-develop/public/api/login';
        $APP_URL_MR = config('app.app_name_mr_peru'); 
        $urlAbsolute =$APP_URL_MR.$url ;
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $urlAbsolute,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => $method,
        CURLOPT_POSTFIELDS => http_build_query($parameter),
        CURLOPT_HTTPHEADER => array(
            'Accept: application/json',
            'Content-Type:application/x-www-form-urlencoded',
            'Authorization: Bearer '. session()->get("Token")
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response, JSON_FORCE_OBJECT);
    }
    public static function ApiRestWithToken($url, $parameter =array(), $method){ 
        $curl = curl_init();
        $APP_URL_MR = config('app.app_name_mr_peru'); 
        $urlAbsolute =$APP_URL_MR.$url ;
        curl_setopt_array($curl, array(
            CURLOPT_URL => $urlAbsolute,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => http_build_query($parameter),
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Content-Type:application/x-www-form-urlencoded',
                //'Content-Type: application/json',
                'Authorization: Bearer '. session()->get("Token")
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response, JSON_FORCE_OBJECT);
    }
    public static function ApiRestWithOutToken($url, $parameter =array(), $method){ 
        //$APP_URL_MR = 'http://localhost/back-mrpe-develop/public/api/login';
        $APP_URL_MR = config('app.app_name_mr_peru'); 
        $urlAbsolute =$APP_URL_MR.$url ;
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $urlAbsolute,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => $method,
        CURLOPT_POSTFIELDS => $parameter,
        CURLOPT_HTTPHEADER => array(
            'Accept: application/json',
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response, JSON_FORCE_OBJECT);
    }
    public static function apiRestFile($url, $parameter =array(), $method){
        $APP_URL_MR = config('app.app_name_mr_peru'); 
        $urlAbsolute =$APP_URL_MR.$url ;
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://localhost/back-mrpe-develop/public/api/servicio/request-file',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>  $parameter,
        CURLOPT_HTTPHEADER => array(
            'accept: application/json'
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        //return json_decode($response, JSON_FORCE_OBJECT);
        echo $response;
    }
    public static function view($view, $datos=[]){
        if (session()->get("Nombre")){
            return view($view)->with('compact', $datos);;
        }
        return redirect('/');
    }
}
