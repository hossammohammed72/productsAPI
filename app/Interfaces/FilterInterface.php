<?php
namespace App\Interfaces;

Interface FilterInterface {
    public static function filterRecord($databaseAttribute, $filteringValue):bool;



}

?>
