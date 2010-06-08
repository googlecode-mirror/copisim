<?php


class copisim_itemTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('copisim_item');
    }
}