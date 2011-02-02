<?php

/**
 * CopisimEtudiant form.
 *
 * @package    copisim
 * @subpackage form
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */

class AdminCopisimEtudiantForm extends BaseCopisimEtudiantForm
{
  public function configure()
  {
    unset($this['email'], $this['email_tmp'], $this['naissance'], $this['anonyme'], $this['updated_at']);
  }

}
