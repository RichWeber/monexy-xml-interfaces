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

/*
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

$xml = $api->paymentReqCorp($apiLogin, $apiSess, $orderId,
		$orderDesc, $payeeCard, $payeeCurrency,
		$payerCurrency, $amount, $amountType, $status);
echo $xml;
*/

/*
echo 'Запрос подтверждения перевода SMS кодом <br />';
echo '<strong>payment-conf</strong>';
echo '<br />=============================<br /><br />';

$apiLogin = '380986470007';
$apiSess = 'session';
$paymentId = 3;
$paymentSms = '1234';

$xml = $api->paymentConf($apiLogin, $apiSess, $paymentId, $paymentSms);
echo $xml;
*/

/*
echo 'Запрос статуса перевода по OrderID <br />';
echo '<strong>status-api</strong>';
echo '<br />=============================<br /><br />';

$orderId = 4;

$xml = $api->statusApi($orderId);
echo $xml;
*/

/*
echo 'Запрос на авторизацию <br />';
echo '<strong>auth</strong>';
echo '<br />=============================<br /><br />';

$apiLogin = '380986470007';

$xml = $api->auth($apiLogin);
echo $xml;
*/

/*
echo 'Запрос аутентификации <br />';
echo '<strong>login</strong>';
echo '<br />=============================<br /><br />';

$apiLogin = '380986470007';
$smsCode = 3254;

$xml = $api->login($apiLogin, $smsCode);
echo $xml;
*/

/*
echo 'Запрос получения баланса по пользовательской сессии <br />';
echo '<strong>balans</strong>';
echo '<br />=============================<br /><br />';

$apiLogin = '380986470007';
$apiSess = 'session';

$xml = $api->balans($apiLogin, $apiSess);
echo $xml;
*/

/*
echo 'Запрос получения баланса по BCode <br />';
echo '<strong>balans-bcode</strong>';
echo '<br />=============================<br /><br />';

$apiLogin = '380986470007';
$apiBCode = '123456789';

$xml = $api->balansBcode($apiLogin, $apiBCode);
echo $xml;
*/

/*
echo 'Запрос перевода с кошелька пользователя <br />';
echo '<strong>payment-req</strong>';
echo '<br />=============================<br /><br />';

$apiLogin = '380986470007';
$apiSess = 'session';
$orderId = 5;
$orderDesc = 'test5';
$payeeLogin = '380986470007';
$payeeCurrency ='UAH';
$payerCurrency = 'UAH';
$amount = 0.01;
$amountType = 1;
$status = 0;

$xml = $api->paymentReq($apiLogin, $apiSess, $orderId,
		$orderDesc, $payeeLogin, $payeeCurrency,
		$payerCurrency, $amount, $amountType, $status);
echo $xml;
*/

/*
echo 'Запрос истории операций <br />';
echo '<strong>history</strong>';
echo '<br />=============================<br /><br />';

$apiLogin = '380986470007';
$apiSess = 'session';
$dateFrom = '20130101 000000';
$dateTo = '20130103 235959';
$page = 1;
$listing = 2;
$currency = 'UAH';

$xml = $api->history($apiLogin, $apiSess, $dateFrom,
		$dateTo, $page, $listing, $currency);
echo $xml;
*/

/*
echo 'Генерация ваучера MoneXy <br />';
echo '<strong>vaucher-api</strong>';
echo '<br />=============================<br /><br />';

$desc = 'Vaucher 0.10';
$orderId = 6;
$amount = 0.05;
$vaucherType = 1;
$status = 1;

$xml = $api->vaucherApi($desc, $orderId, $amount, $vaucherType, $status);
echo $xml;
*/


echo 'Перевод с Ваучера MoneXy на кошелек пользователя <br />';
echo '<strong>transfer</strong>';
echo '<br />=============================<br /><br />';

$orderId = 7;
$payeeCurrency = 'UAH';
$payerCurrency = 'UAH';
$payeePhone = '380986470007';
$amount = 0.01;
$amountType = 1;
$orderDesc = 'Пополнение 1 USD на телефон 380971234567';
$payerCard = '436220214474499';
$payerPass = 1234;
$status = 1;

$xml = $api->transfer($orderId, $payeeCurrency, $payerCurrency,
		$payeePhone, $amount, $amountType, $orderDesc, 
		$payerCard, $payerPass, $status);
echo $xml;

?>