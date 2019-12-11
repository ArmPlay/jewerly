<?php
/**
 * Created by PhpStorm.
 * User: babmindra
 * Date: 19.09.2019
 * Time: 13:01
 */

namespace app\widgets\menu;


use mobel\App;
use mobel\Cache;

class Menu
{

    protected $data; //для данных
    protected $tree; //массив дерева, который будем строить из данных
    protected $menuHtml; //готовый код нашего меню
    protected $tpl; //шаблон для использования меню
    protected $container = 'ul'; //контейнер для нашего меню по умолчанию ul, но можно поменять на select к примеру
    protected $table = 'category'; //таблица в БД, из которых будем выбирать эти данные
    protected $cacheTime = 3600; //время на которое кешировать наше меню
    protected $cacheKey = 'mobel_menu'; //ключ по которому будут кешироваться наши данные
    protected $attrs = []; //массив аттрибутов для меню
    protected $prepend = ''; //?


    public function __construct($options = [])
    {
        $this->tpl = __DIR__ . '/menu_tpl/menu.php'; // шаблон по умолчанию
        $this->getOptions($options);
        $this->run();
    }

    public function getOptions($options){
        foreach ($options as $k => $v) { //проходимся циклом по массиву переданных опций
            if(property_exists($this, $k)){ //если ключ массива равен свойству нашего класса
                $this->$k = $v; //записываем эту опцию в свойство
            }
        }
    }

    protected function run(){ // формирует наше меню
        $cache = Cache::instance(); // создаем обьект кеша
        $this->menuHtml = $cache->getCache($this->cacheKey); // в свойство меню записываем данные из кеша
        if(!$this->menuHtml){//если свойство меню вернуло false
            $this->data = App::$app->getProperty('cats'); // записываем в свойство data элемент из реестра cats
            if(!$this->data){ // если данных нет
                $this->data = \RedBeanPHP\R::getAssoc("SELECT * FROM {$this->table}");  //в переменную данных запишем список категорий
            }
            $this->tree = $this->getTree();
            $this->menuHtml = $this->getMenuHtml($this->tree); //свойству menuHtml присваиваем метод getMenuHtml, в который параметром передаем дерево категорий
        }
        $this->output();
    }

    protected function output(){
        echo $this->menuHtml; // вывод меню
    }

    protected function getTree(){ //метод получающий дерево
        $tree = []; //пустой массив tree
        $data = $this->data; //создаем дубликат переменной this-data
        foreach($data as $id=>&$node){ //проходим по массиву
            if(!$node['parent_id']){ //если parent_id равен 0, то есть не имеет дочернюю категорию
                $tree[$id] = &$node; //записываем в массив tree с ключом id, и массивом с ссылкой &$node
            }else{
                $data[$node['parent_id']]['childs'][$id] = &$node; //записываем в массив с ключом parrent_id
                //создаем новый элемент childs, в который добавляем элемент с ключом id, в который записываем массив коннкретной категории
            }
        }
        return $tree;
    }

    protected function getMenuHtml($three, $tab = ''){//получает html разметку элемента
        $str = ''; //пустая строка
        foreach($three as $id => $category){ //перебираем наше дерево
            $str .= $this->catToTemplate($category, $tab, $id); //формируем по шаблону html код и записываем в str
        }
        return $str; //возвращаем строку str
    }

    protected function catToTemplate($category, $tab, $id){//по шаблону сформирует html код
        ob_start(); //старт буферизации
        require $this->tpl; //подключаем шаблон
        return ob_get_clean(); //возвращаем забуферизированный шаблон
    }
}