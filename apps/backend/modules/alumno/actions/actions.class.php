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

    $this->processForm($request, $this->form);
    $this->ajax = $this->isAjax();
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

    $this->processForm($request, $this->form);
    $this->ajax = $this->isAjax();
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

      $alumno = $form->save();

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $alumno)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.'Puede agregar una compa&ntilde;&iacute;a m&aacute;s.');

        $this->redirect('@alumno_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        $this->redirect('@alumno');
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'Verifique los datos, se han encontrados errores.', false);
    }
	}
}
