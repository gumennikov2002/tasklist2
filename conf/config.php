<?
    define("ROOT", $_SERVER['DOCUMENT_ROOT']);
    // define("ROOT", "C:/OpenServer/domains/task2");
    define("CONTROLLER_PATH", ROOT. "/controllers/");
    define("MODEL_PATH", ROOT. "/models/");
    define("VIEW_PATH", ROOT. "/views/");

    require_once("db.php");
    require_once("route.php");
    require_once MODEL_PATH. 'Model.php';
    require_once VIEW_PATH. 'View.php';
    require_once CONTROLLER_PATH. 'Controller.php';

    Routing::BuildRoute();
?>