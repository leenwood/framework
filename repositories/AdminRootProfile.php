<?php

class AdminRootProfile extends \PDO
{
    protected $connection = null;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

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
}