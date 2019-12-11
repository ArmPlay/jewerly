<?php
/**
 * Created by PhpStorm.
 * User: babmindra
 * Date: 27.08.2019
 * Time: 15:38
 */

namespace mobel;


class Registry
{
    use TSingleton; //подключаем трейт

    public static $properties = []; // контейнер, сюда мы будем складывать свойства

    public function setProperty($name, $prop) // передаем ключ(название) и значение свойства
    {
        self::$properties[$name] = $prop; // свойству класса $properties с ключом $name присвоить значение $prop
    }

    public function getProperty($name) //передаем параметром ключ
    {
        if(isset(self::$properties[$name])){ //если существует свойство с таким ключом, то..
            return self::$properties[$name]; //возвращаем значение этого свойства
        }
        return null; // иначе возвращаем null
    }

    public static function debug()
    {
        return self::$properties;

    }
}