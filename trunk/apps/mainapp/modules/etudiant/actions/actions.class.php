<?php

/**
 * etudiant actions.
 *
 * @package    copisim
 * @subpackage etudiant
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */

class etudiantActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->pager = new sfDoctrinePager('CopisimEtudiant', 250);
    $this->pager->setQuery(Doctrine_Core::getTable('CopisimEtudiant')->getListeQuery());
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }

  public function executeEditchoix(sfWebRequest $request)
  {
    if(!Doctrine::getTable('CopisimEtudiant')->checkValidMail($this->getUser()->getUsername()))
    {
      $this->getUser()->setFlash('error','Adresse email non fournie ou non validée !');
      $this->redirect('etudiant/edit');
    }

		if(null !== $request->getParameter('up'))
		{
			Doctrine::getTable('CopisimChoix')->setEtudiantChoixUp($this->getUser()->getUsername(), $request->getParameter('up'));
		}
		elseif(null !== $request->getParameter('down'))
		{
			Doctrine::getTable('CopisimChoix')->setEtudiantChoixDown($this->getUser()->getUsername(), $request->getParameter('down'));
		}
		elseif(null !== $request->getParameter('del'))
		{
			Doctrine::getTable('CopisimChoix')->setEtudiantChoixDel($this->getUser()->getUsername(), $request->getParameter('del'));
		}

		$this->copisim_choix = Doctrine::getTable('CopisimChoix')->getEtudiantChoix($this->getUser()->getUsername());

    $this->form = new CopisimChoixForm();
		$simulation = Doctrine::getTable('CopisimChoix')->simulChoix('2009', $this->getUser()->getUsername());
		$simul_choix = $simulation['choix'];
		$this->monchoix = $simul_choix[$this->getUser()->getUsername()];
		$simul_postes = $simulation['postes'];
		$dich_choix = explode(' à ', $this->monchoix);
		$this->monposte = $simul_postes[$dich_choix[0]][$dich_choix[1]];
		$this->simul_absents = $simulation['absents'];
  }

  public function executeUpdatechoix(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
//		$this->forward404Unless($copisim_etudiant = Doctrine::getTable('CopisimEtudiant')->find(array($this->getUser()->getUsername())), sprintf('Object copisim_etudiant does not exist (%s).', $request->getParameter('id')));
//    $this->form = new CopisimEtudiantChoixForm($copisim_etudiant);
    $this->form = new CopisimChoixForm();

    $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));

    if($this->form->isValid())
		{
      $this->form->save();
      $this->redirect('etudiant/editchoix');
    }

    $this->setTemplate('editchoix');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($copisim_etudiant = Doctrine::getTable('CopisimEtudiant')->find(array('id' => $this->getUser()->getUsername())), sprintf('Utilisateur inconnu : (%s).', $this->getUser()->getUsername()));

    if(!$copisim_etudiant->getEmailTmp())
      $copisim_etudiant->setEmailTmp($copisim_etudiant->getEmail());

    $this->form = new CopisimEtudiantForm($copisim_etudiant);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($copisim_etudiant = Doctrine::getTable('CopisimEtudiant')->find(array($this->getUser()->getUsername())), sprintf('Object copisim_etudiant does not exist (%s).', $request->getParameter('id')));

    $this->form = new CopisimEtudiantForm($copisim_etudiant);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeMail(sfWebRequest $request)
  {
    if(Doctrine::getTable('CopisimEtudiant')->validTokenMail($request['userid'], $request['token']))
      $this->getUser()->setFlash('notice','Adresse e-mail validée.');
    else
      $this->getUser()->setFlash('error','Erreur de validation d\'adresse e-mail.');

    if($this->getUser()->isAuthenticated())
      $this->redirect('etudiant/index');
    else
      $this->redirect('@homepage');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $form->save();
      $form_pass = $form->getEmbeddedForm('MdP');
      $form_pass->bind($form->getValue('MdP'));
      $form_pass->save();
      $this->getUser()->setFlash('notice','Mise à jour du profil effectuée.');

      $this->redirect('etudiant/edit');
    }
  }
}
