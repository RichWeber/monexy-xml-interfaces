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
		// die();
		
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
		
		$body = urlencode($body);
		$body = $this->URL . $body;
		
		return $body;
	}

	
	/*
	 * Запрос перевода с кошелька пользователя 
	 * на корпоративный кошелек
	 * @param $apiLogin
	 * @param $apiSess
	 * @param $orderId
	 * @param $orderDesc
	 * @param $payeeCard
	 * @param $payeeCurrency
	 * @param $payerCurrency
	 * @param $amount
	 * @param $amountType
	 * @param $status
	 * @return SimpleXMLElement
	 */
	public function paymentReqCorp($apiLogin, $apiSess, $orderId,
							   $orderDesc, $payeeCard, $payeeCurrency,
							   $payerCurrency, $amount, $amountType,
							   $status)
	{
		$queryType = 'payment-req';
		
		$addAuth = array(
				"ApiLogin" => $apiLogin,
				"ApiSess" => $apiSess,
		);
		$data["Payment"] = array(
				"OrderId" => $orderId,
				"OrderDesc" => $orderDesc,
				"PayeeCard" => $payeeCard,
				"PayeeCurrency" => $payeeCurrency,
				"PayerCurrency" => $payerCurrency,
				"Amount" => $amount,
				"AmountType" => $amountType,
				"Status" => $status,
		);
		
		$xml = $this->tagOperation($data);
		$xml = $this->xmlBody($queryType, $addAuth, $xml);
		
		return $xml;
	}
	
	/*
	 * Запрос подтверждения перевода SMS кодом
	 * @param $apiLogin
	 * @param $apiSess
	 * @param $paymentId
	 * @param $paymentSms
	 * @return SimpleXMLElement
	 */
	public function paymentConf($apiLogin, $apiSess,
								$paymentId, $paymentSms)
	{
		$queryType = 'payment-conf';
		
		$addAuth = array(
				"ApiLogin" => $apiLogin,
				"ApiSess" => $apiSess,
		);
		$data["Payment"] = array(
				"PaymentId" => $paymentId,
				"PaymentSms" => $paymentSms,
		);
		
		$xml = $this->tagOperation($data);
		$xml = $this->xmlBody($queryType, $addAuth, $xml);
		
		return $xml;
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
	 * @return SimpleXMLElement
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
	 * @return SimpleXMLElement
	 */
	public function statusApi($orderId)
	{
		$queryType = 'status-api';
		
		$data["Status"] = array(
				"OrderId" => $orderId,
		);
		
		$xml = $this->tagOperation($data);
		$xml = $this->xmlBody($queryType, false, $xml);
		
		return $xml;
	}
	
	/*
	 * Запрос на авторизацию
	 * @param $apiLogin
	 * @return SimpleXMLElement
	 */
	public function auth($apiLogin)
	{
		$queryType = 'auth';
		
		$addAuth = array(
				"ApiLogin" => $apiLogin,
				"ApiSess" => '',
		);
		
		$xml = $this->xmlBody($queryType, $addAuth, NULL);
		$xml = $this->_request($xml);
		
		return $xml;
	}
	
	/*
	 * Запрос аутентификации
	 * @param $apiLogin
	 * @param $smsCode
	 * @return SimpleXMLElement
	 */
	public function login($apiLogin, $smsCode)
	{
		$queryType = 'login';
		
		$addAuth = array(
				"ApiLogin" => $apiLogin,
		);
		$data["Login"] = array(
				"SmsCode" => $smsCode,
		);
		
		$xml = $this->tagOperation($data);
		$xml = $this->xmlBody($queryType, $addAuth, $xml);
		$xml = $this->_request($xml);
		
		return $xml;
	}
	
	/*
	 * Запрос получения баланса по пользовательской сессии
	 * Примечание в зависимости от потребностей применяется запрос 
	 * с использованием параметра {ApiSess|ApiBCode}
	 * @param $apiLogin
	 * @param $apiSess
	 * @return SimpleXMLElement
	 */
	public function balans($apiLogin, $apiSess)
	{
		$queryType = 'balans';
		
		$addAuth = array(
				"ApiLogin" => $apiLogin,
				"ApiSess" => $apiSess,
		);
		
		$xml = $this->xmlBody($queryType, $addAuth, NULL);
		$xml = $this->_request($xml);
		
		return $xml;
	}
	
	/*
	 * Запрос получения баланса по BCode
	 * Запрос получения баланса всех кошельков MoneXy 
	 * без использования SMS
	 * @param $apiLogin
	 * @param $apiBCode
	 * @return SimpleXMLElement
	 */
	public function balansBcode($apiLogin, $apiBCode)
	{
		$queryType = 'balans-bcode';
		
		$addAuth = array(
				"ApiLogin" => $apiLogin,
				"ApiBCode" => $apiBCode,
		);
		
		$xml = $this->xmlBody($queryType, $addAuth, NULL);
		
		return $xml;
	}
	
	/*
	 * Запрос перевода с кошелька на кошелек
	 * @param $apiLogin
	 * @param $apiSess
	 * @param $orderId
	 * @param $orderDesc
	 * @param $payeeLogin
	 * @param $payeeCurrency
	 * @param $payerCurrency
	 * @param $amount
	 * @param $amountType
	 * @param $status
	 * @return SimpleXMLElement
	 */
	public function paymentReq($apiLogin, $apiSess, $orderId,
							   $orderDesc, $payeeLogin, $payeeCurrency,
							   $payerCurrency, $amount, $amountType,
							   $status)
	{
		$queryType = 'payment-req';
		
		$addAuth = array(
				"ApiLogin" => $apiLogin,
				"ApiSess" => $apiSess,
		);
		$data["Payment"] = array(
				"OrderId" => $orderId,
				"OrderDesc" => $orderDesc,				
				"PayeeLogin" => $payeeLogin,
				"PayeeCurrency" => $payeeCurrency,
				"PayerCurrency" => $payerCurrency,
				"Amount" => $amount,
				"AmountType" => $amountType,
				"Status" => $status,
		);
		
		$xml = $this->tagOperation($data);
		$xml = $this->xmlBody($queryType, $addAuth, $xml);
		
		return $xml;
	}
	
	/*
	 * Запрос истории операций
	 * @param $apiLogin
	 * @param $apiSess
	 * @param $dateFrom
	 * @param $dateTo
	 * @param $page
	 * @param $listing
	 * @param $currency
	 * @return SimpleXMLElement
	 */
	public function history($apiLogin, $apiSess, $dateFrom,
							$dateTo, $page, $listing,
							$currency)
	{
		$queryType = 'history';
		
		$addAuth = array(
				"ApiLogin" => $apiLogin,
				"ApiSess" => $apiSess,
		);
		$data["History"] = array(
				"DateFrom" => $dateFrom,
				"DateTo" => $dateTo,				
				"Page" => $page,
				"Listing" => $listing,
				"Currency" => $currency,
		);
		
		$xml = $this->tagOperation($data);
		$xml = $this->xmlBody($queryType, $addAuth, $xml);
		$xml = $this->_request($xml);
		
		return $xml;
	}
	
	/*
	 * Генерация ваучера MoneXy
	 * @param $desc
	 * @param $orderId
	 * @param $amount
	 * @param $vaucherType
	 * @param $status
	 * @return SimpleXMLElement
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
		
		$xml = $this->tagOperation($data);
		$xml = $this->xmlBody($queryType, false, $xml);
		$xml = $this->_request($xml);
		
		return $xml;
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
	 * @return SimpleXMLElement
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
		
		$xml = $this->tagOperation($data);
		$xml = $this->xmlBody($queryType, false, $xml);
		
		return $xml;
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
	 * @return SimpleXMLElement
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
		
		$xml = $this->tagOperation($data);
		$xml = $this->xmlBody($queryType, false, $xml);
		
		return $xml;
	}
	
	/*
	 * Проверка баланса ваучера MoneXy
	 * @param $cardNumber
	 * @param $cardPass
	 * @return SimpleXMLElement
	 */
	public function balansCard($cardNumber, $cardPass)
	{
		$queryType = 'balans-card';
		
		$data["Balans"] = array(
				"CardNumber" => $cardNumber,
				"CardPass" => $cardPass,
		);
		
		$xml = $this->tagOperation($data);
		$xml = $this->xmlBody($queryType, false, $xml);
		
		return $xml;
	}
	
	/*
	 * Баланс по корпоративному кошельку, который привязан к API
	 * Торговец
	 * balans-card-api-payee
	 */
	public function balansCardApiPayee()
	{
		$queryType = 'balans-card-api-payee';
		$xml = $this->xmlBody($queryType, false, NULL);
		$xml = $this->_request($xml);
		
		return $xml;
	}
	
	/*
	 * Баланс по корпоративному кошельку, который привязан к API
	 * Распространитель
	 * balans-card-api
	 * @return SimpleXMLElement
	 */
	public function balansCardApi()
	{
		$queryType = 'balans-card-api';
		$xml = $this->xmlBody($queryType, false, NULL);
		$xml = $this->_request($xml);
		
		return $xml;
	}
	
	/*
	 * Запрос отмены операции
	 * @param $transId
	 * @param $addDesc
	 * @param $maxTime
	 * @param $status
	 * @return SimpleXMLElement
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
		
		$xml = $this->tagOperation($data);
		$xml = $this->xmlBody($queryType, false, $xml);
		
		return $xml;
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