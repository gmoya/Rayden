<?php

class importarLocalidadesTask extends sfBaseTask
{
  protected function configure()
  {
    $this->namespace = 'importar';
    $this->name = 'localidades';
    $this->briefDescription = 'Importa las localidades desde el csv.';
    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name', 'backend'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel'),
    ));

		$this->correspondencia = array(
																		'1' => 1,  # BUENOS AIRES   
																	 '24' => 2,  # CAPITAL FEDERAL
																		'2' => 3,  # CATAMARCA      
																		'3' => 4,  # CHACO          
																		'4' => 5,  # CHUBUT         
																		'5' => 6,  # CORDOBA        
																		'6' => 7,  # CORRIENTES     
																		'7' => 8,  # ENTRE RIOS     
																		'8' => 9,  # FORMOSA        
																		'9' => 10, # JUJUY               
																	 '10' => 11, # LA PAMPA            
																	 '11' => 12, # LA RIOJA            
																	 '12' => 13, # MENDOZA             
																	 '13' => 14, # MISIONES            
																	 '14' => 15, # NEUQUEN             
																	 '15' => 16, # RIO NEGRO           
																	 '16' => 17, # SALTA               
																	 '17' => 18, # SAN JUAN            
																	 '18' => 19, # SAN LUIS            
																	 '19' => 20, # SANTA CRUZ          
																	 '23' => 21, # SANTA FE            
																	 '20' => 22, # SANTIAGO DEL ESTERO 
																	 '21' => 23, # TIERRA DEL FUEGO    
																	 '22' => 24, # TUCUMAN   
		);

  }

  protected function execute($arguments = array(), $options = array())
  {
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'] ? $options['connection'] : null)->getConnection();

		$contenido = file_get_contents('data/csvs/localidades.csv');
    $lineas 	 = explode("\n", $contenido);


		foreach ($lineas as $datos)
		{
			$datos = explode('|', $datos);

			if ($datos[1] != '')
			{
				$loc = new Localidad();
				$loc->setNombre(trim($datos[1]));
				$loc->setCp(trim($datos[2]));
				$loc->setProvinciaId($this->correspondencia[trim($datos[3])]);

				$loc->save();
			}
		}
    // Aquí se incluye el código de la tarea
    $this->log('Finalizó la importación.');
  }
}

