<?php

class IndexController
{
    /**
     * Action name
     * @var string
     */
    public $name = 'index';

    /**
     * @var ArticleRepository
     */
    protected $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }


    public function indexAction(Request $request)
    {
        return new Response(
            $this->render('main', [
                '/' => []
            ])
        );
    }

    public function showAction(Request $request)
    {
        $id = $request->getQueryParameter("id");

        $article = is_numeric($id) ? $this->articleRepository->getById($id) : null;

        if ($article === null) {
            return new Response('Page not found <br><a href="/">back to articles list</a>',
                '404', 'Not found');
        }

        return new Response(
            $this->render('article', [
                'article' => $article
            ])
        );
    }

    public function loginAction(Request $request) {
        return new Response(
            $this->render('auth/login', [
            'title' => 'login page',
            'text' => ''
        ]));
    }

    /**
     * Возращает значение страницы аунтефекации.
    **/
    public function authAction(Request $request) {
        $pAccount = $_POST['login'];
        $password = $_POST['password'];
        if(authBool($pAccount, $password))
        {
            setcookie('pAccaount', $pAccount, 0 , '/');
            setcookie('password', $password, 0 , '/');
            return new Response(
                $this->render('main', [
                'title' => 'main page',
                'text' => ''
            ]));
        }
        return new Response(
            $this->render('auth/registr', [
                'title' => 'registr page',
                'text' => ''
            ]));
    }

    public function registrAction(Request $request) {
        return new Response(
            $this->render('auth/registr', [
            'title' => 'registr page',
            'text' => ''
        ]));
    }

    public function addInfoAction(Request $request) {
        return new Response(
            $this->render('changeInfo', [
            'title' => 'changeInfo page',
            'text' => ''
        ]));
    }

    public function addAction(Request $request) {
        if ($request->isPost() && !empty($request->getRequestParameter('counters')))
        {
            $counters = $request->getRequestParameter('counters');
            foreach ($counters as $key => $value)
            {
                /* механизм получения id счетчика из информации авторизованного пользовеля*/
                $this->articleRepository->add();
            }
            /* Тут надо указать все перменные из метода POST которhttps://i.imgur.com/muDUqbY.pngые будут добавлятся в sql
             В данный момент. 1) 3 Счётчтчика ГВС ХВС, ЕЛЕ ,
            которые указывают инфолрмацию ввиде простого числа.
            2) Перебрать через цикл foreach, и отправить по отдельности их.
            3) Информацию о типе счетчика хранится в таблице counters*/
        }
        return new Response('/', '301', 'homePage');
    }

    protected function render($templateName, $vars = [])
    {
        ob_start();
        extract($vars);
        include sprintf('templates/%s.php', $templateName);
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    public function __call($name, $arguments)
    {
        return new Response('Sorry but this action not found',
            '404', 'Not found');
    }


}