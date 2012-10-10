<?php

require_once dirname(__FILE__).'/../lib/alumnoGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/alumnoGeneratorHelper.class.php';

/**
 * alumno actions.
 *
 * @package    rayden
 * @subpackage alumno
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class alumnoActions extends autoAlumnoActions
{
  public function executeShow(sfWebRequest $request) 
  {
		$this->Alumno = $this->getRoute()->getObject();
  }

  public function executeNew(sfWebRequest $request)
	{
      $form = $this->configuration->getForm();
      $this->form = $form;
      $this->Alumno = $this->form->getObject();
      $this->ajax = $this->isAjax();
	}

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = $this->configuration->getForm();
    $this->Alumno = $this->form->getObject();

    if (($this->ajax = $this->isAjax()) && $this->processForm($request, $this->form))
    {
    	return $this->renderPartial('alumno/notice', array('alumno' => $this->Alumno, 'isNew' => true));
    }

    $this->setTemplate('new');
  }

	public function executeEdit(sfWebRequest $request)
	{
	    $this->Alumno = $this->getRoute()->getObject();
   		$this->form = $this->configuration->getForm($this->Alumno);
      $this->ajax = $this->isAjax();
	}

  public function executeUpdate(sfWebRequest $request)
  {
    $this->Alumno = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->Alumno);

    if (($this->ajax = $this->isAjax()) && $this->processForm($request, $this->form))
    {
    	return $this->renderPartial('alumno/notice', array('alumno' => $this->Alumno, 'isNew' => false));
    }

    $this->setTemplate('edit');
  }

 	public function executeBaja(sfWebRequest $request)
	{
		$this->Alumno = AlumnoPeer::retrieveByPk($request->getParameter('id'));
		$this->estados = Alumno::getEstadosBaja();

		if ($params = $request->getPostParameters()) {
			$this->Alumno->darBaja($params, $this->getUser());
    	
			return $this->renderPartial('alumno/notice', array('alumno' => $this->Alumno, 'isNew' => false));
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
    $helper = new alumnoGeneratorHelper();

    return $this->renderPartial('alumno/list_ajax', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper));
	}

  public function executeAutoComplete(sfWebRequest $request)
  {
    $this->getResponse()->setContentType('application/json');
    $alumnos = AlumnoPeer::retrieveForAutoSelect($request->getParameter('q'), $request->getParameter('limit'));
    
		return $this->renderText(json_encode($alumnos));
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

      $alumno = $form->save();

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $alumno)));

			if ($this->isAjax()) { return true; }
      
			$this->getUser()->setFlash('notice', $notice);

      $this->redirect('@alumno');
    }
    else
    {
      $this->getUser()->setFlash('error', 'Verifique los datos, se han encontrados errores.', false);
    }
	}
}
