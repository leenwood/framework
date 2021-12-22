<?php

class Request
{
    protected $originalGet    = [];
    protected $originalPost   = [];
    protected $originalServer = [];
    protected $originalCookie = [];

    protected $method = null;
    protected $path   = '/';

    public function __construct($get, $post, $server, $cookie = [])
    {
        $this->originalGet    = $get;
        $this->originalPost   = $post;
        $this->originalServer = $server;
        $this->originalCookie = $cookie;

        $this->method = $server['REQUEST_METHOD'];
        $this->path   = isset($server['PATH_INFO']) ? $server['PATH_INFO'] : '/';
    }

    public static function createFromGlobals()
    {
        return new self($_GET, $_POST, $_SERVER, $_COOKIE);
    }

    public function isGet()
    {
        return $this->method === 'GET';
    }

    public function isPost()
    {
        return $this->method === 'POST';
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getQueryParameter($name)
    {
        return isset($this->originalGet[$name]) ? $this->originalGet[$name] : null;
    }

    public function getPost($name)
    {
        return isset($this->originalPost[$name]) ? $this->originalPost[$name] : null;
    }

    public function getCookie($name)
    {
        return isset($this->originalCookie[$name]) ? $this->originalCookie[$name] : null;
    }

    public function getCountersValueBool()
    {
        return isset($this->originalPost['GVScounter'])
            || isset($this->originalPost['HVScounter'])
            || isset($this->originalPost['ELEcounter']);
    }

    public function getValueCounter($nameCount)
    {
        return $this->getPost($nameCount);
    }
}
