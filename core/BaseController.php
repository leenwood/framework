<?php

class BaseController
{
    protected function render($templateName, $vars = [])
    {
        ob_start();
        extract($vars);
        include sprintf('templates/%s.php', $templateName);
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    protected function redirect($url)
    {
        return new Response($url, '301', 'Moved Permanently');
    }

    protected function isNulled($vars = [])
    {
        foreach ($vars as $var) {
            if (empty($var)) {
                return false;
            }
        }
        return true;
    }

    public function __call($name, $arguments)
    {
        return new Response('Sorry but this action not found', '404', 'Not found');
    }
}
