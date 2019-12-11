<?php
/**
 * Created by PhpStorm.
 * User: babmindra
 * Date: 31.08.2019
 * Time: 13:33
 */

namespace mobel\base;


class View // базовый класс вида
{

    public $route;
    public $controller;
    public $model;
    public $view;
    public $prefix;
    public $layout;
    public $data = [];
    public $meta = [];

    public function __construct($route, $layout = '', $view = '', $meta){ // при создании передаем значение маршрута,
        // шаблон, если есть, вид, если есть, мета данные
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->view = $view;
        $this->prefix = $route['prefix'];
        $this->meta = $meta;
        if($layout === false){ // если шаблон "жестко" установлен как false (шаблон выключен)
            $this->layout = false; // то для переменной layout установим false
        }else{
            $this->layout = $layout ?: LAYOUT; // записываем в layout значение переданной переменной layout, если оно есть,
            //если нету - передаем шаблон из константы
        }
    }

    public function render($data){ // метод который будет формировать нашу страницу
        extract($data); //выгружаем в переменные элементы массива данных, переданных с контроллера
        $viewFile = APP . "/views/{$this->prefix}$this->controller/$this->view.php"; //указываем путь к нашему виду
         //{$this->prefix}$this->controller - специально для проверки админ или нет, если админ, то добавить префикс manage
        if(is_file($viewFile)){ //проверка, если файл вида существует
            ob_start(); // включает буферизацию вывода, все что выводится - не выводится, а записывается в буфер
            require_once $viewFile; // подключаем файл нашего вида
            $content = ob_get_clean(); // весь вид записываем в content и очищаем буфер
        }else{
            throw new \Exception("Вид по адресу {$viewFile} не был найден", 500); // формируем ошибку 500, вид не найден
        }
        if($this->layout !== false){ // если шаблон включен
            $layoutFile = APP . "/views/layouts/{$this->layout}.php"; // записываем путь к шаблону
            if(is_file($layoutFile)) { // если такой шаблон существует
                require_once $layoutFile; // подключаем шаблон
            }else{
                throw new \Exception("Шаблон по адресу {$this->layout} не был найден", 500); //формируем ошибку 500, шаблон не найден
            }
        }
    }

    public function getMeta(){ // мето формировки мета тегов для страницы
        $out = '<title>' . $this->meta['title'] . '</title>' . PHP_EOL; // записываем в  title значение нашего мета тега title
        $out .= '<meta name="description" content="' . $this->meta['desc'] . '">' . PHP_EOL; // записываем в мета тег description значение нашего  тега desc
        $out .= '<meta name="keywords" content="' . $this->meta['keywords'] . '">' . PHP_EOL; // записываем в keywords значение нашего мета тега keywords
        return $out;
    }

}