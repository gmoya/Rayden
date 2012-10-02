<?php

/**
 * Carrera form.
 *
 * @package    rayden
 * @subpackage form
 * @author     Your name here
 */
class CarreraForm extends BaseCarreraForm
{
  public function configure()
  {
		unset($this['created_at'], $this['created_by_id'], $this['updated_at'], 
					$this['updated_by_id'], $this['deleted_at'],	$this['deleted_by_id']
				);
  }

  public function doSave($con = null)
  {
    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $this->updateObject();

    if($this->isNew())
    {
      $this->getObject()->setUserCreated(1);
    }

    $this->object->save($con);

    return $this->object;
  }
}
