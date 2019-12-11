<?php
/**
 * Created by PhpStorm.
 * User: babmindra
 * Date: 31.08.2019
 * Time: 13:20
 */

namespace app\controllers;


use app\models\AppModel; // пространство нашей модели
use app\widgets\currency\Currency;
use mobel\App;
use mobel\base\Controller;
use mobel\Cache; //пространство имен базового контроллера

class AppController extends Controller // подключаем базовый контроллер нашего фреймворка
{
    public function __construct($route)
    {
        parent::__construct($route); // наследуем конструктор родителя со значение маршрута
        new AppModel(); //создаем новую модель приложения
        App::$app->setProperty('currencies', Currency::getCurrencies()); //записываем в реестр список валют
        App::$app->setProperty('currency', Currency::getCurrency(App::$app->getProperty('currencies'))); //записываем в реестр значение активной валюты с помощью
        // метода getCurrency, в который свойством передаем массив currency записынный в реестре
        App::$app->setProperty('cats', self::cacheCategory()); //записываем в реестр кеш категории
    }

    public function cacheCategory(){
        $cache = Cache::instance(); // создаем обьект кеша
        $cats = $cache->getCache('cats'); // присваиваем cats значение ключа cats в кеше
        /*if(!$cats){ // если cats пуст
            $cats = \RedBeanPHP\R::getAssoc('SELECT * FROM category'); //присваиваем cats ассоц массив категорий из БД
            $cache->setCache('cats', $cats); //записываем переменную cats в кеш
        }*/
        return $cats; //возвращаем переменную cats
    }
}