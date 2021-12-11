<?php

class ArticleRepository
{
    protected $connection = null;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Return all Articles
     */
    public function getAll()
    {
        $statement = $this->connection->query("SELECT * FROM articles");
        return $statement->fetchAll();
    }

    /**
     * Return Article by ID
     */
    public function getById($id)
    {
        $statement = $this->connection->prepare("SELECT * FROM articles WHERE id = :id LIMIT 1");

        $statement->execute([
            "id" => $id
        ]);

        return $statement->fetch();
    }

    /***
     * @param $name
     * @param $body
     * @param $idCount
     */
    public function add($name, $body, $idCount)
    {
        $statement = $this->connection->prepare("INSERT INTO counters (id, idCount, curValue, prevValue) ");
    }

    /***
     * получаем ИД счетчика по его типу
     * @param $type
     * @return int|mixed
     */
    public function getIdCountersUD($type)
    {
        $sqlTmp = sprintf('SELECT idCount FROM counters WHERE pAccount = %s and typeCounters = "%s"', $_COOKIE["pAccount"], $type);
        $statement = $this->connection->prepare($sqlTmp);
        $statement->execute();
        $idCount = $statement->fetch();
        return $idCount['idCount'];
    }

    /***
     * возращает значение счетчика, последние
     * @param $idCount
     * @return mixed
     */
    public function getPrevValueCounterUD($idCount)
    {
        #  SELECT curValue FROM indication WHERE idCount = %s ORDER BY id DESC LIMIT 1
        $sqlTmp = sprintf("SELECT curValue FROM indication WHERE idCount = %s ORDER BY id DESC LIMIT 1", $idCount);
        $statement = $this->connection->prepare($sqlTmp);
        $statement->execute();
        $retPas = $statement->fetchAll();
        return $retPas;
    }

    /***
     * Добавление информации в бд
     * @param $idCount
     * @param $currValue
     * @param $prevValue
     * @return int
     */
    public function addInfoUD($idCount, $currValue, $prevValue, $timeStamp)
    {
        #INSERT INTO `indication` (`id`, `idCount`, `curValue`, `prevValue`) VALUES ('2', '2', '30', '10');
        $sqlTmp = sprintf("INSERT INTO `indication` (`id`, `idCount`, `curValue`, `prevValue`, `datestamp`) VALUES (null, '%s', '%s', '%s', '%s')", (int)$idCount, floatval($currValue), floatval($prevValue), $timeStamp);
        $statement = $this->connection->prepare($sqlTmp);
        $statement->execute();
        echo("<script>console.log('php_array: ".$sqlTmp."');</script>");
        return 0;
    }

}