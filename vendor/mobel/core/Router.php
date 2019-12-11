<?php
/**
 * Created by PhpStorm.
 * User: babmindra
 * Date: 29.08.2019
 * Time: 18:26
 */

namespace mobel;


use mysql_xdevapi\Exception;

class Router
{
    protected static $routes = []; // будут хранится маршруты нашего сайта
    protected static $route = []; // будет хранится текущий маршрут, если будет найдено совпадение запроса с записью в $routes

    public static function add($regExp, $route = []) // метод будет записывать правила в таблицу маршрутов. Сюда мы будем записывать
        // шаблон которому будет соответствовать тот иной адрес (набор адресов)
        // параметром принимает регулярное выражение (шаблон адреса), и необязательно принимает конкретный  или экшн
    {
        self::$routes[$regExp] = $route;//в массив маршрутов записывает в массив маршрутов с ключом шаблона значение маршрута
    }

    public static function getRoutes(){
        return self::$routes; // возвращает таблицу маршрутов
    }

    public static function getRoute(){
        return self::$route; // возвращает текущий маршрут
    }

    public static function dispatch($url){ // приминает url адрес. Если matchRoute вернет true - подключит контроллер,
        // если false - выдаст ошибку
        $url = self::removeQueryString($url); // приводит переменную $url к нормальному виду без get параметров
        if(self::matchRoute($url)){
            $controller = 'app\controllers\\' . self::$route['prefix'] . self::$route['controller'] . 'Controller'; //путь к нашему контроллеру
            // где есть постфикс Controller
            if(class_exists($controller)) { // если существует такой класс
                $controllerObject = new $controller(self::$route); // создаем новый экземпляр контроллера, где controller - это название контроллера
                //где параметром передается текущий маршрут
                $action = self::lowerCamelCase(self::$route['action']) . 'Action'; // переменной экшн присваиваем значение экшна текущего маршрута
                // используем lowerCamelCase для экшн и добавляем постфикс Action
                if(method_exists($controllerObject, $action)){ // проверяем существует ли такой экшн
                    $controllerObject->$action(); //обращаемся к методу обьекта-контроллера
                    $controllerObject->getView(); // вызываем метод формировки нашей страницы
                }else{
                    throw new \Exception("Метод {$controller}::{$action} не найден", 404); // если метод не найден - ошибка
                }
            }else{
                throw new \Exception("Контроллер {$controller} не найден", 404); // если контроллер не найден генерируем ошибку
            }
        }else{
            throw new \Exception("Страницы не существует", 404); // иначе выдаем ошибку о несуществующей странице
        }
    }

    public static function matchRoute($url){ // принимает url, ищет соответствие в таблице маршуртов. вернет true или false
        foreach(self::$routes as $pattern => $route){ // перебираем циклом наш массив маршрутов, где $pattern - это регулярна маршрута
            if(preg_match("#{$pattern}#", $url, $matches)){ //если совпадение найдено, то найденное запишем $matches
                foreach($matches as $key => $value){ // перебором полученный массив $matches
                    if(is_string($key)){  // если ключ является строкой
                        $route[$key] = $value;  // записываем в новый массив ключ и его значение
                        // таким образом мы отделили ключи, которые нам необходимы
                    }
                }
                if(empty($route['action'])){ // если пуста значение action в маршруте
                    $route['action'] = 'index'; // то устанавливаем по умолчанию значение index
                }
                if(!isset($route['prefix'])){ // если prefix не существует
                    $route['prefix'] = ''; // создать пустой prefix
                }else{ // а если существует
                    $route['prefix'] .= '\\'; // добавляем обратный слеш в конец
                }
                $route['controller'] = self::upperCamelCase($route['controller']); //приводит строку к имени контроллера
                self::$route = $route; //присваиваем свойству нашего класса route значение переменной route
                return true; //возвращаем true в случае найдено
            }
        }
        return false; // если совпадение не найдено
    }

    protected static function upperCamelCase($name) // приводит строку к имени контроллера (page-newController => PageNewController)
    {
        $name = str_replace('-', ' ',$name); // заменяем тире в имени на пробел
        $name = ucwords($name); // делаем все слова с большой буквы
        $name = str_replace(' ', '', $name); // убираем пробел
        return $name; //возвращаем имя
    }

    protected static function lowerCamelCase($name) // приводит строку к имени экшна PageNew => pageNew
    {
        return lcfirst(self::upperCamelCase($name)); // выводит слово CamelCase с первой маленькой буквы
    }

    protected static function removeQueryString($url) // удаляет get-запросы из query string, но сохраняет их в get-массиве
    {
        if($url){ // если не пуст $url
            $params = explode('&', $url,2); //разделяем GET запрос в массив по знаку &, но не больше 2 записей
            //почему 2? потому что первым get запросом может быть указан контроллер и экшн. т.к. из за флага QSA в htaccess
            //контроллер и экшн считается не явным, но get апараметром, поэтому если он есть, то в массиве params он будет
            //в нулевом ключе.
            if(strpos($params[0],'=') === false){//проверяем нулевой ключ params, если нету символа '=' - то это не get параметр
                return rtrim($params[0], '/'); //возвращает значение контроллера и экшна без конечного /
            }else{
                return ''; // если есть равно - возвращаем пустую строку
            }

        }
    }

}