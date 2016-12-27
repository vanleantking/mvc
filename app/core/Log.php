<?php
class Log
{
	private $_logPath;
	public function __construct($path = LOG_PATH)
	{
		$this->_logPath = $path;
	}

	public function writeLog($message, $level = 'error')
	{
		$level = strtoupper($level);

		$now = date('Y-m-d h:m:s');
		$logContent = $now . ' ' . $message . PHP_EOL;

		
		$e = file_put_contents($this->_logPath, $logContent, FILE_APPEND);
		if (FALSE === $e) {
			throw new Exception("Can not write log this time. Please try again!");
		}
		
	}
}
?>