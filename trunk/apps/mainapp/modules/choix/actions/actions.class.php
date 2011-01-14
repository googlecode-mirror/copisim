<?php

/**
 * choix actions.
 *
 * @package    copisim
 * @subpackage choix
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class choixActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
		if(null === $request->getParameter('periode'))
			$periode = '2009';
		else
			$periode = $request->getParameter('periode');

    $this->copisim_postes = Doctrine::getTable('CopisimPoste')->getPostesTableau($periode);
		$this->copisim_regions = Doctrine::getTable('CopisimRegion')->getRegionsParPeriode($periode);
		$this->copisim_filieres = Doctrine::getTable('CopisimFiliere')->getFilieresParPeriode($periode);
  }

  public function executeSimul(sfWebRequest $request)
  {
		$periode = "2009"; // À définir une fonction CopisimPeriode::getActivePeriode()

		$this->copisim_postes = Doctrine::getTable('CopisimPoste')->getPostesTableau($periode);
		$this->copisim_regions = Doctrine::getTable('CopisimRegion')->getRegionsParPeriode($periode);
		$this->copisim_filieres = Doctrine::getTable('CopisimFiliere')->getFilieresParPeriode($periode);

		$simulation = Doctrine::getTable('CopisimChoix')->simulChoix('2009', $this->getUser()->getUsername());
		$this->simul_postes = $simulation['postes'];
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->copisim_choix = Doctrine::getTable('CopisimChoix')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->copisim_choix);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CopisimChoixForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CopisimChoixForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($copisim_choix = Doctrine::getTable('CopisimChoix')->find(array($request->getParameter('id'))), sprintf('Object CopisimChoix does not exist (%s).', $request->getParameter('id')));
    $this->form = new CopisimCoixForm($copisim_choix);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($copisim_choix = Doctrine::getTable('CopisimChoix')->find(array($request->getParameter('id'))), sprintf('Object CopisimChoix does not exist (%s).', $request->getParameter('id')));
    $this->form = new CopisimChoixForm($copisim_choix);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $copisim_choix = $form->save();

      $this->redirect('choix/edit?id='.$copisim_choix->getId());
    }
  }
}
