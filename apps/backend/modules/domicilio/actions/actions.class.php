<?php

require_once dirname(__FILE__).'/../lib/domicilioGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/domicilioGeneratorHelper.class.php';

/**
 * domicilio actions.
 *
 * @package    rayden
 * @subpackage domicilio
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class domicilioActions extends autoDomicilioActions
{
  public function executeNew(sfWebRequest $request)
	{
      $form = $this->configuration->getForm();
      $this->form = $form;
    	$this->form->setDefault('persona_id', $request->getParameter('persona'));
    	$this->form->setDefault('modulo', $request->getParameter('modulo'));
      $this->Domicilio = $this->form->getObject();
      $this->ajax = $this->isAjax();
	}
	
  public function executeCreate(sfWebRequest $request)
  {
    $this->form = $this->configuration->getForm();
    $this->Domicilio = $this->form->getObject();

    if (($this->ajax = $this->isAjax()) && $this->processForm($request, $this->form))
    {
			$params = $request->getPostParameters();
    	
			return $this->renderPartial('domicilio/notice', array('Domicilio' => $this->Domicilio, 'modulo' => $params['domicilio']['modulo']));
    }

    $this->setTemplate('new');
  }

	public function executeEdit(sfWebRequest $request)
	{
	    $this->Domicilio = $this->getRoute()->getObject();
   		$this->form = $this->configuration->getForm($this->Domicilio);
    	$this->form->setDefault('modulo', $request->getParameter('modulo'));
      $this->ajax = $this->isAjax();
	}

  public function executeUpdate(sfWebRequest $request)
  {
    $this->Domicilio = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->Domicilio);

    if (($this->ajax = $this->isAjax()) && $this->processForm($request, $this->form))
    {
			$params = $request->getPostParameters();
    	
			return $this->renderPartial('domicilio/notice', array('Domicilio' => $this->Domicilio, 'modulo' => $params['domicilio']['modulo']));
    }

    $this->setTemplate('edit');
  }

  public function executeElegirPorProvincia(sfWebRequest $request)
  {
    $provincia_id = $request->getParameter('id');
    $this->localidades = array();

    if ($provincia_id != '')
    {
      $provincia = ProvinciaPeer::retrievebyPk($provincia_id);
      $this->localidades = LocalidadPeer::doSelectByProvincia($provincia_id);
    }
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

      $domicilio = $form->save();

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $domicilio)));

			if ($this->isAjax()) { return true; }
      
			$this->getUser()->setFlash('notice', $notice);

      $metodo = 'get'.$params['domicilio']['modulo'];
      $this->redirect(array('sf_route' => $params['domicilio']['modulo'].'_show', 'sf_subject' => $domicilio->getPersona()->$metodo()));
    }
    else
    {
      $this->getUser()->setFlash('error', 'Verifique los datos, se han encontrados errores.', false);
    }
	}

	public function isAjax()
  {
    return $this->getRequest()->isXmlHttpRequest();
  }
}
