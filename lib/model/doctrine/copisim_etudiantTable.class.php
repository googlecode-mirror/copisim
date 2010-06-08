<?php


class copisim_etudiantTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('copisim_etudiant');
    }
}