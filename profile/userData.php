<?php

class userData
{
    /**
     * Action name
     * @var string
     */
    protected $countersID= [];
    protected $connection = null;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
        /* обращение в бд за получением информации о пользователе.
        1. Запись в idCount, информацию о всех счетчиках привязанных на пользователя в порядке.
        ГВС
        ХВС
        ЕЛЕ
        */
        /* достаем из бд по pAccount все счетичики завязанные на пользователя. Определяя по типу
        перезаписываем в нужно порядке*/
        $this->countersID = [
            "GVS" => -1,
            "HVS" => -1,
            "ELE" => -1,
        ];
    }

    public function getCounterId()
    {
        return $this->countersID = [
            "GVS" => -1,
            "HVS" => -1,
            "ELE" => -1,
        ];
    }

    /***
     * получаем ИД счетчика по его типу
     * @param $type
     * @return int|mixed
     */
    protected function getIdCountersUD($type)
    {
        /*
        $sqlTmp = 'SELECT password FROM users WHERE uid = :uid LIMIT 1';
        $statement = $this->connection->prepare($sqlTmp);
        $statement->execute([
            "uid" => $pAccount
        ]);
        $retPas = $statement->fetch();
         */
       ### $sqlTmp = 'SELECT idCount FROM counters WHERE pAccount = :uid LIMIT 1 and typeCounters = "'. $type . '"';
        $sqlTmp = 'SELECT idCount FROM counters WHERE pAccount = 1 and typeCounters = "HVS"';
        $pAccount = $_COOKIE['pAccount'];
        $statement = $this->connection->prepare($sqlTmp);
        $statement->execute([
            "uid" => $pAccount
        ]);
        $idCount = $statement->fetch();

        return $idCount;
    }

    /***
     * возращает значение счетчика, последние
     * @param $idCount
     * @return mixed
     */
    public function getPrevValueCounterUD($idCount)
    {
        $currValue = 0;

        $sqlTmp = 'SELECT currValue FROM indication WHERE idCount = :uid LIMIT 1';
        $statement = $this->connection->prepare($sqlTmp);
        $statement->execute([
            "uid" => $idCount
        ]);
        $currValue = $statement->fetch();
        return $currValue;
    }

    /***
     * Добавление информации в бд
     * @param $idCount
     * @param $currValue
     * @param $prevValue
     * @return int
     */
    public function addInfoUD($idCount, $currValue, $prevValue)
    {
        $sqlTmp = sprintf("'INSERT INTO `indication` (`id`, `idCount`, `curValue`, `prevValue`) VALUES (NULL, %s, %s, %s)", $idCount, $currValue, $prevValue);
        $statement = $this->connection->prepare($sqlTmp);
        $statement->execute();
        echo("<script>console.log('php_array: ".$sqlTmp."');</script>");
        return 0;
    }

    /***
     * функция авторизации, проверки
     * @param $pAccount
     * @param $password
     * @return bool
     */
    public function authBool($pAccount, $password)
    {
        if(!isset($pAccount) or !isset($password) or ($password) == 'NULL' or $pAccount == 'NULL')
        {
            return False;
        }
        $sqlTmp = 'SELECT password FROM users WHERE uid = :uid LIMIT 1';
        $statement = $this->connection->prepare($sqlTmp);
        $statement->execute([
            "uid" => $pAccount
        ]);
        $retPas = $statement->fetch();

        if($retPas['password'] == $password)
        {
            return True;
        }
        else
        {
            return False;
        }
    }
}