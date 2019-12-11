<?php

use mobel\Router;



//Router::add("xernya");

// Стандартные шаблоны
// Админ шаблоны
Router::add('^manage$', ['controller' => 'Main', 'action' => 'index', 'prefix' => 'manage']); // для пустой строки в админке
Router::add('^manage/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'manage']); // с префиксом manage

Router::add('^$', ['controller' => 'Main', 'action' => 'index']); // для пустой запроса(^$) добавляем маршрут с
//контроллером Main и экшном index
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');
// принимает только один параметр. "?P<controller>" - означает что регулярка при вызове preg_match запомнит дальнейшее
// выражение в ассоц. массивс ключом controller. controller - обязательный, action - не обязательный

