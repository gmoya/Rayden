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
}
