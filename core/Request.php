<?php

/**
 * Http Request class
 * Возращает значения POST, GET, COOKIE
 */
class Request extends userData
{
    /**
     * Original GET Array
     * @var array
     */
    protected $originalGet = [];

    /**
     * Original POST array
     * @var array
     */
    protected $originalPost = [];

    /**
     * Original Server arr
     * @var array
     */
    protected $originalServer = [];


    /**
     * Method type
     * @var null|string
     */
    protected $method = null;

    /**
     * URL Path
     * @var string
     */
    protected $path = '/';


    /**
     * Create request object from Get and Post arrays
     * @param array $get
     * @param array $post
     */
    public function __construct($get, $post, $server)
    {
        $this->originalGet = $get;
        $this->originalPost = $post;
        $this->originalServer = $server;

        $this->method = $server['REQUEST_METHOD'];
        $this->path = $server['PATH_INFO'];
    }




    /**
     * Create Request from global vars _GET _POST
     * @return Request
     */
    public static function createFromGlobals() {
        return new self($_GET, $_POST, $_SERVER);
    }

    /**
     * Return true if method is GET
     * @return bool
     */
    public function isGet() {
        return $this->method === 'GET';
    }

    /**
     * Return true if method is POST
     * @return bool
     */
    public function isPost() {
        return $this->method === 'POST';
    }

    /**
     * Return request method
     * @return mixed|string|null
     */
    public function getMethod() {
        return $this->method;
    }

    /**
     * Return request path
     * @return mixed|string
     */
    public function getPath() {
        return $this->path;
    }

    /**
     * Return get parameter by name
     * @param $name
     * @return mixed|null
     */
    public function getRequestParameter($name)
    {
        return isset($this->originalGet[$name]) ? $this->originalGet[$name] : null;
    }

    /***
     * получаем информацию о счетчики, находят ли они в $POST
     * @return true|false
     *
     */
    public function getCountersValueBool()
    {
        if (isset($this->originalGet["GVScounter"]) or isset($this->originalGet["HVScounter"]) or isset($this->originalGet["ELEcounter"]))
        {
            return true;
        }
        return false;
    }

    /***
     * возращает значение по имени счетчика из метода POST
     * @param $nameCount
     * @return string
     */
    public function getValueCounter($nameCount)
    {
        return $this->originalGet[$nameCount];
    }

    /***
     * узнаем преведущие значение счетчика
     * @param $idCount
     * @return mixed
     */
    public function getPrevValueCounter($idCount)
    {
        return $this->getPrevValueCounterUD($idCount);
    }

    /***
     * добавляем новую запись
     * @param $idCount
     * @param $currValue
     * @param $prevValue
     */
    public function addInfo($idCount, $currValue, $prevValue)
    {
        return $this->addInfoUD($idCount, $currValue, $prevValue);
    }

    /***
     * получение ИД счетчика из юзер даты
     * @param $type
     * @return int|mixed
     */
    public function getIdCounters($type)
    {
        return $this->getIdCountersUD($type);
    }
}