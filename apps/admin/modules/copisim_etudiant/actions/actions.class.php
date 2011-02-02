<?php

require_once dirname(__FILE__).'/../lib/copisim_etudiantGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/copisim_etudiantGeneratorHelper.class.php';

/**
 * copisim_etudiant actions.
 *
 * @package    copisim
 * @subpackage copisim_etudiant
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class copisim_etudiantActions extends autoCopisim_etudiantActions
{
  public function executeListImportEtudiant(sfWebRequest $request)
  {
    $this->redirect('copisim_etudiant');
  }

  public function executeListArchiveEtudiant(sfWebRequest $request)
  {
    $this->redirect('copisim_etudiant');
  }
}
