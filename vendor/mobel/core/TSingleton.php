<?php
/**
 * Created by PhpStorm.
 * User: babmindra
 * Date: 27.08.2019
 * Time: 15:43
 */

namespace mobel;


trait TSingleton
{
    private static $instance;

    public static function instance()
    {
        if(self::$instance === null){ // если свойство пусто (== null) то есть не существует
            self::$instance = new self; // создадим новый обьект и положим в свойство
        }
        return self::$instance; // возвращаем обьект в обоих случаях
    }

}