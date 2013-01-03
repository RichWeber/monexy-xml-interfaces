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
		// Приостанавливаем выполнения запроса
		// для тестирования построения XML-пакета
		die();
		
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
	public  function tagOperation($data)
	{
		
		$result = "";
		if (is_array($data)) {
			foreach($data as $k => $v) {
				$value = is_array($v) ? "\n".$this->tagOperation($v) : $v;
				$result .= "<$k>$value</$k>\n";
			}
		}
		
		return $result;
		
	}
	
	/*
	 * 
	 */
	public function xmlBody($queryType, $addAuth=false, $xml)
	{
		$body = '<monexyApi type="' . $queryType . '" mtime="' .$this->MkTime() . '">';
		$body = $body . '<Auth>';
		$body = $body . '<ApiName>' . $this->ApiName . '</ApiName>';
		$body = $body . '<ApiHash>' . $this->ApiHash . '</ApiHash>';
		if ($addAuth) $body = $body . $this->tagOperation($addAuth);
		$body = $body . '</Auth>';
		$body = $body . $xml;
		$body = $body . '</monexyApi>';
		
		//$body = urlencode($body);
		$body = $this->URL . $body;
		
		return $body;
	}
	
	/*
	 * 
	 */
	/*public function defaultAuth()
	{
		$data["Auth"] = array(
				"ApiName" => $this->ApiName,
				"ApiHash" => $this->ApiHash,
		);
		
		return $data;
	}*/
	
	/*
	 * Запрос перевода с кошелька пользователя 
	 * на корпоративный кошелек
	 * payment-req
	 * 
	 */
	public function paymentReq()
	{
		$queryType = 'payment-req';
		
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
	 * @param $orderId
	 * @param $orderDesc 	
	 * @param $payeePhone
	 * @param $amount
	 * @param $amountType
	 * @param $payeeCurrency
	 * @param $verifyOId
	 * @param $status
	 * @return
	 */
	public function transferApi($orderId, $orderDesc, $payeePhone,
								$amount, $amountType, $payeeCurrency, 
								$verifyOId, $status)
	{
		$queryType = 'transfer-api';
		
		
		$data["Transfer"] = array(
				"OrderId" => $orderId,
				"OrderDesc" => $orderDesc,
				"PayeePhone" => $payeePhone,
				"Amount" => $amount,
				"AmountType" => $amountType,
				"PayeeCurrency" => $payeeCurrency,
				"VerifyOId" => $verifyOId,
				"Status" => $status,
		);
		
		$xml = $this->tagOperation($data);
		$xml = $this->xmlBody($queryType, false, $xml);
		
		return $xml;
	}
	
	/*
	 * Запрос статуса перевода по OrderID
	 * @param $orderId
	 * @return
	 */
	public function statusApi($orderId)
	{
		$queryType = 'status-api';
		
		$data["Status"] = array(
				"OrderId" => $orderId,
		);
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
	 * @param $desc
	 * @param $orderId
	 * @param $amount
	 * @param $vaucherType
	 * @param $status
	 * @return
	 */
	public function vaucherApi($desc, $orderId, $amount, 
							   $vaucherType, $status)
	{
		$queryType = 'vaucher-api';
		
		$data["Transfer"] = array(
				"Desc" => $desc,
				"OrderId" => $orderId,
				"Amount" => $amount,
				"VaucherType" => $vaucherType,
				"Status" => $status,
		);
	}
	
	/*
	 * Перевод с Ваучера MoneXy на кошелек пользователя
	 * @param $orderId
	 * @param $payeeCurrency
	 * @param $payerCurrency
	 * @param $payeePhone
	 * @param $amount
	 * @param $amountType
	 * @param $orderDesc
	 * @param $payerCard
	 * @param $payerPass
	 * @param $status
	 * @return
	 */
	public function transfer($orderId, $payeeCurrency, $payerCurrency,
							 $payeePhone, $amount, $amountType,
							 $orderDesc, $payerCard, $payerPass,
							 $status)
	{
		$queryType = 'transfer';
		
		$data["Transfer"] = array(
				"OrderId" => $orderId,
				"PayeeCurrency" => $payeeCurrency,
				"PayerCurrency" => $payerCurrency,
				"PayeePhone" => $payeePhone,
				"Amount" => $amount,
				"AmountType" => $amountType,
				"OrderDesc" => $orderDesc,
				"PayerCard" => $payerCard,
				"PayerPass" => $payerPass,
				"Status" => $status,
		);
	}
	
	/*
	 * Перевод с Ваучера MoneXy на корпоративный кошелек
	 * @param $orderId
	 * @param $orderDesc
	 * @param $payeeCard
	 * @param $payerCard
	 * @param $payerPass
	 * @param $amount
	 * @param $amountType
	 * @param $payeeCurrency
	 * @param $status
	 * @return
	 */
	public function transferCorp($orderId, $orderDesc, $payeeCard,
								 $payerCard, $payerPass, $amount,
								 $amountType, $payeeCurrency,$status)
	{
		$queryType = 'transfer';
		
		$data["Transfer"] = array(
				"OrderId" => $orderId,
				"OrderDesc" => $orderDesc,
				"PayeeCard" => $payeeCard,
				"PayerCard" => $payerCard,
				"PayerPass" => $payerPass,
				"Amount" => $amount,
				"AmountType" => $amountType,
				"PayeeCurrency" => $payeeCurrency,
				"Status" => $status,
		);
	}
	
	/*
	 * Проверка баланса ваучера MoneXy
	 * @param $cardNumber
	 * @param $cardPass
	 * @return
	 */
	public function balansCard($cardNumber, $cardPass)
	{
		$queryType = 'balans-card';
		
		$data["Balans"] = array(
				"CardNumber" => $cardNumber,
				"CardPass" => $cardPass,
		);
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
	 * @param $transId
	 * @param $addDesc
	 * @param $maxTime
	 * @param $status
	 * @return
	 */
	public function transferApiReturn($transId, $addDesc,
									  $maxTime, $status)
	{
		$queryType = 'transfer-api-return';
		
		$data["Transfer"] = array(
				"TransId" => $transId,
				"AddDesc" => $addDesc,
				"MaxTime" => $maxTime,
				"Status" => $status,
		);
	}

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/*
	 * Проверка login на регулярном выражении
	 * Checking login on a regular expression
	 * @param $login
	 * @return true/false
	 */
	public function checkRegularLogin($login) 
	{
		if (!preg_match("/^[0-9]{12,12}$/", $login)) return false;
		else return true;
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
	 * Method with the function of micro-time
	 */
	public function getMicroTime()
	{
		list($usec, $sec) = explode(" ", substr(microtime(), 2));
		return substr($sec.$usec, 0, 15);
	}
	
}