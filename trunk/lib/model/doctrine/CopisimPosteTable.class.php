<?php


class CopisimPosteTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('CopisimPoste');
    }
}