<?php

/**
 * BaseCopisimSimulation
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $etudiant
 * @property integer $poste
 * @property integer $reste
 * @property CopisimEtudiant $CopisimEtudiant
 * @property CopisimPoste $CopisimPoste
 * 
 * @method integer           getEtudiant()        Returns the current record's "etudiant" value
 * @method integer           getPoste()           Returns the current record's "poste" value
 * @method integer           getReste()           Returns the current record's "reste" value
 * @method CopisimEtudiant   getCopisimEtudiant() Returns the current record's "CopisimEtudiant" value
 * @method CopisimPoste      getCopisimPoste()    Returns the current record's "CopisimPoste" value
 * @method CopisimSimulation setEtudiant()        Sets the current record's "etudiant" value
 * @method CopisimSimulation setPoste()           Sets the current record's "poste" value
 * @method CopisimSimulation setReste()           Sets the current record's "reste" value
 * @method CopisimSimulation setCopisimEtudiant() Sets the current record's "CopisimEtudiant" value
 * @method CopisimSimulation setCopisimPoste()    Sets the current record's "CopisimPoste" value
 * 
 * @package    copisim
 * @subpackage model
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCopisimSimulation extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('copisim_simulation');
        $this->hasColumn('etudiant', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('poste', 'integer', null, array(
             'type' => 'integer',
             'notnull' => false,
             ));
        $this->hasColumn('reste', 'integer', 3, array(
             'type' => 'integer',
             'notnull' => false,
             'length' => 3,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('CopisimEtudiant', array(
             'local' => 'etudiant',
             'foreign' => 'classement'));

        $this->hasOne('CopisimPoste', array(
             'local' => 'poste',
             'foreign' => 'id'));
    }
}