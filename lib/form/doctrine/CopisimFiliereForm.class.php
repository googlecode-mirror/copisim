<?php

/**
 * CopisimFiliere form.
 *
 * @package    copisim
 * @subpackage form
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CopisimFiliereForm extends BaseCopisimFiliereForm
{
  public function configure()
  {
		unset($this['periode']);
  }
}
