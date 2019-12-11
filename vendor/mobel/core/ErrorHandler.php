<?php

// класс обработки ошибок

namespace mobel;


class ErrorHandler
{

    static private $numError = 1;

    public function __construct()
    {
        if(DEBUG){ // если константа debug = 1
            error_reporting(-1); // включить показ всех ошибок
        }else{
            error_reporting(0); // выключить показ всех ошибок
        }
        set_exception_handler( [$this, 'exceptionHandler']); // для обработки исключений назначаем функцию - exceptionHandler
    }

    public function exceptionHandler(\Exception $exception){ // функция перехвата исключений. принимает параметром исключение
        $this->logErrors($exception->getMessage(),$exception->getFile(),$exception->getLine());
        // вызываем метод этого обьекта - logErrors, в который параметрами передаем методы базового класса Exception

        $this->displayError(self::$numError,$exception->getMessage(), $exception->getFile(), $exception->getLine(), $exception->getCode());
        self::$numError++;
        // вызываем метод экранировки обьекта - displayError, в который параметрами передаем методы базового класса Exception

    }

    protected function logErrors($textErr = '', $fileErr = '', $lineErr = '') // функция для логгирования ошибок.
        // text - текст ошибки, file - файл в котором возникло исключение, line - строка в которой возникло исключение
    {
        error_log("[" . date('d.m.Y H:i:s', time()) . "] Текст ошибки: {$textErr} | Файл: {$fileErr} | Строка: {$lineErr}\n============\n", 3, ROOT . '/tmp/errors.log');
        // Функция логгирования ошибок в файл errors.log
    }

    protected function displayError($errNum, $errText, $errFile, $errLine, $errCode = 404){ // метод подключения шаблона ошибки
        // принимает параметры: номер ошибки, текст ошибки, файл в котором ошибка, строка ошибки, код ошибки, который отправим браузеру
        http_response_code($errCode); // отправит заголовок http код, который передает функция
        if($errCode == 404 && !DEBUG){ // если код ошибки 404 и режим отладки выключен
            require WWW . '/errors/404.php'; // подключаем файл ошибки 404
            die; // завершаем дальнейшее выполнение
        }
        if(DEBUG){ // если режим отладки включен
            require WWW . '/errors/dev.php'; // подключаем файл dev
        }else{
            require WWW . '/errors/prod.php'; // подключаем файл prod
        }
        die; // завершаем дальнейшее выполнение
    }
}