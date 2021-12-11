<?php

class BaseController
{
    /**
     * рендерит страницу по названию файла
     * @param $templateName
     * @param array $vars
     * @return false|string
     */
    protected function render($templateName, $vars = [])
    {
        ob_start();
        extract($vars);
        include sprintf('templates/%s.php', $templateName);
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    /**
     * Редиректит на нужную странирцу по юрл
     * @param $url
     * @return Response
     */
    protected function redirect($url) {
        return new Response(
            $this->render('articles', [
                'articles' => articles
            ])
        );
    }

    /**
     * Проверка на нулевость
     * @param $vars
     * @return void
     */
    protected function isNulled($vars = []) {
        foreach ($vars as $key => $var)
        {
            if(empty($var))
            {
                return False;
            }
        }
        return True;
    }

    public function __call($name, $arguments)
    {
        return new Response('Sorry but this action not found',
            '404', 'Not found');
    }
}