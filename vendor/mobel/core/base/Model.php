<?php
/**
 * Created by PhpStorm.
 * User: babmindra
 * Date: 02.09.2019
 * Time: 19:12
 */

namespace mobel\base;

use mobel\Db;
abstract class Model
{
    public $attributes = []; //массив свойств модели для работы с данными, элементы которого будут идентичны с полями в таблице бд
    // нужно для того чтобы загружать автоматически из форм данные в модель и выгружать их в бд
    public $errors = []; //массив для хранения ошибок
    public $rules = []; //для правил валидации данных

    public function __construct()
    {
        Db::instance(); //создаем и проверяем единственный экземпляр класса Db
    }
}