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
    $this->copisim_etudiants = Doctrine::getTable('copisim_etudiant')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->copisim_etudiant = Doctrine::getTable('copisim_etudiant')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->copisim_etudiant);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new copisim_etudiantForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new copisim_etudiantForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($copisim_etudiant = Doctrine::getTable('copisim_etudiant')->find(array($request->getParameter('id'))), sprintf('Object copisim_etudiant does not exist (%s).', $request->getParameter('id')));
    $this->form = new copisim_etudiantForm($copisim_etudiant);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($copisim_etudiant = Doctrine::getTable('copisim_etudiant')->find(array($request->getParameter('id'))), sprintf('Object copisim_etudiant does not exist (%s).', $request->getParameter('id')));
    $this->form = new copisim_etudiantForm($copisim_etudiant);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($copisim_etudiant = Doctrine::getTable('copisim_etudiant')->find(array($request->getParameter('id'))), sprintf('Object copisim_etudiant does not exist (%s).', $request->getParameter('id')));
    $copisim_etudiant->delete();

    $this->redirect('etudiant/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $copisim_etudiant = $form->save();

      $this->redirect('etudiant/edit?id='.$copisim_etudiant->getId());
    }
  }
}
