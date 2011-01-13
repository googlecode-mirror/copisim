<?php

/**
 * BaseCopisimFlux
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $periode
 * @property integer $ville
 * @property integer $complement
 * @property integer $total
 * @property CopisimPeriode $CopisimPeriode
 * @property CopisimRegion $CopisimRegion
 * @property CopisimFiliere $CopisimFiliere
 * 
 * @method integer        getPeriode()        Returns the current record's "periode" value
 * @method integer        getVille()          Returns the current record's "ville" value
 * @method integer        getComplement()     Returns the current record's "complement" value
 * @method integer        getTotal()          Returns the current record's "total" value
 * @method CopisimPeriode getCopisimPeriode() Returns the current record's "CopisimPeriode" value
 * @method CopisimRegion  getCopisimRegion()  Returns the current record's "CopisimRegion" value
 * @method CopisimFiliere getCopisimFiliere() Returns the current record's "CopisimFiliere" value
 * @method CopisimFlux    setPeriode()        Sets the current record's "periode" value
 * @method CopisimFlux    setVille()          Sets the current record's "ville" value
 * @method CopisimFlux    setComplement()     Sets the current record's "complement" value
 * @method CopisimFlux    setTotal()          Sets the current record's "total" value
 * @method CopisimFlux    setCopisimPeriode() Sets the current record's "CopisimPeriode" value
 * @method CopisimFlux    setCopisimRegion()  Sets the current record's "CopisimRegion" value
 * @method CopisimFlux    setCopisimFiliere() Sets the current record's "CopisimFiliere" value
 * 
 * @package    copisim
 * @subpackage model
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCopisimFlux extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('copisim_flux');
        $this->hasColumn('periode', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('ville', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('complement', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('total', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('CopisimPeriode', array(
             'local' => 'periode',
             'foreign' => 'id'));

        $this->hasOne('CopisimRegion', array(
             'local' => 'ville',
             'foreign' => 'id'));

        $this->hasOne('CopisimFiliere', array(
             'local' => 'complement',
             'foreign' => 'id'));
    }
}