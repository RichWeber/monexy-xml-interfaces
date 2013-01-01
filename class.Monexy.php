<?php
/*
 * Author RichWeber
 * e-mail rbagatyi@gmail.com
 */

class Monexy {
	
	var $encoding = "UTF-8";
	public $ApiName = 'testapirichweber';
	public $URL = 'https://www.monexy.com/xml/server.php';
	public $ApiHash = '';
	private $SecretKey = 'z80AhqYIuFP1';
	
	/*
	 * 
	 */
	# request to server
	function _request($xml) {
		echo '<br />_request<br />';
		$ch = curl_init($this->URL);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
		//curl_setopt($ch, CURLOPT_INTERFACE, "87.118.97.138");
	
		$result = curl_exec($ch);
		if(curl_errno($ch) != 0) {
			$result = "";
			$result .= "<errno>".curl_errno($ch)."</errno>\n";
			$result .= "<error>".curl_error($ch)."</error>\n";
		};
		curl_close($ch);
		
		echo $result;
		return $result;
	}
	
	/*
	 * 
	 */
	# change string encoding
	function _change_encoding($text, $encoding, $entities = false) {
		$text = $entities ? htmlspecialchars($text, ENT_QUOTES) : $text;
		return mb_convert_encoding($text, $encoding, $this->encoding);
	}
	
	/*
	 * 
	 */
	public  function operation($data)
	{
		//
		$result = "";
		
		foreach($data as $k => $v) {
			$value = is_array($v) ? "\n".$this->operation($v) : $this->_change_encoding($v, "HTML-ENTITIES", true);
			$result .= "<$k>$value</$k>\n";
		}
		
		return $result;
	}
	
	/*
	 * 
	 */
	public function _xml($typeAPI, $date)
	{
		$result = '<monexyApi type="' .$typeAPI . '" mtime="' .$this->MkTime() . '">
			<Auth>
				<ApiName>' . $this->ApiName . '</ApiName>
				<ApiHash>' . $this->ApiHash . '</ApiHash>
			</Auth>'
			. $this->operation($data) .
		'</monexyApi>';
		
		return $result;
	} 
	
	
	/*
	 * Создаем MkTime и ApiHash
	 */
	public function MkTime()
	{
		$MkTime = $this->getmicrotimeRW();
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