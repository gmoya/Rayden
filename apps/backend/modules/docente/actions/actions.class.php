<?php

require_once dirname(__FILE__).'/../lib/docenteGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/docenteGeneratorHelper.class.php';

/**
 * docente actions.
 *
 * @package    rayden
 * @subpackage docente
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class docenteActions extends autoDocenteActions
{
  public function executeShow(sfWebRequest $request) 
  {
		$this->Docente = $this->getRoute()->getObject();
  }

  public function executeNew(sfWebRequest $request)
	{
      $form = $this->configuration->getForm();
      $this->form = $form;
      $this->Docente = $this->form->getObject();
      $this->ajax = $this->isAjax();
	}

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = $this->configuration->getForm();
    $this->Docente = $this->form->getObject();

    if (($this->ajax = $this->isAjax()) && $this->processForm($request, $this->form))
    {
    	return $this->renderPartial('docente/notice', array('Docente' => $this->Docente, 'isNew' => true));
    }

    $this->setTemplate('new');
  }

	public function executeEdit(sfWebRequest $request)
	{
	    $this->Docente = $this->getRoute()->getObject();
   		$this->form = $this->configuration->getForm($this->Docente);
    	$this->form->setDefault('accion', $request->getParameter('accion'));
      $this->ajax = $this->isAjax();
	}

  public function executeUpdate(sfWebRequest $request)
  {
    $this->Docente = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->Docente);

    if (($this->ajax = $this->isAjax()) && $this->processForm($request, $this->form))
    {
			$params = $request->getPostParameters();
    	
			return $this->renderPartial('docente/notice', array('Docente' => $this->Docente, 'isNew' => false, 'accion' => $params['docente']['accion']));
    }

    $this->setTemplate('edit');
  }

 	public function executeBaja(sfWebRequest $request)
	{
		if ($params = $request->getPostParameters()) 
		{
			$Docente = DocentePeer::retrieveByPk($request->getParameter('idd'));
			$Docente->darBaja($params, $this->getUser());
    	
			return $this->renderPartial('docente/notice', array('Docente' => $Docente, 'isNew' => false, 'accion' => $params['docente']['accion']));

		} else {
			$this->Docente = DocentePeer::retrieveByPk($request->getParameter('id'));
			$this->accion = $request->getParameter('accion');
			$this->estados = Docente::getEstadosBaja();
		}
	}

 	public function executeListAjax(sfWebRequest $request)
	{
    if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort')))
    {
      $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
    }
    if ($request->getParameter('page'))
    {
      $this->setPage($request->getParameter('page'));
    }

    $pager = $this->getPager();
    $sort = $this->getSort();
    $helper = new docenteGeneratorHelper();

    return $this->renderPartial('docente/list_ajax', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper));
	}
	
	public function executeDatosPerfil(sfWebRequest $request)
	{
		$Docente = $this->getRoute()->getObject();
    
		return $this->renderPartial('docente/datos_perfil', array('Docente' => $Docente));
	}
	
  public function executeAutoComplete(sfWebRequest $request)
  {
    $this->getResponse()->setContentType('application/json');
    $docentes = DocentePeer::retrieveForAutoSelect($request->getParameter('q'), $request->getParameter('limit'));
    
		return $this->renderText(json_encode($docentes));
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

			if ($form->isNew())
				$form->getObject()->setCreatedById($this->getUser()->getId());
			else
				$form->getObject()->setUpdatedById($this->getUser()->getId());

      $docente = $form->save();

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $docente)));

			if ($this->isAjax()) { return true; }
      
			$this->getUser()->setFlash('notice', $notice);

      $this->redirect('@docente');
    }
    else
    {
      $this->getUser()->setFlash('error', 'Verifique los datos, se han encontrados errores.', false);
    }
	}

}
