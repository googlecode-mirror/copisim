<?php

/**
 * BaseCopisimPeriode
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property year $annee
 * @property date $debut_choix
 * @property date $fin_choix
 * @property Doctrine_Collection $CopisimItem
 * @property Doctrine_Collection $CopisimPoste
 * @property Doctrine_Collection $CopisimFlux
 * 
 * @method year                getAnnee()        Returns the current record's "annee" value
 * @method date                getDebutChoix()   Returns the current record's "debut_choix" value
 * @method date                getFinChoix()     Returns the current record's "fin_choix" value
 * @method Doctrine_Collection getCopisimItem()  Returns the current record's "CopisimItem" collection
 * @method Doctrine_Collection getCopisimPoste() Returns the current record's "CopisimPoste" collection
 * @method Doctrine_Collection getCopisimFlux()  Returns the current record's "CopisimFlux" collection
 * @method CopisimPeriode      setAnnee()        Sets the current record's "annee" value
 * @method CopisimPeriode      setDebutChoix()   Sets the current record's "debut_choix" value
 * @method CopisimPeriode      setFinChoix()     Sets the current record's "fin_choix" value
 * @method CopisimPeriode      setCopisimItem()  Sets the current record's "CopisimItem" collection
 * @method CopisimPeriode      setCopisimPoste() Sets the current record's "CopisimPoste" collection
 * @method CopisimPeriode      setCopisimFlux()  Sets the current record's "CopisimFlux" collection
 * 
 * @package    copisim
 * @subpackage model
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCopisimPeriode extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('copisim_periode');
        $this->hasColumn('annee', 'year', null, array(
             'type' => 'year',
             'notnull' => true,
             ));
        $this->hasColumn('debut_choix', 'date', null, array(
             'type' => 'date',
             'notnull' => true,
             ));
        $this->hasColumn('fin_choix', 'date', null, array(
             'type' => 'date',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('CopisimItem', array(
             'local' => 'id',
             'foreign' => 'periode'));

        $this->hasMany('CopisimPoste', array(
             'local' => 'id',
             'foreign' => 'periode'));

        $this->hasMany('CopisimFlux', array(
             'local' => 'id',
             'foreign' => 'periode'));
    }
}