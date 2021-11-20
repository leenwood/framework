<?php

class userData
{
    /**
     * Список счетчиков. С их ИД
     * @var array|int[] $counterID
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

    /**
     * Получить информацию о счетчиках по порядку.
     * GVS
     * HVS
     * ELE
     * @return int[]
     */

    public function getCounterId()
    {
        return $this->countersID = [
            "GVS" => -1,
            "HVS" => -1,
            "ELE" => -1,
        ];
    }

    /**
     * Проверяет авторизован ли пользователь по тем данным что он ввел
     * Возращает true/false
     * @return bool True/False
     */
    public function auth()
    {
        return false;
    }

    /**
     * Проверяет в бд, счетчик по типу и привязанного к аккаунту.
     * Возращает idCount
     * @return int $idCount
     */

    protected function checkCounter($type)
    {
        $ansFromBD = "";
        return $ansFromBD;
    }

}