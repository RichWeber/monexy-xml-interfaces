<?php
/*
 * Author RichWeber
 * e-mail rbagatyi@gmail.com
 */

class Monexy {
	
	public $ApiName = 'testapirichweber';
	public $URL = 'https://www.monexy.com/xml/server.php?req=';
	private $SecretKey = 'z80AhqYIuFP1';
	
	/*
	 * Создаем MkTime и ApiHash
	 */
	private function MkTime()
	{
		$MkTime = $this->getmicrotime();
		$this->ApiHash = sha1($this->ApiName . ':' 
				. $this->SecretKey . ':' 
				. $MkTime);
		return $MkTime;
	}
}