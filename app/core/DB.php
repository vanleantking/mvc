<?php
/**
* 
*/
class DB
{
	private $_conn;
	private $_log;

	public function __construct()
	{
		$this->_log = new Log();
	}
	
	public function getConn()
	{
		return $this->_conn;
	}

	public function connect()
	{
		try
		{
			$this->_conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DBNAME);
			$this->_log->writeLog('Connect database Successful!');
		} catch(Exception $e) {
			$this->_log->writeLog('Failed to connect to MySQL: ' . mysqli_connect_error());
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}		
	}


	public function disconnect()
	{
		if (!is_null($this->getConn())) {
			mysqli_close($this->getConn());

		} else {
			$this->_log->writeLog('Not connect exist');
			throw new Exception('Not connect exist');
		}
	}
}
?>