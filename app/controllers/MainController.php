<?php
/**
 * Created by PhpStorm.
 * User: babmindra
 * Date: 30.08.2019
 * Time: 17:43
 */

namespace app\controllers;

use mobel\App;
use RedBeanPHP\R; // указываем namespace для метода getProperty

class MainController extends AppController // Подключаем контроллер нашего приложения
{

    public function indexAction(){
        $categorys = \RedBeanPHP\R::findAll('category','WHERE parent_id=0');
        $lastprods = \RedBeanPHP\R::find('product','ORDER BY id DESC LIMIT 10');
        $this->setMeta(App::$app->getProperty('shop_name'),
            'Olga`s jewelry - лучшие украшения для лучших!',
            'ожерелье украшения кольца серьги бриллианты');
                //вызываем функцию установки meta, где с помощью метода класса Registry->getProperty получаем название магазина
                //С константы в params.php, вводим title,description и keywords
        $this->set(compact('categorys','lastprods'));
    }
    
}