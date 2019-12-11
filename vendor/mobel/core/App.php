<?php
/**
 * Created by PhpStorm.
 * User: babmindra
 * Date: 27.08.2019
 * Time: 15:07
 */


namespace mobel;


class App
{

    public static $app; // 'контейнер' нашего приложения куда мы можем положить какие то свойства (или обьекты)
// Для реализации данного контейнера мы используем шаблон проектирования Реестр, для этого есть класс registry
//

    public function __construct()
    {
        $query = trim($_SERVER['QUERY_STRING'], '/'); //обрезаем слеш в конце запроса и присваиваем $query
        session_start(); // запускаем сессию
        self::$app = Registry::instance(); // создаем обьект регистра и ложим его в контейней $app
        $this->getParams(); // при создании обьекта запускаем функцию getParams
        new ErrorHandler(); // создаем обьет класса обработки ошибок
        Router::dispatch($query); // передаем маршрутизатору запрошенный адрес
    }

    protected function getParams()
    {
        $params = require_once CONF . '/params.php'; //присваиваем переменной подключенный файл params.php
        if(!empty($params)){ //проверяем если не пустая переменная $params
            foreach($params as $key => $val){ // перебираем массив
                self::$app->setProperty($key, $val); // в классе App(self) в контейнер-свойство $app ложим наши элементы массива
            }
        }
    }
}