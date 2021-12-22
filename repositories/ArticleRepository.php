<?php

class ArticleRepository
{
    protected $connection = null;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function getAll()
    {
        $statement = $this->connection->query("SELECT * FROM articles");
        return $statement->fetchAll();
    }

    public function getById($id)
    {
        $statement = $this->connection->prepare("SELECT * FROM articles WHERE id = :id LIMIT 1");
        $statement->execute(['id' => $id]);
        return $statement->fetch();
    }

    public function getByIdCounter($id)
    {
        $statement = $this->connection->prepare("SELECT * FROM indication WHERE idCount = :id");
        $statement->execute(['id' => $id]);
        return $statement->fetchAll();
    }

    public function getIdCountersUD($type, $pAccount)
    {
        $statement = $this->connection->prepare(
            'SELECT idCount FROM counters WHERE pAccount = :pAccount AND typeCounters = :type ORDER BY idCount DESC LIMIT 1'
        );
        $statement->execute(['pAccount' => $pAccount, 'type' => $type]);
        $row = $statement->fetch();
        return $row ? $row['idCount'] : null;
    }

    public function getPrevValueCounterUD($idCount)
    {
        $statement = $this->connection->prepare(
            "SELECT curValue FROM indication WHERE idCount = :idCount ORDER BY id DESC LIMIT 1"
        );
        $statement->execute(['idCount' => $idCount]);
        return $statement->fetchAll();
    }

    public function addInfoUD($idCount, $currValue, $prevValue, $timeStamp)
    {
        $statement = $this->connection->prepare(
            "INSERT INTO indication (id, idCount, curValue, prevValue, datestamp) VALUES (null, :idCount, :curValue, :prevValue, :datestamp)"
        );
        $statement->execute([
            'idCount'   => (int) $idCount,
            'curValue'  => (float) $currValue,
            'prevValue' => (float) $prevValue,
            'datestamp' => $timeStamp,
        ]);
        return 0;
    }
}
