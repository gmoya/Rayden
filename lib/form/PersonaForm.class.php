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
		unset($this['created_at'], $this['created_by_id'], $this['updated_at'], 
					$this['updated_by_id'], $this['deleted_at'],	$this['deleted_by_id']
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
    $this->validatorSchema['celular'] = new sfValidatorRegex(array('pattern' => $regex, 'required' => false));
    $this->validatorSchema['celular']->setMessage('invalid','Formato incorrecto. Ej: 01141231234');

  }

  public function configurarAlumno()
  {
    $this->setValidator('tipo_documento_id', new sfValidatorPropelChoice(array('model' => 'TipoDocumento', 'column' => 'id', 'required' => true)));
    $this->setValidator('nro_documento'   , new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => true)));
    $this->setValidator('email'           , new sfValidatorString(array('max_length' => 50, 'required' => true)));
    $this->setValidator('sexo_id' , new sfValidatorPropelChoice(array('model' => 'TipoSexo', 'column' => 'id', 'required' => true)));
   	$this->validatorSchema['fecha_nacimiento']->setOption('required', true);

		# TODO validadores sacados para acelerar el alta - consultar con Casco requeridos
		#    $this->setValidator('nacionalidad_id' , new sfValidatorPropelChoice(array('model' => 'Nacionalidad', 'column' => 'id', 'required' => true)));
		#    $this->setValidator('estado_civil_id' , new sfValidatorPropelChoice(array('model' => 'EstadoCivil', 'column' => 'id', 'required' => true)));
  }

}
