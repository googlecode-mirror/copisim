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
    $copisim_etudiants = Doctrine::getTable('CopisimEtudiant')
      ->createQuery('a')
      ->orderBy('classement asc')
      ->execute();
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
//      $this->getUser()->setFlash('notice','Mise à jour du profil effectuée.');

      $this->redirect('etudiant/edit');
    }
  }
}
