<?php

/**
 * Persona form.
 *
 * @package    rayden
 * @subpackage form
 * @author     Your name here
 */
class PersonaForm extends BasePersonaForm
{
  public function configure()
  {
		unset($this['created_at'], $this['user_created'], $this['updated_at'], 
					$this['user_updated'], $this['deleted_at'],	$this['user_deleted']
				);

    $years = range(date('Y') - 80, date('Y') );
    $this->widgetSchema['fecha_nacimiento'] = new sfWidgetFormDate($options = array(
      'format' => '%day%/%month%/%year%',
      'years'=>array_combine($years, $years)
    ));

    $this->validatorSchema['nro_documento'] = new sfValidatorInteger(array('max' => 99999999));

    $validadores = array(new sfValidatorString(array('max_length' => 50)) , new sfValidatorEmail());

    $this->validatorSchema['email'] = new sfValidatorAnd($validadores);

		# TODO falta el validador de cel
    $regex = '/^([0-9]{11}|[0-9]{13})$/';
    $this->validatorSchema['celular'] = new sfValidatorRegex(array('pattern' => $regex, 'required' => 'true'));
    $this->validatorSchema['celular']->setMessage('invalid','Formato incorrecto. Ej: 01141231234');

  }
}
