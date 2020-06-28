<?php


namespace App\Filters;


use App\Interfaces\FilterInterface;

class LessThanFilter implements FilterInterface
{
    public static function filterRecord($databaseAttribute, $filteringValue):bool{
        return (int)$databaseAttribute >= (int)$filteringValue;
    }

}
