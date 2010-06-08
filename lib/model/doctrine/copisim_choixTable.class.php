<?php


class copisim_choixTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('copisim_choix');
    }
}