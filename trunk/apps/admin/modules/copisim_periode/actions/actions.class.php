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
			$this->getUser()->setFlash('notice', 'Des régions ont été ajoutées à la session : '.$regions);
		else
			$this->getUser()->setFlash('error', 'Pas de régions à importer depuis la session précédente');

		$copisim_periode = $this->getRoute()->getObject();
		$this->redirect(array('sf_route' => 'copisim_periode_edit', 'sf_subject' => $copisim_periode));
	}

	public function executeListGeneratePoste(sfWebRequest $request)
	{
		$copisim_periode = $this->getRoute()->getObject();
		if($postes = Doctrine::getTable('CopisimPoste')->createPosteFromSession($copisim_periode->getId()))
			$this->getUser()->setFlash('notice', $regions.' postes ont été créés pour la session');
		else
			$this->getUser()->setFlash('error', 'Pas de filières à importer depuis la session précédente');

		$this->redirect('copisim_periode/ListEditPoste?id='.$copisim_periode->getId());
	}

	public function executeListEditPoste(sfWebRequest $request)
	{
		$this->periode = $this->getRoute()->getObject()->getId();
//		print_r($this->getRoute());
		$this->forward404Unless($this->filieres = Doctrine::getTable('CopisimFiliere')->getFilieresParPeriode($this->periode), sprintf('Pas de filières trouvées pour la période %s. Veuillez ajouter des filières.', $this->periode));
		$this->forward404Unless($this->regions = Doctrine::getTable('CopisimRegion')->getRegionsParPeriode($this->periode), sprintf('Pas de régions trouvées pour la période %s. Veuillez ajouter des régions.', $this->periode));
		$this->forward404Unless($postes = Doctrine::getTable('CopisimPoste')->getPostesParPeriode($this->periode), sprintf('Pas de postes trouvées pour la période %s. Veuillez générer les postes.', $this->periode));
		$this->form = new EditPosteForm();
		$this->form->embed($postes);
	}

	public function executeListCreatePoste(sfWebRequest $request)
	{
//		$this->forward404Unless($request->isMethod(sfRequest::POST));
		$this->periode = $this->getRoute()->getObject()->getId();
//    $this->periode = $request->getParameter('id');
		$this->forward404Unless($this->filieres = Doctrine::getTable('CopisimFiliere')->getFilieresParPeriode($this->periode), sprintf('Pas de filières trouvées pour la période %s. Veuillez ajouter des filières.', $this->periode));
		$this->forward404Unless($this->regions = Doctrine::getTable('CopisimRegion')->getRegionsParPeriode($this->periode), sprintf('Pas de régions trouvées pour la période %s. Veuillez ajouter des régions.', $this->periode));
		$this->forward404Unless($postes = Doctrine::getTable('CopisimPoste')->getPostesParPeriode($this->periode), sprintf('Pas de postes trouvées pour la période %s. Veuillez générer les postes.', $this->periode));
		$this->form = new EditPosteForm();
		$this->form->embed($postes);

		$this->form->bind($request->getParameter($this->form->getName()));
		if ($this->form->isValid())
		{
		  $this->form->embeddedSave();
//			$count = $this->form->save($postes);
//			$this->getUser()->setFlash('notice', $count.' postes ont été modifiés');
      $this->getUser()->setFlash('notice', 'Des postes ont été modifiés');
			$this->redirect('copisim_periode/ListEditPoste?id='.$this->periode);
		}
		$this->setTemplate('ListEditPoste');
	}
}
