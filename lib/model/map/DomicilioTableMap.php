<?php


/**
 * This class defines the structure of the 'domicilio' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Sat Oct 20 15:57:45 2012
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class DomicilioTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.DomicilioTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('domicilio');
		$this->setPhpName('Domicilio');
		$this->setClassname('Domicilio');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('PERSONA_ID', 'PersonaId', 'INTEGER', 'persona', 'ID', true, null, null);
		$this->addForeignKey('PROVINCIA_ID', 'ProvinciaId', 'INTEGER', 'provincia', 'ID', true, null, null);
		$this->addForeignKey('LOCALIDAD_ID', 'LocalidadId', 'INTEGER', 'localidad', 'ID', true, null, null);
		$this->addColumn('TELEFONO', 'Telefono', 'VARCHAR', false, 20, null);
		$this->addColumn('CALLE', 'Calle', 'VARCHAR', false, 70, null);
		$this->addColumn('ALTURA', 'Altura', 'VARCHAR', false, 10, null);
		$this->addColumn('PISO', 'Piso', 'VARCHAR', false, 10, null);
		$this->addColumn('DPTO', 'Dpto', 'VARCHAR', false, 5, null);
		$this->addColumn('CODIGO_POSTAL', 'CodigoPostal', 'VARCHAR', false, 8, null);
		$this->addColumn('ESCALERA', 'Escalera', 'VARCHAR', false, 4, null);
		$this->addColumn('TORRE', 'Torre', 'VARCHAR', false, 100, null);
		$this->addColumn('NUDO', 'Nudo', 'VARCHAR', false, 100, null);
		$this->addColumn('ALA', 'Ala', 'VARCHAR', false, 10, null);
		$this->addColumn('PARCELA', 'Parcela', 'VARCHAR', false, 5, null);
		$this->addColumn('ENTRE_CALLES', 'EntreCalles', 'VARCHAR', false, 255, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		$this->addForeignKey('CREATED_BY_ID', 'CreatedById', 'INTEGER', 'sf_guard_user', 'ID', true, null, null);
		$this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
		$this->addForeignKey('UPDATED_BY_ID', 'UpdatedById', 'INTEGER', 'sf_guard_user', 'ID', false, null, null);
		$this->addColumn('DELETED_AT', 'DeletedAt', 'TIMESTAMP', false, null, null);
		$this->addForeignKey('DELETED_BY_ID', 'DeletedById', 'INTEGER', 'sf_guard_user', 'ID', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Persona', 'Persona', RelationMap::MANY_TO_ONE, array('persona_id' => 'id', ), null, null);
    $this->addRelation('Provincia', 'Provincia', RelationMap::MANY_TO_ONE, array('provincia_id' => 'id', ), null, null);
    $this->addRelation('Localidad', 'Localidad', RelationMap::MANY_TO_ONE, array('localidad_id' => 'id', ), null, null);
    $this->addRelation('sfGuardUserRelatedByCreatedById', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('created_by_id' => 'id', ), null, null);
    $this->addRelation('sfGuardUserRelatedByUpdatedById', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('updated_by_id' => 'id', ), null, null);
    $this->addRelation('sfGuardUserRelatedByDeletedById', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('deleted_by_id' => 'id', ), null, null);
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
			'symfony_timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
		);
	} // getBehaviors()

} // DomicilioTableMap
