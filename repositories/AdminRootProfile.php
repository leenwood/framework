<?php

class AdminRootProfile extends \PDO
{
    protected $connection = null;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * получить всех пользователей
     * @return array|false
     */
    public function getAll()
    {
        $statement = $this->connection->query("SELECT * FROM users");
        return $statement->fetchAll();
    }

    /**
     * проверка на навалидность админки
     * @param $pAccount
     * @return bool
     */
    public function adminAuth($pAccount)
    {
        if(!isset($pAccount) or $pAccount == 'NULL')
        {
            return False;
        }
        $sqlTmp = 'SELECT roots FROM users WHERE uid = :uid LIMIT 1';
        $statement = $this->connection->prepare($sqlTmp);
        $statement->execute([
            "uid" => $pAccount
        ]);
        $retPas = $statement->fetch();
        if($retPas['roots'] === null)
        {
            $retPas['roots'] = 1;
        }
        if($retPas['roots'] > 1)
        {
            return True;
        }
        else
        {
            return False;
        }
    }

    /**
     * добавление юзера в бд
     * @return void
     */
    public function createUser($name, $surname, $password, $homeSqueare, $roots)
    { #INSERT INTO `users` (`uid`, `lastname`, `surname`, `password`, `homeSqueare`, `roots`) VALUES (NULL, 'George', 'Ershov', '123', '8.32', '2');
        $sqlTmp = sprintf("INSERT INTO `users` (`uid`, `lastname`, `surname`, `password`, `homeSqueare`, `roots`) VALUES (NULL, '%s', '%s', '%s', '%s', '%s')"
            , $name, $surname, $password, floatval($homeSqueare), (int)$roots);
        $statement = $this->connection->prepare($sqlTmp);
        $statement->execute();
        echo("<script>console.log('php_array: ".$sqlTmp."');</script>");
        return 0;
    }

    /***
     * получить ид пользователя
     * @param $name
     * @param $surname
     * @return array|false
     */
    public function takeIDuser($name, $surname)
    {
        $sqlTmp = sprintf('SELECT uid FROM users WHERE lastname = "%s" and surname = "%s" ORDER BY uid DESC LIMIT 1', $name, $surname);
        $statement = $this->connection->prepare($sqlTmp);
        $statement->execute();
        $retPas = $statement->fetchAll();
        return $retPas;
    }

    public function getByIdUser($id)
    {
        $statement = $this->connection->prepare("SELECT * FROM users WHERE uid = :id LIMIT 1");

        $statement->execute([
            "id" => $id
        ]);

        return $statement->fetch();
    }
}