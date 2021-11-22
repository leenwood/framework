<?php
require_once 'controllers/IndexController.php';
require_once 'controllers/HelloWorldController.php';

require_once 'core/Request.php';
require_once 'core/Response.php';
require_once 'core/Router.php';

require_once 'profile/userData.php';

require_once 'repositories/ArticleRepository.php';

include_once 'config/routes.php';
include_once 'config/database.php';


$router = new Router($routes);
$request = Request::createFromGlobals();




$dsn = sprintf("mysql:host=%s;dbname=%s;charset=%s", $database['database_host'], $database['database_name'],  $database['charset']);
/** @var PDO $connection */
$connection = new PDO( $dsn, $database['username'], $database['password'],
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

$articleRepository = new ArticleRepository($connection);


try {
    $route = $router->match($request->getPath());
} catch (\InvalidArgumentException $exception) {
    $route = [
        'controller' => 'index',
        'action' => 'index'
    ];
}

$controllers = [
    'index' => new IndexController($articleRepository),
    'helloWorld' => new HelloWorldController(),
];

//if (empty($pAccount) || empty($password))
//{
//    $route = [
//        'controller' => 'index',
//        'action' => 'login'
//    ];
//}
$user = new userData($pAccount, $password, $connection);

$controller = $controllers[$route['controller']];
$actionMethod = $route['action'] . 'Action';

/** @var Response $response */
$response = $controller->$actionMethod($request);
$response->send();

/*
 * IndexController отвечает за навигацию по сайту, выводит странички темлейтся. Требуетася создать
 * контроллер который будет прееключать значения, не пребигая к бд. Стандартное отображение в /.
 * Главная страничка где будет показаны уже кнпоки перехода на другие ГЕТ запросы и возращение их.
 * Request - обрабатываеися get post server
 * Router - данные и формирует - action для работы
 * Response - возращает значением html, возращаем code, name code
 * include sprintf('templates/%s.php', $templateName) находится в indexController, возращает страницу
 *
 */


/* 1. Авторизация и токен. Если залогинился,
то как сохранять сессию на компьютере, чтоб не нужно после каждого действия логиниться
*/

/* commit
-ver 0.01. Create form add/login/regist
Add sql querry database/tabels
Add controller func + add path in routers