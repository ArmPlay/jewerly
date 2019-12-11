<?php
/**
 * Created by PhpStorm.
 * User: babmindra
 * Date: 16.09.2019
 * Time: 21:06
 */

namespace app\widgets\currency;


use mobel\App;

class Currency
{

    protected $tpl; // свойство, отвечающее за формирование option в selecte
    protected $currencies; //в нем будут хранится список всех валют
    protected $currency; //текущая валюта


    public function __construct()
    {
        $this->tpl = __DIR__ . '/tpl/currencies-tpl.php'; //путь к нашему шаблону валют
        $this->run(); //вызываем метод

    }

    public function run(){ //метод получает список валют и список текущей валюты
        $this->currencies = App::$app->getProperty('currencies'); //заполняем свойство currencies списком валют из реестра
        $this->currency = App::$app->getProperty('currency'); //заполняем свойство currency валютой из currency
        echo $this->getHtml(); //выводим наш файл currencies-tpl
    }

    public static function getCurrencies(){//получает список валют, статичный чтоб вызывать не создавая обьект
        return \RedBeanPHP\R::getAssoc('SELECT code, title, symbol_left, symbol_right, value, base
 FROM currency ORDER BY base DESC'); //получаем ассоц. массив с ключом code и сортируем по базовой сверху.
    }

    public static function getCurrency($currencies){//получает текущую валюту, статичный чтоб вызывать не создавая обьект,параметром передаем список валют
        if(isset($_COOKIE['currency']) && array_key_exists($_COOKIE['currency'],$currencies)){ // если в существует кука с валютой и в нашем массиве валют есть такая валюта
            $key = $_COOKIE['currency']; //записываем значение валюты с куки
        }else{
            $key = key($currencies); //записываем активный элемент массива(нулевой) в связи с этим базовая валюта нулевая
        }
        $currency = $currencies[$key]; //записываем целый массив активной валюты по ключу активной валюты
        $currency['code'] = $key; //добавляем элемент с ключом code, в котором будет храниться код валюты
        return $currency; //возвращаем элемент массива выбранной валюты
    }

    public function getHtml(){//формирует html разметку выбора валюты
        ob_start(); //включаем буферизацию
        require_once $this->tpl; //подключаем разметку валюты, но не выводим
        return ob_get_clean(); //возвращаем буфер разметки валюты
    }
}