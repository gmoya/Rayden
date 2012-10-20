<?php

require_once dirname(__FILE__).'/../lib/carreraGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/carreraGeneratorHelper.class.php';

/**
 * carrera actions.
 *
 * @package    rayden
 * @subpackage carrera
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class carreraActions extends autoCarreraActions
{
  public function executeShow(sfWebRequest $request) 
  {
		$this->Carrera = $this->getRoute()->getObject();
  }

  public function executeAutoComplete(sfWebRequest $request)
  {
    $this->getResponse()->setContentType('application/json');
    $carreras = CarreraPeer::retrieveForAutoSelect($request->getParameter('q'), $request->getParameter('limit'));
    
		return $this->renderText(json_encode($carreras));
  }

	public function executeListAjax(sfWebRequest $request)
	{
    if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort')))
    {
      $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
    }

    // pager
    if ($request->getParameter('page'))
    {
      $this->setPage($request->getParameter('page'));
    }

    $pager = $this->getPager();
    $sort = $this->getSort();
    $helper = new carreraGeneratorHelper();

    return $this->renderPartial('carrera/list_ajax', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper));
	}

  public function executeNew(sfWebRequest $request)
  {
    $this->form = $this->configuration->getForm();
    $this->Carrera = $this->form->getObject();
		$this->ajax = $this->isAjax();
  }

 public function executeCreate(sfWebRequest $request)
  {
    $this->form = $this->configuration->getForm();
    $this->Carrera = $this->form->getObject();

    if (($this->ajax = $this->isAjax()) && $this->processForm($request, $this->form))
    {
    	return $this->renderPartial('carrera/notice', array('Carrera' => $this->Carrera, 'isNew' => true));
    }

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->Carrera = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->Carrera);
    $this->form->setDefault('accion', $request->getParameter('accion'));
    $this->ajax = $this->isAjax();
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->Carrera = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->Carrera);

    if (($this->ajax = $this->isAjax()) && $this->processForm($request, $this->form))
    {
			$params = $request->getPostParameters();

    	return $this->renderPartial('carrera/notice', array('Carrera' => $this->Carrera, 'isNew' => false, 'accion' => $params['carrera']['accion']));
    }

    $this->setTemplate('edit');
  }

 	public function executeBaja(sfWebRequest $request)
	{
		if ($params = $request->getPostParameters()) 
		{
			$Carrera = CarreraPeer::retrieveByPk($request->getParameter('idd'));
			$Carrera->darBaja($params, $this->getUser());
    	
			return $this->renderPartial('carrera/notice', array('Carrera' => $Carrera, 'isNew' => false, 'accion' => $params['carrera']['accion']));

		} else {
			$this->Carrera = CarreraPeer::retrieveByPk($request->getParameter('id'));
			$this->accion = $request->getParameter('accion');
			$this->estados = Carrera::getEstadosBaja();
		}
	}

	public function executeDatosPerfil(sfWebRequest $request)
	{
		$Carrera = $this->getRoute()->getObject();
    
		return $this->renderPartial('carrera/datos_perfil', array('Carrera' => $Carrera));
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
      $notice = $form->getObject()->isNew() ? 'Los datos han sido registrados exitosamente.' : 'Los datos han sido registrados exitosamente.';

			if ($form->isNew())
				$form->getObject()->setCreatedById($this->getUser()->getId());
			else
				$form->getObject()->setUpdatedById($this->getUser()->getId());

      $carrera = $form->save();

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $carrera)));

			if ($this->isAjax()) { return true; }
			
      $this->getUser()->setFlash('notice', $notice);

      $this->redirect('@carrera');
    }
    else
    {
      $this->getUser()->setFlash('error', 'Verifique los datos, se han encontrados errores.', false);
    }
	}

}
