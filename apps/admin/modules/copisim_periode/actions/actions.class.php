<?php

require_once dirname(__FILE__).'/../lib/copisim_periodeGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/copisim_periodeGeneratorHelper.class.php';

/**
 * copisim_periode actions.
 *
 * @package    copisim
 * @subpackage copisim_periode
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class copisim_periodeActions extends autoCopisim_periodeActions
{
	public function executeListImportLastFiliere(sfWebRequest $request)
	{
		if($filieres = Doctrine::getTable('CopisimFiliere')->addFiliereToSession())
			$this->getUser()->setFlash('notice', 'Des filières ont été ajoutées à la session : '.$filieres);
		else
			$this->getUser()->setFlash('error', 'Pas de filières à importer depuis la session précédente');
		
		$copisim_periode = $this->getRoute()->getObject();
		$this->redirect(array('sf_route' => 'copisim_periode_edit', 'sf_subject' => $copisim_periode));
	}

	public function executeListImportLastRegion(sfWebRequest $request)
	{
		if($regions = Doctrine::getTable('CopisimRegion')->addRegionToSession())
			$this->getUser()->setFlash('notice', 'Des filières ont été ajoutées à la session : '.$regions);
		else
			$this->getUser()->setFlash('error', 'Pas de filières à importer depuis la session précédente');

		$copisim_periode = $this->getRoute()->getObject();
		$this->redirect(array('sf_route' => 'copisim_periode_edit', 'sf_subject' => $copisim_periode));
	}
}
