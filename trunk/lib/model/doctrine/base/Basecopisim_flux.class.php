<?php

/**
 * Basecopisim_flux
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $periode
 * @property integer $ville
 * @property integer $complement
 * @property integer $total
 * @property copisim_periode $copisim_periode
 * @property copisim_item $copisim_item
 * 
 * @method integer         getPeriode()         Returns the current record's "periode" value
 * @method integer         getVille()           Returns the current record's "ville" value
 * @method integer         getComplement()      Returns the current record's "complement" value
 * @method integer         getTotal()           Returns the current record's "total" value
 * @method copisim_periode getCopisimPeriode()  Returns the current record's "copisim_periode" value
 * @method copisim_item    getCopisimItem()     Returns the current record's "copisim_item" value
 * @method copisim_flux    setPeriode()         Sets the current record's "periode" value
 * @method copisim_flux    setVille()           Sets the current record's "ville" value
 * @method copisim_flux    setComplement()      Sets the current record's "complement" value
 * @method copisim_flux    setTotal()           Sets the current record's "total" value
 * @method copisim_flux    setCopisimPeriode()  Sets the current record's "copisim_periode" value
 * @method copisim_flux    setCopisimItem()     Sets the current record's "copisim_item" value
 * 
 * @package    copisim
 * @subpackage model
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class Basecopisim_flux extends sfDoctrineRecord
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
        $this->hasOne('copisim_periode', array(
             'local' => 'periode',
             'foreign' => 'id'));

        $this->hasOne('copisim_item', array(
             'local' => 'complement',
             'foreign' => 'id'));
    }
}