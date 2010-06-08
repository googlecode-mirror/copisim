<?php


class copisim_fluxTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('copisim_flux');
    }
}