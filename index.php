<?php

/*
 * Подключаем класс
 */
require_once 'class.Monexy.php';
$api = new Monexy();

/*
 * Заголовки
 */
echo '<br />======================<br />';
echo '=== Testing MoneXy API  ===';
echo '<br />======================<br /><br />';


/*
echo 'Запрос перевода (проверка возможности перевода) с <br />';
echo 'корпоративного кошелька на кошелек пользователя <br />';
echo '<strong>transfer-api</strong>';
echo '<br />=============================<br /><br />';

$orderId = 1;
$orderDesc = 'test';
$payeePhone = '380986470007';
$amount = 0.01;
$amountType = 1;
$payeeCurrency ='UAH';
$verifyOId = 1;
$status = 0;

$xml = $api->transferApi($orderId, $orderDesc, $payeePhone, 
		$amount, $amountType, $payeeCurrency, $verifyOId, $status);
echo $xml;
*/


echo 'Запрос перевода с кошелька пользователя <br />';
echo 'на корпоративный кошелек <br />';
echo '<strong>payment-req</strong>';
echo '<br />=============================<br /><br />';

$apiLogin = '380986470007';
$apiSess = 'session';
$orderId = 2;
$orderDesc = 'test2';
$payeeCard = '380986470007';
$payeeCurrency ='UAH';
$payerCurrency = 'UAH';
$amount = 0.01;
$amountType = 1;
$status = 0;

$xml = $api->paymentReq($apiLogin, $apiSess, $orderId,
		$orderDesc, $payeeCard, $payeeCurrency,
		$payerCurrency, $amount, $amountType, $status);
echo $xml;

?>