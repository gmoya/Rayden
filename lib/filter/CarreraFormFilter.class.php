<?php

/**
 * Carrera filter form.
 *
 * @package    rayden
 * @subpackage filter
 * @author     Your name here
 */
class CarreraFormFilter extends BaseCarreraFormFilter
{
  public function configure()
  {
		unset($this['descripcion'], $this['created_at'], $this['user_created'], 
					$this['updated_at'], $this['user_updated'], $this['deleted_at'], 
					$this['user_deleted']
				);
  }
}
