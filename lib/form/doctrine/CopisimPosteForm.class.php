<?php

/**
 * CopisimPoste form.
 *
 * @package    copisim
 * @subpackage form
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CopisimPosteForm extends BaseCopisimPosteForm
{
  public function configure()
  {
		unset($this['periode'], $this['filiere'], $this['ville']);
  }
}
