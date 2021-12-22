<?php

class AdminRootProfile
{
    protected $connection = null;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function getAll()
    {
        $statement = $this->connection->query("SELECT * FROM users");
        return $statement->fetchAll();
    }

    public function adminAuth($pAccount)
    {
        if (empty($pAccount) || $pAccount === 'NULL') {
            return false;
        }
        $statement = $this->connection->prepare(
            'SELECT roots FROM users WHERE uid = :uid LIMIT 1'
        );
        $statement->execute(['uid' => $pAccount]);
        $row = $statement->fetch();
        if (!$row) {
            return false;
        }
        $roots = $row['roots'] === null ? 1 : (int) $row['roots'];
        return $roots > 1;
    }

    public function createUser($name, $surname, $password, $homeSqueare, $roots)
    {
        $statement = $this->connection->prepare(
            "INSERT INTO users (uid, lastname, surname, password, homeSqueare, roots) VALUES (NULL, :name, :surname, :password, :homeSqueare, :roots)"
        );
        $statement->execute([
            'name'        => $name,
            'surname'     => $surname,
            'password'    => $password,
            'homeSqueare' => (float) $homeSqueare,
            'roots'       => (int) $roots,
        ]);
        return 0;
    }

    public function takeIDuser($name, $surname)
    {
        $statement = $this->connection->prepare(
            'SELECT uid FROM users WHERE lastname = :name AND surname = :surname ORDER BY uid DESC LIMIT 1'
        );
        $statement->execute(['name' => $name, 'surname' => $surname]);
        return $statement->fetchAll();
    }

    public function getByIdUser($id)
    {
        $statement = $this->connection->prepare(
            "SELECT * FROM users WHERE uid = :id LIMIT 1"
        );
        $statement->execute(['id' => $id]);
        return $statement->fetch();
    }

    public function takeCountersUser($id)
    {
        $statement = $this->connection->prepare(
            "SELECT * FROM counters WHERE pAccount = :id ORDER BY idCount DESC LIMIT 3"
        );
        $statement->execute(['id' => $id]);
        return $statement->fetchAll();
    }

    public function changeInfoCounters($id)
    {
        $pAccount = (int) $id;
        $statement = $this->connection->prepare(
            "INSERT INTO counters (idCount, pAccount, typeCounters) VALUES (NULL, :pAccount, :type)"
        );
        foreach (['GVS', 'HVS', 'ELE'] as $type) {
            $statement->execute(['pAccount' => $pAccount, 'type' => $type]);
        }
        return 0;
    }

    public function getByIdCounter($id)
    {
        $statement = $this->connection->prepare(
            "SELECT * FROM indication WHERE idCount = :id"
        );
        $statement->execute(['id' => $id]);
        return $statement->fetchAll();
    }
}
