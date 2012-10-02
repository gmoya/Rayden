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
		unset($this['persona_id'], $this['created_at'], $this['created_by_id'], 
					$this['updated_at'], $this['updated_by_id'], $this['deleted_at'], 
					$this['deleted_by_id']
				);
  }
}
