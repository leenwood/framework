<?php

class userData
{
    /**
     * Action name
     * @var string
     */
    protected $countersID= [];

    public function __construct($pAccount, $password, $connection)
    {
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

    protected function checkCounter($type)
    {
        $ansFromBD = "";
        return $ansFromBD;
    }

}