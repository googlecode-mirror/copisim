<?php


class CopisimReferentTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('CopisimReferent');
    }
}