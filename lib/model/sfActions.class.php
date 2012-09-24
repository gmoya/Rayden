<?php
	
 	/**
 	 * sfWebRequest class.
 	 *
 	 * This class manages web requests. It parses input from the request and store them as parameters.
 	 *
 	 * @package    symfony
 	 * @subpackage request
 	 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 	 * @author     Sean Kerr <sean@code-box.org>
 	 * @version    SVN: $Id$
 	 */
	abstract class sfActions extends sfAction
	{
		public function isAjax()
		{
	    return $this->isXmlHttpRequest();
		}
	}
