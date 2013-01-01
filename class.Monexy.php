<?php
/*
 * Author RichWeber
 * e-mail rbagatyi@gmail.com
 */

class Monexy {
	
	public $ApiName = 'testapirichweber';
	public $URL = 'https://www.monexy.com/xml/server.php?req=';
	public $ApiHash = '';
	private $SecretKey = 'z80AhqYIuFP1';
	
	/*
	 * Создаем MkTime и ApiHash
	 */
	public function MkTime()
	{
		$MkTime = $this->getmicrotime();
		/*
		 * Простой вариант
		 * $MkTime = microtime(true);
		 */
		$this->ApiHash = sha1($this->ApiName . ':' 
				. $this->SecretKey . ':' 
				. $MkTime);
		
		return $MkTime;
	}
	
	/*
	 * Простая функция для реализации поведения из PHP 5
	 */
	public function getmicrotime()
	{
	    list($usec, $sec) = explode(" ", microtime());
	    return ((float)$usec + (float)$sec);
	    /*
	     * Простой вариант 
	     * $MkTime = microtime(true);
	     */
	}
	
	/*
	 * Метод с функцией микровремени с WMXI
	 */
	public function getmicrotimeRW()
	{
		list($usec, $sec) = explode(" ", substr(microtime(), 2));
		return substr($sec.$usec, 0, 15);
	}
	
}