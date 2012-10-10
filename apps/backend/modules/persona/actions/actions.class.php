<?php

require_once dirname(__FILE__).'/../lib/personaGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/personaGeneratorHelper.class.php';

/**
 * persona actions.
 *
 * @package    rayden
 * @subpackage persona
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class personaActions extends autoPersonaActions
{
	public function executeActualizarDomicilio(sfWebRequest $request)
	{
		$Persona = $this->getRoute()->getObject();
		
		return $this->renderPartial('persona/mis_domicilios', array('Persona' => $Persona, 'modulo' => $request->getParameter('modulo')));
	}
}
