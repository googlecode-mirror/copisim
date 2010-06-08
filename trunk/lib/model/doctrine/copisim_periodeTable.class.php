<?php


class copisim_periodeTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('copisim_periode');
    }
}