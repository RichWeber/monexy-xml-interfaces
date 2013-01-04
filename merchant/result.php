<?php 
/*
 * Проверка информации о платеже
 * 
 * 1. Проверить, действительно ли данные переданы от сервиса MoneXy Merchant Interface 
 * 2. Проверить, не исказились ли данные в процессе передачи
 * 3. Проверить сумму платежа
 * 4. Проверить идентификатор получателя (MonexyMerchantID)
 * 5. Проверить статус проведения платежа (trans_id)  
 * 
 */

$MonexyMerchantID = '1000000000';
$MerchantSecretKey = 'password';

/*
 * По идентификатору платежа S_POST['MonexyMerchantOrderId']
 * получаем все детали платежа для прохождения
 * всех проверок (к примеру с БД)
 */
$MonexyMerchantSum = '0.01';
$MonexyMerchantOrderId = 'm007';
$MonexyMerchantOrderDesc = 'Опллата товара № 462АК';

$MonexyMerchantHash = md5($MonexyMerchantID . ';'
		. $MonexyMerchantOrderId . ';'
		. $MonexyMerchantSum . ';'
		. $MerchantSecretKey);

$sign_hash = md5(
		$_POST[trans_id] . ';' .
		$_POST[MonexyMerchantOrderId] . ';' .
		$_POST[MonexyMerchantID] . ';' .
		$_POST[trans_ex_sum] . ';' .
		$_POST[trans_ex_currency] . ';' .
		$_POST[trans_date] . ';' .
		$MerchantSecretKey);

// Проверка идентификатора мерчанта
if (isset($_POST['MonexyMerchantID']) && $_POST['MonexyMerchantID'] == $MonexyMerchantID) {
	// Проверка суммы платежа
	if ($_POST['MonexyMerchantSum'] == $MonexyMerchantSum) {
		// Проверка статуса проведения платежа
		if (!empty($_POST['trans_id']) && $_POST['trans_id'] > 0) {
			// Проверка действительно ли данные переданы от сервиса MoneXy Merchant Interface
			if ($_POST['MonexyMerchantHash'] == $MonexyMerchantHash) {
				// Проверка не исказились ли данные в процессе передачи
				if($_POST['ServerHASH'] === $sign_hash) {
					/*
					 * Проверки успешно пройденны
					 * Выполняем действия связанные с оплатой
					 * Отгружаем товар и сохраняем данные платежа в БД
					 */
					$success = 'Проверки успешно пройденны. MonexyMerchantOrderId = ' . $MonexyMerchantOrderId;
					sendError($success);					
				} else {
					$error = 'Проверка контрольной подписи данных о платеже провалена!';
					sendError($error);
				}
			} else {
				$error = 'Данные переданы НЕ от сервиса MoneXy Merchant Interface.';
				sendError($error);
			}
		} else {
			$error = 'Проверка статуса проведения платежа не пройдена.';
			sendError($error);
		}
	} else {
		$error = 'Проверка суммы платежа не пройдена.';
		sendError($error);
	}
} else {
	$error = 'Проверка идентификатора мерчанта не пройдена.';
	sendError($error);
}

// Обработка ошибок при прохождении проверок
function sendError($error) {
	$Name = "Monexy Merchant Error";
	$email = "mail@mydomen.com";
	$recipient = "admin@mydomen.com";
	$mail_body = $error;
	$subject = "Monexy Merchant Error";
	$header = "From: ". $Name . " <" . $email . ">\r\n";
	
	mail($recipient, $subject, $mail_body, $header);
}

?>