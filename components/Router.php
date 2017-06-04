<?php


class Router
{
    private $routes;

    /*
     * Клнструктор каждый раз при создании экземпляра класса записывает
     *  все маршруты из /config/routes.php в $routes
     * */
    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }

    /*
     * Функция getUrl возвращает [REQUEST_URI] без слєша
     * */
    public function getURI()
    {
        if(!empty($_SERVER['REQUEST_URI'])) {
        return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {

        $uri = $this->getURI();
        // Проверяем наличие запроса в /components/routes.php
        foreach ($this->routes as $uriPattern => $path) {
            // Сравниваем $uriPattern (ожидаемое значение адресной строки в /components/routes.php)
            // и $uri (текущее значение адресной строки), есть ли совпадения
            if (preg_match("~$uriPattern~", $uri)) {
                // Определить путь согластно правилу ()
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                $segments = explode('/', $internalRoute);
                $controllerName = ucfirst(array_shift($segments)) . 'Controller';
                $actionName ='Action' . ucfirst(array_shift($segments));
                $parameters = $segments;

                //  Подключить файл класса контроллера
                $fileController = ROOT . '/controllers/' . $controllerName . '.php';
                if (file_exists($fileController)) {
                    include_once($fileController);
                }

                // Создать объект, вызвать метод (т.е. action)
                $colnrollerObject = new $controllerName;
                // В result передаем пользовательскую ф-ю
                $result = call_user_func_array(array($colnrollerObject, $actionName), $parameters);
                if($result != null) {
                    break;
                }
            }

        }
    }
}