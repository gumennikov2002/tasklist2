<?
    // Класс маршрутизации
    // task2/
    // task2/auth
    // task2/tasks

    class Routing
    {
        public static function BuildRoute()
        {
            $controllerName = "IndexController";
            $modelName = "IndexModel";
            $action = "index";

            $route = explode("/", $_SERVER['REQUEST_URI']);

            if(!empty($route[1]))
            {
                $controllerName = ucfirst($route[1]. "Controller");
                $modelName = ucfirst($route[1]. "Model");
            }

            include CONTROLLER_PATH . $controllerName . ".php";
            include MODEL_PATH . $modelName . ".php";

            if(isset($route[2]) && !empty($route[2]))
            {
                $action = $route[2];
            }

            $controller = new $controllerName();
            $controller->$action();

        }

        public function errorPage()
        {
            
        }
    }
?>