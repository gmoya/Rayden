<?php

class importarPaisesTask extends sfBaseTask
{
  protected function configure()
  {
    $this->namespace = 'importar';
    $this->name = 'paises';
    $this->briefDescription = 'Importa los paises a la tabla nacionalidad.';
    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name', 'backend'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel'),
    ));
  }

  protected function execute($arguments = array(), $options = array())
  {
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'] ? $options['connection'] : null)->getConnection();

		$contenido = file_get_contents('data/csvs/paises.csv');
    $lineas 	 = explode("\n", $contenido);


		foreach ($lineas as $pais)
		{
			if ($pais != '')
			{
				$nacionalidad = new Nacionalidad();
				$nacionalidad->setNombre($pais);
				
				$nacionalidad->save();
			}
		}
    // Aquí se incluye el código de la tarea
    $this->log('Finalizó la importación.');
  }
}

