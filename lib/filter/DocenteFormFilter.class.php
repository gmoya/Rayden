<?php

/**
 * Docente filter form.
 *
 * @package    rayden
 * @subpackage filter
 * @author     Your name here
 */
class DocenteFormFilter extends BaseDocenteFormFilter
{
  public function configure()
  {
		unset($this['persona_id'], $this['created_at'], $this['user_created'], 
					$this['updated_at'], $this['user_updated'], $this['deleted_at'], 
					$this['user_deleted']
				);
  }
}
