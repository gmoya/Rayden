<?php


/**
 * Skeleton subclass for representing a row from the 'docente' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Thu Sep  6 00:23:15 2012
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class Docente extends BaseDocente {

	public function __toString()
	{
		return $this->getPersona()->getNombreCompleto();
	}

  public function getNombreEstado()
  {
    $estadosPosibles = sfConfig::get('app_estados_Docente');
    $nombreEstado = array_keys($estadosPosibles, $this->getEstado());

    return(ucwords($nombreEstado[0]));
  }

  static public function getIdByNombreEstado($nombre = null, $desc = false)
  {
    $estadosPosibles = sfConfig::get('app_estados_Docente');

    if (!is_null($nombre))
    {
      return $estadosPosibles[$nombre];
    }

    if ($desc)
    {
      return $nombreEstado = array_keys($estadosPosibles);
    }

    return $estadosPosibles;
  }

  static public function getEstadosActivos()
	{
    return sfConfig::get('app_estados_DocenteActivo');
	}

  static public function getEstadosBaja()
	{
    return sfConfig::get('app_estados_DocenteBaja');
	}

  static public function search($arg = null)
  {
    if (null === $arg || '' === $arg) { return ''; }

    $docente = DocentePeer::retrieveByPK($arg);
    
		return ($docente && (($nombre = $docente->getPersona()->getNombreCompleto()) != '')) ? $nombre : '';
  }

	public function darBaja($params, $usuario)
	{
		$this->setEstado($params['docente']['estado']);
		$this->setDeletedAt(date('Y-m-d H:i:s'));
		$this->setDeletedById($usuario->getId());

		$obs = ($previa = $this->getPersona()->getObservaciones()) ? $previa." \r\n". $params['docente']['observaciones'] : $params['docente']['observaciones'];
		$this->getPersona()->setObservaciones($obs);
		
		$this->getPersona()->save();
		$this->save();
	}

	public function isDadoBaja()
	{
		return in_array($this->getEstado(), sfConfig::get('app_estados_DocenteBaja'));
	}

} // Docente
