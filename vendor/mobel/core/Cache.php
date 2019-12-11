<?php

namespace mobel;


class Cache
{
    use TSingleton;

    public function setCache($key, $data, $sec = 3600){ //метод сохранения кеша, принимает параметром уникальный ключ, данные,
        // время на которое необходимо закешировать данные, по умолчанию - 1 час
        if($sec){ // если переменная время не пустая
            $content['data'] = $data; //создаем массив content и в элемент с ключом data передаем данные
            $content['end_time'] = time() + $sec; //в элемент end time устанавливаем время кеширования данных
            if(file_put_contents(CACHE . '/' . md5($key) . '.txt', serialize($content))){//записываем данные в кеш, указываем путь, а
                // имя ключа захеширует функцией md5, дописываем расширение .txt. Вторым параметром указываем что ложим, то есть
                // весь массив Content разбитый на данные и время кешированияо
                return true;
            }
        }
        return false;
    }

    public function getCache($key){ // будет находить кеш по ключу
        $file = CACHE . '/' . md5($key) . '.txt'; // путь к файлу кеша
        if(file_exists($file)){ // если существует файл кеша
            $content = unserialize(file_get_contents($file)); // сериализованную переменную конвертируем обратно в значение php, доставая из файла
            if(time() <= $content['end_time']){ //если текущий момент времени меньше или равно времени кеширования
                return $content['data']; //возвращаем кеш
            }
            unlink($file);//удаляем файл кеш (в случае если время кеширования истекло)
        }
        return false; //возвращаем false
    }

    public function delCache($key){ //удаляет кеш по ключу
        $file = CACHE . '/' . md5($key) . '.txt'; // путь к файлу кеша
        if(file_exists($file)){ //если файл существует
            unlink($file);//удаляет кеш
        }
    }
}