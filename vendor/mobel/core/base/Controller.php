<?php

namespace mobel\base;


abstract class Controller // базовый контроллер
{
    public $route; // будет хранить массив маршрута, переданный маршрутизаотором. (контроллер, экшн, префикс и тд)
    public $controller;
    public $model;
    public $view;
    public $prefix;
    public $layout; // свойство шаблона
    public $data = []; // данные которые мы будем передавать из контроллера в вид
    public $meta = ['title' => '', 'desc' => '', 'keywords' => '']; // мета данные которые мы будем передавать из контроллера в вид

    public function __construct($route){ //создаем контструктор, который параметром принимает маршрут
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->view = $route['action'];
        $this->prefix = $route['prefix'];
    }

    public function set($data){ //метод сохранения данных переданных контроллеру для передачи в вид
        $this->data = $data;
    }

    public function setMeta($title = '', $desc = '', $keywords = ''){ //сохранение мета-данных
        $this->meta['title'] = $title;
        $this->meta['desc'] = $desc;
        $this->meta['keywords'] = $keywords;
    }

    public function getView(){ // метод будет формировать обьект View и вызывать метод render
        $viewObject = new View($this->route,$this->layout,$this->view,$this->meta); // создаем обьект вида
        $viewObject->render($this->data); // вызываем метод render с параметром данных($this->data)
    }

}