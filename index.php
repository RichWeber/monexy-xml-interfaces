<?php

/*
 * Подключаем класс
 */
require_once 'class.Monexy.php';
$api = new Monexy();

echo '<br />======================<br />';
echo '=== Testing MoneXy API  ===';
echo '<br />======================<br /><br />';


/*
echo 'Запрос перевода (проверка возможности перевода) с <br />';
echo 'корпоративного кошелька на кошелек пользователя <br />';
echo '<strong>transfer-api</strong>';
echo '<br />=============================<br /><br />';

$orderId = 11;
$orderDesc = 'Чайник No sl-6785';
$payeePhone = '380986470007';
$amount = 0.08;
$amountType = 1;
$payeeCurrency ='UAH';
$verifyOId = 1;
$status = 0;

$xml = $api->transferApi($orderId, $orderDesc, $payeePhone, 
		$amount, $amountType, $payeeCurrency, $verifyOId, $status);
echo '<pre>';
print_r($xml);
echo '</pre>';
*/

/*
echo 'Запрос перевода с кошелька пользователя <br />';
echo 'на корпоративный кошелек <br />';
echo '<strong>payment-req</strong>';
echo '<br />=============================<br /><br />';

$apiLogin = '+380986470007'; // + и 12 цифр
$apiSess = '695c5840f1eb42b1019ffa423d86d578';
$orderId = 12;
$orderDesc = 'test2 pay to corp';
$payeeCard = '380986470007';
$payeeCurrency ='UAH';
$payerCurrency = 'UAH';
$amount = 1.01;
$amountType = 1;
$status = 0;

$xml = $api->paymentReqCorp($apiLogin, $apiSess, $orderId,
		$orderDesc, $payeeCard, $payeeCurrency,
		$payerCurrency, $amount, $amountType, $status);
echo '<pre>';
print_r($xml);
echo '</pre>';
*/

/*
echo 'Запрос подтверждения перевода SMS кодом <br />';
echo '<strong>payment-conf</strong>';
echo '<br />=============================<br /><br />';

$apiLogin = '+380959360451'; // + и 12 цифр
$apiSess = '658276515cd7bf4612ac7597594b5db8';
$paymentId = '71292';
$paymentSms = '14621';

$xml = $api->paymentConf($apiLogin, $apiSess, $paymentId, $paymentSms);
echo '<pre>';
print_r($xml);
echo '</pre>';
*/

/*
echo 'Запрос статуса перевода по OrderID <br />';
echo '<strong>status-api</strong>';
echo '<br />=============================<br /><br />';

$orderId = '1006903594';

$xml = $api->statusApi($orderId);
echo '<pre>';
print_r($xml);
echo '</pre>';
*/

/*
echo 'Запрос на авторизацию <br />';
echo '<strong>auth</strong>';
echo '<br />=============================<br /><br />';

$apiLogin = '+380959360451'; // + и 12 цифр

$xml = $api->auth($apiLogin);
echo '<pre>';
print_r($xml);
echo '</pre>';
*/

/*
echo 'Запрос аутентификации <br />';
echo '<strong>login</strong>';
echo '<br />=============================<br /><br />';

$apiLogin = '+380959360451'; // + и 12 цифр
$smsCode = 29648;

$xml = $api->login($apiLogin, $smsCode);
echo '<pre>';
print_r($xml);
echo '</pre>';
*/

/*
echo 'Запрос получения баланса по пользовательской сессии <br />';
echo '<strong>balans</strong>';
echo '<br />=============================<br /><br />';

$apiLogin = '+380959360451'; // + и 12 цифр
$apiSess = '658276515cd7bf4612ac7597594b5db8';

$xml = $api->balans($apiLogin, $apiSess);
echo '<pre>';
print_r($xml);
echo '</pre>';
*/

/*
echo 'Запрос получения баланса по BCode <br />';
echo '<strong>balans-bcode</strong>';
echo '<br />=============================<br /><br />';

$apiLogin = '380986470007';
$apiBCode = '123456789';

$xml = $api->balansBcode($apiLogin, $apiBCode);
echo '<pre>';
print_r($xml);
echo '</pre>';
*/

/*
echo 'Запрос перевода с кошелька пользователя <br />';
echo '<strong>payment-req</strong>';
echo '<br />=============================<br /><br />';

$apiLogin = '+380959360451'; // + и 12 цифр
$apiSess = '658276515cd7bf4612ac7597594b5db8';
$orderId = 13;
$orderDesc = 'test5 transfer p2p';
$payeeLogin = '380986470007';
$payeeCurrency ='UAH';
$payerCurrency = 'UAH';
$amount = 0.49;
$amountType = 1;
$status = 1;

$xml = $api->paymentReq($apiLogin, $apiSess, $orderId,
		$orderDesc, $payeeLogin, $payeeCurrency,
		$payerCurrency, $amount, $amountType, $status);
echo '<pre>';
print_r($xml);
echo '</pre>';
*/

