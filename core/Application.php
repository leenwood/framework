<?php

class Application
{
    private $config;
    private $routes;

    private static $publicActions = ['login', 'auth', 'registr'];

    public function __construct(array $config, array $routes)
    {
        $this->config = $config;
        $this->routes = $routes;
    }

    public function run()
    {
        $connection = $this->createConnection();
        $request    = Request::createFromGlobals();
        $router     = new Router($this->routes);

        try {
            $route = $router->match($request->getPath());
        } catch (InvalidArgumentException $e) {
            $route = ['controller' => 'index', 'action' => 'index'];
        }

        $route = $this->applyAuthGuard($route, $connection, $request);

        $controllers = $this->buildControllers($connection);
        $controller  = $controllers[$route['controller']];
        $action      = $route['action'] . 'Action';

        $response = $controller->$action($request);
        $response->send();
    }

    private function applyAuthGuard(array $route, PDO $connection, Request $request)
    {
        if (in_array($route['action'], self::$publicActions)) {
            setcookie('root', 'true');
            return $route;
        }

        $user = new userData($connection);
        if ($user->authBool($request->getCookie('pAccount'), $request->getCookie('password'))) {
            setcookie('root', 'False/True');
            return $route;
        }

        setcookie('root', 'False/False');
        return ['controller' => 'index', 'action' => 'login'];
    }

    private function createConnection()
    {
        $dsn = sprintf(
            'mysql:host=%s;dbname=%s;charset=%s',
            $this->config['database_host'],
            $this->config['database_name'],
            $this->config['charset']
        );
        return new PDO($dsn, $this->config['username'], $this->config['password'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);
    }

    private function buildControllers(PDO $connection)
    {
        return [
            'index'      => new IndexController(new ArticleRepository($connection)),
            'admin'      => new AdminController(new AdminRootProfile($connection)),
            'helloWorld' => new HelloWorldController(),
        ];
    }
}
