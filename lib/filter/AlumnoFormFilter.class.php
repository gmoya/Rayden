<?php

/**
 * Alumno filter form.
 *
 * @package    rayden
 * @subpackage filter
 * @author     Your name here
 */
class AlumnoFormFilter extends BaseAlumnoFormFilter
{
  public function configure()
  {
		unset($this['persona_id'], $this['created_at'], $this['user_created'], 
					$this['updated_at'], $this['user_updated'], $this['deleted_at'], 
					$this['user_deleted'], $this['regular_at']
				);
  }
}
