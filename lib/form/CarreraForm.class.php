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
		unset($this['created_at'], $this['user_created'], $this['updated_at'], 
					$this['user_updated'], $this['deleted_at'],	$this['user_deleted']
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
