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
  public function executeAutoComplete(sfWebRequest $request)
  {
    $this->getResponse()->setContentType('application/json');
    $carreras = CarreraPeer::retrieveForAutoSelect($request->getParameter('q'), $request->getParameter('limit'));
    
		return $this->renderText(json_encode($carreras));
  }

	public function executeList(sfWebRequest $request)
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
    	return $this->renderPartial('carrera/notice', array());
    }

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->Carrera = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->Carrera);
    $this->ajax = $this->isAjax();
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->Carrera = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->Carrera);

    if (($this->ajax = $this->isAjax()) && $this->processForm($request, $this->form))
    {
    	return $this->renderPartial('carrera/notice', array());
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
      $notice = $form->getObject()->isNew() ? 'Los datos han sido registrados exitosamente.' : 'Los datos han sido registrados exitosamente.';

#			TODO Se hardcodea el usuario porque aún no está el módulo de Usuarios			
#			$form->getObject()->setUserCreated($request->getUser()->getId());
			if ($form->isNew())
			{
				$form->getObject()->setUserCreated(1);
			}
			else
			{
				$form->getObject()->setUserUpdated(1);
			}

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
