<?php

require_once dirname(__FILE__).'/../lib/datoslaboralesGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/datoslaboralesGeneratorHelper.class.php';

/**
 * datoslaborales actions.
 *
 * @package    rayden
 * @subpackage datoslaborales
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class datoslaboralesActions extends autoDatoslaboralesActions
{
  public function executeNew(sfWebRequest $request)
	{
      $form = $this->configuration->getForm();
      $this->form = $form;
    	$this->form->setDefault('persona_id', $request->getParameter('persona'));
    	$this->form->setDefault('modulo', $request->getParameter('modulo'));
      $this->Empleo = $this->form->getObject();
      $this->ajax = $this->isAjax();
	}

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = $this->configuration->getForm();
    $this->Empleo = $this->form->getObject();

    if (($this->ajax = $this->isAjax()) && $this->processForm($request, $this->form))
    {
			$params = $request->getPostParameters();
    	
			return $this->renderPartial('datoslaborales/notice', array('Empleo' => $this->Empleo, 'modulo' => $params['empleo']['modulo']));
    }

    $this->setTemplate('new');
  }

	public function executeEdit(sfWebRequest $request)
	{
	    $this->Empleo = $this->getRoute()->getObject();
   		$this->form = $this->configuration->getForm($this->Empleo);
    	$this->form->setDefault('modulo', $request->getParameter('modulo'));
      $this->ajax = $this->isAjax();
	}

  public function executeUpdate(sfWebRequest $request)
  {
    $this->Empleo = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->Empleo);

    if (($this->ajax = $this->isAjax()) && $this->processForm($request, $this->form))
    {
			$params = $request->getPostParameters();
    	
			return $this->renderPartial('datoslaborales/notice', array('Empleo' => $this->Empleo, 'modulo' => $params['empleo']['modulo']));
    }

    $this->setTemplate('edit');
  }
	
	public function isAjax()
  {
    return $this->getRequest()->isXmlHttpRequest();
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    
		if ($form->isValid())
    {
      $notice = 'Los datos han sido registrados exitosamente.';
			$params = $request->getPostParameters();

			if ($form->isNew())
				$form->getObject()->setCreatedById($this->getUser()->getId());
			else
				$form->getObject()->setUpdatedById($this->getUser()->getId());

      $datoslaborales = $form->save();

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $datoslaborales)));

			if ($this->isAjax()) { return true; }
      
			$this->getUser()->setFlash('notice', $notice);

      $metodo = 'get'.$params['empleo']['modulo'];
      $this->redirect(array('sf_route' => $params['empleo']['modulo'].'_show', 'sf_subject' => $datoslaborales->getPersona()->$metodo()));
    }
    else
    {
      $this->getUser()->setFlash('error', 'Verifique los datos, se han encontrados errores.', false);
    }
	}

}
