<?php

/**
 * BaseCopisimEtudiant
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $nom
 * @property string $prenom
 * @property integer $fac
 * @property date $naissance
 * @property string $email
 * @property string $email_tmp
 * @property boolean $anonyme
 * @property boolean $doublant
 * @property integer $classement
 * @property CopisimItem $CopisimItem
 * 
 * @method string          getNom()         Returns the current record's "nom" value
 * @method string          getPrenom()      Returns the current record's "prenom" value
 * @method integer         getFac()         Returns the current record's "fac" value
 * @method date            getNaissance()   Returns the current record's "naissance" value
 * @method string          getEmail()       Returns the current record's "email" value
 * @method string          getEmailTmp()    Returns the current record's "email_tmp" value
 * @method boolean         getAnonyme()     Returns the current record's "anonyme" value
 * @method boolean         getDoublant()    Returns the current record's "doublant" value
 * @method integer         getClassement()  Returns the current record's "classement" value
 * @method CopisimItem     getCopisimItem() Returns the current record's "CopisimItem" value
 * @method CopisimEtudiant setNom()         Sets the current record's "nom" value
 * @method CopisimEtudiant setPrenom()      Sets the current record's "prenom" value
 * @method CopisimEtudiant setFac()         Sets the current record's "fac" value
 * @method CopisimEtudiant setNaissance()   Sets the current record's "naissance" value
 * @method CopisimEtudiant setEmail()       Sets the current record's "email" value
 * @method CopisimEtudiant setEmailTmp()    Sets the current record's "email_tmp" value
 * @method CopisimEtudiant setAnonyme()     Sets the current record's "anonyme" value
 * @method CopisimEtudiant setDoublant()    Sets the current record's "doublant" value
 * @method CopisimEtudiant setClassement()  Sets the current record's "classement" value
 * @method CopisimEtudiant setCopisimItem() Sets the current record's "CopisimItem" value
 * 
 * @package    copisim
 * @subpackage model
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCopisimEtudiant extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('copisim_etudiant');
        $this->hasColumn('nom', 'string', 50, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 50,
             ));
        $this->hasColumn('prenom', 'string', 50, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 50,
             ));
        $this->hasColumn('fac', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('naissance', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('email', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 100,
             ));
        $this->hasColumn('email_tmp', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 100,
             ));
        $this->hasColumn('anonyme', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => 0,
             ));
        $this->hasColumn('doublant', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => 0,
             ));
        $this->hasColumn('classement', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('CopisimItem', array(
             'local' => 'fac',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}