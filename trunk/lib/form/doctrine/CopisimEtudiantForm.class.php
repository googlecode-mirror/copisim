<?php

/**
 * CopisimEtudiant form.
 *
 * @package    copisim
 * @subpackage form
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */

class CopisimEtudiantForm extends BaseCopisimEtudiantForm
{
  public function configure()
  {
    $this->embedForm('MdP', new copisimUserPasswordForm(sfContext::getInstance()->getUser()->getGuardUser()));
    
    unset($this['nom'], $this['prenom'], $this['fac'], $this['created_at'], $this['updated_at'], $this['classement']);
    
    $this->validatorSchema['email_tmp'] = new sfValidatorAnd(array(
      $this->validatorSchema['email_tmp'],
      new sfValidatorEmail(),
    ));
    
    $this->widgetSchema['email'] = new sfWidgetFormInputHidden();
    $this->widgetSchema->setLabel('email_tmp', 'Email');
  }

}
