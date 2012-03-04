<?php

class DB
{
	private static $_instance;
	private static $_db;
	private static $_lastStmt;

	private static $server;
	/**
	 * genericDB config array
	 * @param $config
	 *
	 */
	private function __construct()
	{
		global $config;
		self::$server = 'mysql:host='.$config['HOST'].';dbname='.$config['DB'];
	}

	public function __destruct() {
		self::closeConnection();
	}

	/**
     * Close DB connection
     */
	public function closeConnection()
	{
		if(isset(self::$_db))
		{
			try
			{
				self::$_db = null;
			}
			catch (Exception $e)
			{
				//TODO: need to log this
				throw $e;
			}
		}
	}

	/**
     * Get instance of DB
     *
     * @return Farehelper_Resources_DB
     */
	public static function getInstance()
	{
		global $config;
		if(!isset(self::$_instance))
		{
			self::$_instance = new DB();
			self::$_db = new PDO(self::$server, $config['USER'], $config['PASS']);
		}

		return self::$_instance;
	}

	/**
     * Query function
     * @param $query string mysql query string
     * @param $params array associative array of values
     *
     * @return Zend_Db_Adapter_Statement?
     */
	public function query($query, $params=array())
	{
		try
		{
			$stmt = self::$_db->prepare($query ,array(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true));
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e)
		{
			throw new Exception("Database connection error: ".$e->getMessage());
		}
		// Strip extra quotes added by magic quotes option
		if(get_magic_quotes_gpc())
		{
			foreach($params as $k=>$v)
			{
				$params[$k]=stripslashes($v);
			}
		}

		if(!$stmt->execute($params))
			throw new Exception(print_r($stmt->errorInfo(),true)."<br>".$query);
		self::$_lastStmt = $stmt;

		return $stmt;

	}




	public static function clean($data="")
	{
		return addslashes($data);
	}

	public function rowCount()
	{

		if(isset(self::$_db))
		{
			//Added the cast because it was being returned as a string
			return self::$_lastStmt->rowCount();
		}
		else
		{
			throw new Exception("DB instance not set");
		}
	}

	public function lastInsertID()
	{
		if(isset(self::$_db))
		{
			//Added the cast because it was being returned as a string
			return (int)self::$_db->lastInsertId();
		}
		else
		{
			throw new Exception("DB instance not set");
		}
	}

	public function beginTransaction()
	{
		return self::$_db->beginTransaction();
	}


	public function rollbackTransaction()
	{
		return self::$_db->rollBack();
	}


	public function commitTransaction()
	{
		return self::$_db->commit();
	}

}

?>