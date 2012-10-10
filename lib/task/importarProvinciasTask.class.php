<?php

class importarProvinciasTask extends sfBaseTask
{
  protected function configure()
  {
    $this->namespace = 'importar';
    $this->name = 'provincias';
    $this->briefDescription = 'Importa las provincias desde el csv.';
    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name', 'backend'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel'),
    ));
  }

  protected function execute($arguments = array(), $options = array())
  {
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'] ? $options['connection'] : null)->getConnection();

		$contenido = file_get_contents('data/csvs/provincias.csv');
    $lineas 	 = explode("\n", $contenido);


		foreach ($lineas as $datos)
		{
			$datos = explode('|', $datos);

			if ($datos[1] != '')
			{
				$pcia = new Provincia();
				$pcia->setNombre(trim($datos[1]));
				
				$pcia->save();
			}
		}
    // Aquí se incluye el código de la tarea
    $this->log('Finalizó la importación.');
  }
}