/*
echo 'Запрос истории операций <br />';
echo '<strong>history</strong>';
echo '<br />=============================<br /><br />';

$apiLogin = '+380959360451'; // + и 12 цифр
$apiSess = '658276515cd7bf4612ac7597594b5db8';
$dateFrom = '20130101 000000'; // История операций начиная с даты
$dateTo = '20130104 235959'; // История операций заканчивая датой
$page = 1; // Номер страницы
$listing = 10; // Кол-во на страницу
$currency = 'UAH'; // История операций по счету указанной валюты

$xml = $api->history($apiLogin, $apiSess, $dateFrom,
		$dateTo, $page, $listing, $currency);
echo '<pre>';
print_r($xml);
echo '</pre>';
*/

/*
echo 'Генерация ваучера MoneXy <br />';
echo '<strong>vaucher-api</strong>';
echo '<br />=============================<br /><br />';

$desc = 'Richweber Vaucher 1 UAH';
$orderId = 14;
$amount = 1; // Минимум 1 гривна
$vaucherType = 1;
$status = 1;

$xml = $api->vaucherApi($desc, $orderId, $amount, $vaucherType, $status);
echo '<pre>';
print_r($xml);
echo '</pre>';
*/

/*
echo 'Перевод с Ваучера MoneXy на кошелек пользователя <br />';
echo '<strong>transfer</strong>';
echo '<br />=============================<br /><br />';

$orderId = 9;
$payeeCurrency = 'UAH';
$payerCurrency = 'UAH';
$payeePhone = '380986470007'; # Телефон получателя
$amount = 1;
$amountType = 1;
$orderDesc = 'Пополнение 1 USD на телефон 380986470007';
$payerCard = '916524578064451';
$payerPass = 3436;
$status = 1; # 0 - проверка перевода / 1 - отправление

$xml = $api->transfer($orderId, $payeeCurrency, $payerCurrency,
		$payeePhone, $amount, $amountType, $orderDesc, 
		$payerCard, $payerPass, $status);
echo '<pre>';
print_r($xml);
echo '</pre>';
*/

/*
echo 'Перевод с Ваучера MoneXy на корпоративный кошелек <br />';
echo '<strong>transfer</strong>';
echo '<br />=============================<br /><br />';

$orderId = 8;
$orderDesc = 'Чайник No sl-6785';
$payeeCard = '+380986470007'; # номер кошелька на который переводят
$payerCard = '916524578064451'; # номер ваучера
$payerPass = 3436;
$amount = 1;
$amountType = 1;
$payeeCurrency = 'UAH';
$status = 0;

$xml = $api->transferCorp($orderId, $orderDesc, $payeeCard,
		$payerCard, $payerPass, $amount, $amountType, $payeeCurrency,$status);
echo '<pre>';
print_r($xml);
echo '</pre>';
*/

/*
echo 'Проверка баланса ваучера MoneXy <br />';
echo '<strong>balans-card</strong>';
echo '<br />=============================<br /><br />';

$cardNumber = '916524578064451';
$cardPass = 3436;

$xml = $api->balansCard($cardNumber, $cardPass);
echo '<pre>';
print_r($xml);
echo '</pre>';
*/

/*
echo 'Баланс по корпоративному кошельку <strong>Торговец</strong> <br />';
echo '<strong>balans-card-api-payee</strong>';
echo '<br />=============================<br /><br />';

$xml = $api->balansCardApiPayee();
echo '<pre>';
print_r($xml);
echo '</pre>';

//echo '<br />=============================<br /><br />';

//echo 'Баланс по корпоративному кошельку <strong>Распространитель</strong> <br />';
//echo '<strong>balans-card-api</strong>';
//echo '<br />=============================<br /><br />';

//$xml = $api->balansCardApi();
//echo '<pre>';
//print_r($xml);
//echo '</pre>';
*/

/*
echo 'Запрос отмены операции <br />';
echo '<strong>transfer-api-return</strong>';
echo '<br />=============================<br /><br />';

$transId = 9;
$addDesc = 'Описание причины отмены';
$maxTime = 15;
$status = 0;

$xml = $api->transferApiReturn($transId, $addDesc, $maxTime, $status);
echo '<pre>';
print_r($xml);
echo '</pre>';
*/

?>