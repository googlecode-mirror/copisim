<?php

/**
 * BaseCopisimReferent
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $periode
 * @property string $nom
 * @property string $email
 * @property string $tel
 * @property string $divers
 * @property integer $fac
 * @property CopisimPeriode $CopisimPeriode
 * @property CopisimFac $CopisimFac
 * 
 * @method integer         getPeriode()        Returns the current record's "periode" value
 * @method string          getNom()            Returns the current record's "nom" value
 * @method string          getEmail()          Returns the current record's "email" value
 * @method string          getTel()            Returns the current record's "tel" value
 * @method string          getDivers()         Returns the current record's "divers" value
 * @method integer         getFac()            Returns the current record's "fac" value
 * @method CopisimPeriode  getCopisimPeriode() Returns the current record's "CopisimPeriode" value
 * @method CopisimFac      getCopisimFac()     Returns the current record's "CopisimFac" value
 * @method CopisimReferent setPeriode()        Sets the current record's "periode" value
 * @method CopisimReferent setNom()            Sets the current record's "nom" value
 * @method CopisimReferent setEmail()          Sets the current record's "email" value
 * @method CopisimReferent setTel()            Sets the current record's "tel" value
 * @method CopisimReferent setDivers()         Sets the current record's "divers" value
 * @method CopisimReferent setFac()            Sets the current record's "fac" value
 * @method CopisimReferent setCopisimPeriode() Sets the current record's "CopisimPeriode" value
 * @method CopisimReferent setCopisimFac()     Sets the current record's "CopisimFac" value
 * 
 * @package    copisim
 * @subpackage model
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCopisimReferent extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('copisim_referent');
        $this->hasColumn('periode', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('nom', 'string', 50, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 50,
             ));
        $this->hasColumn('email', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 100,
             ));
        $this->hasColumn('tel', 'string', 10, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 10,
             ));
        $this->hasColumn('divers', 'string', 256, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 256,
             ));
        $this->hasColumn('fac', 'integer', null, array(
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

        $this->hasOne('CopisimFac', array(
             'local' => 'fac',
             'foreign' => 'id'));
    }
}