<?php
/**
 * Created by PhpStorm.
 * User: babmindra
 * Date: 17.09.2019
 * Time: 14:59
 */

namespace app\controllers;


use mobel\App;

class CurrencyController extends AppController
{
    public function changeAction(){
        $currency = !empty($_GET['curr']) ? $_GET['curr'] : null;
        if($currency){
            if(array_key_exists($currency, App::$app->getProperty('currencies'))){
                setcookie('currency', $currency, time() + 3600*24*7,'/');
            }
        }
        redirect();
    }

}