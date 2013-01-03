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


echo 'Запрос получения баланса по BCode <br />';
echo '<strong>balans-bcode</strong>';
echo '<br />=============================<br /><br />';

$apiLogin = '380986470007';
$apiBCode = '123456789';

$xml = $api->balansBcode($apiLogin, $apiBCode);
echo $xml;


?>