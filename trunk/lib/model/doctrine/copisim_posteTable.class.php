<?php


class copisim_posteTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('copisim_poste');
    }
}