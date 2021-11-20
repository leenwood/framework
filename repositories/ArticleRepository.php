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

    /**
     * Добавление информации о счетчике.
     * @param $name
     * @param $body
     */
    public function add($name, $body)
    {
        $statement = $this->connection->prepare("INSERT INTO counters (id, idCount, curValue, prevValue) ");
    }

    /**
     * @param $idCount - ИД счетчика у которого нужно найти прошлое значение
     * @return Возращается значение преведущего значения у счетчика.
     */
    public function takePrevValue($idCount)
    {
        $statement = $this->connection->prepare("SELECT currValue FROM indication");
        return $statement->fetch();
    }
}