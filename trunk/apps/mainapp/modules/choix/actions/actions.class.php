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
    $this->copisim_choixs = Doctrine::getTable('copisim_choix')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->copisim_choix = Doctrine::getTable('copisim_choix')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->copisim_choix);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new copisim_choixForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new copisim_choixForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($copisim_choix = Doctrine::getTable('copisim_choix')->find(array($request->getParameter('id'))), sprintf('Object copisim_choix does not exist (%s).', $request->getParameter('id')));
    $this->form = new copisim_choixForm($copisim_choix);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($copisim_choix = Doctrine::getTable('copisim_choix')->find(array($request->getParameter('id'))), sprintf('Object copisim_choix does not exist (%s).', $request->getParameter('id')));
    $this->form = new copisim_choixForm($copisim_choix);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($copisim_choix = Doctrine::getTable('copisim_choix')->find(array($request->getParameter('id'))), sprintf('Object copisim_choix does not exist (%s).', $request->getParameter('id')));
    $copisim_choix->delete();

    $this->redirect('choix/index');
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
