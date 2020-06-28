<?php


namespace App\Filters;


use App\Interfaces\FilterInterface;

class EqualsFilter implements FilterInterface
{
    public static function filterRecord($databaseAttribute, $filteringValue):bool{
        return $databaseAttribute == $filteringValue;
    }

}
