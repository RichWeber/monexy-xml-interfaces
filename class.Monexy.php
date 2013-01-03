<?php
/*
 * Author RichWeber
 * e-mail rbagatyi@gmail.com
 */

class Monexy {

	public $URL = 'https://www.monexy.com/xml/server.php?req=';
	private $ApiName = 'testapirichweber';
	private $ApiHash = '';
	private $SecretKey = 'z80AhqYIuFP1';
	
	/*
	 * request to server
	 */
	public function _request($xml)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $xml);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	
		$result = curl_exec($ch);
		if(curl_errno($ch) != 0) {
			$result = "";
			$result .= "<errno>".curl_errno($ch)."</errno>\n";
			$result .= "<error>".curl_error($ch)."</error>\n";
		};
		curl_close($ch);

		$result = simplexml_load_string(urldecode($result));
		
		return $result;
	}
	

	
	/*
	 * 
	 */
	public  function operation($data)
	{
		/*
		$result = "";
		if (is_array($data)) {
			foreach($data as $k => $v) {
				$value = is_array($v) ? "\n".$this->operation($v) : $v;
				$result .= "<$k>$value</$k>\n";
			}
		}
		
		return $result;
		*/
	}
	
	/*
	 * 
	 */
	public function _xml($typeAPI)
	{
		$result = '<monexyApi type="' .$typeAPI . '" mtime="' .$this->MkTime() . '">
			<Auth>
				<ApiName>' . $this->ApiName . '</ApiName>
				<ApiHash>' . $this->ApiHash . '</ApiHash>
			</Auth></monexyApi>';
		
		$result = urlencode($result);
		$result = $this->URL . $result;
		
		return $result;
	}
	
	
	
	/*
	 * Запрос перевода с кошелька пользователя 
	 * на корпоративный кошелек
	 * payment-req
	 * 
	 */
	public function paymentReq()
	{
		//
	}
	
	/*
	 * Запрос подтверждения перевода SMS кодом
	 * payment-conf
	 * 
	 */
	public function paymentConf()
	{
		//
	}
	
	/*
	 * Запрос перевода (проверка возможности перевода) с
	 * корпоративного кошелька на кошелек пользователя
	 * transfer-api
	 * 
	 */
	public function transferApi()
	{
		//
	}
	
	/*
	 * Запрос статуса перевода по OrderID
	 * status-api
	 * 
	 */
	public function statusApi()
	{
		//
	}
	
	/*
	 * Запрос на авторизацию
	 * auth
	 * 
	 */
	public function auth()
	{
		//
	}
	
	/*
	 * Запрос аутентификации
	 * login
	 * 
	 */
	public function login()
	{
		//
	}
	
	/*
	 * Запрос получения баланса по пользовательской сессии
	 * Примечание в зависимости от потребностей применяется запрос 
	 * с использованием параметра {ApiSess|ApiBCode}
	 * balans
	 * 
	 */
	public function balans()
	{
		//
	}
	
	/*
	 * Запрос получения баланса по BCode
	 * Запрос получения баланса всех кошельков MoneXy 
	 * без использования SMS
	 * balans-bcode
	 * 
	 */
	public function balansBcode()
	{
		//
	}
	
	/*
	 * Запрос перевода с кошелька на кошелек
	 * payment-req
	 * 
	 */
	public function paymentReq2()
	{
		//
	}
	
	/*
	 * Запрос истории операций
	 * history
	 */
	public function history()
	{
		//
	}
	
	/*
	 * Генерация ваучера MoneXy
	 * vaucher-api
	 */
	public function vaucherApi()
	{
		//
	}
	
	/*
	 * Перевод с Ваучера MoneXy на кошелек пользователя
	 * transfer
	 */
	public function transfer()
	{
		//
	}
	
	/*
	 * Перевод с Ваучера MoneXy на корпоративный кошелек
	 * transfer corp
	 */
	public function transferCorp()
	{
		//
	}
	
	/*
	 * Проверка баланса ваучера MoneXy
	 * balans-card
	 */
	public function balansCard()
	{
		//
	}
	
	/*
	 * Баланс по корпоративному кошельку, который привязан к API
	 * Торговец
	 * balans-card-api-payee
	 */
	public function balansCardApiPayee()
	{
		//
	}
	
	/*
	 * Баланс по корпоративному кошельку, который привязан к API
	 * Распространитель
	 * balans-card-api
	 */
	public function balansCardApi()
	{
		//
	}
	
	/*
	 * Проверка статуса платежа (создания ваучера) по уникальному OrderID
	 * status-api
	 */
	public function statusApi2()
	{
		//
	}
	
	/*
	 * Запрос отмены операции
	 * transfer-api-return
	 */
	public function transferApiReturn()
	{
		//
	}

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/*
	 * Создаем MkTime и ApiHash
	 */
	public function MkTime()
	{
		$MkTime = $this->getMicroTime();
		$this->ApiHash = sha1($this->ApiName . ':' 
				. $this->SecretKey . ':' 
				. $MkTime);		
		return $MkTime;
	}
	
	
	/*
	 * Метод с функцией микровремени
	 */
	public function getMicroTime()
	{
		list($usec, $sec) = explode(" ", substr(microtime(), 2));
		return substr($sec.$usec, 0, 15);
	}
	
}