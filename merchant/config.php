<?php 
/*
 * Укажите свои данные
 */

$MonexyMerchantID = '103218177'; # Идентификатор мерчанта
//$MonexyMerchantID = '103251857'; # Идентификатор мерчанта RichWeber Emitent
$MonexyMerchantInfoShopName = 'RichWeber'; # Описание мерчанта
//$MonexyMerchantInfoShopName = 'RichWeber Emitent'; # Описание мерчанта
$MerchantSecretKey = 'Kqc7nQYJcvjz'; # Secret Key

$MonexyMerchantSum = '0.01'; # Сумма платежа
$MonexyMerchantOrderId = 'm007'; # Идентификатор платежа
$MonexyMerchantOrderDesc = 'Опллата товара № 462АК'; # Описание платежа

$MonexyMerchantHash = md5($MonexyMerchantID . ';' 
		. $MonexyMerchantOrderId . ';' 
		. $MonexyMerchantSum . ';' 
		. $MerchantSecretKey);

$MonexyMerchantResultUrl = 'http://monexy.richweber.net/merchant/result.php'; # Result URL
$MonexyMerchantSuccessUrl = 'http://monexy.richweber.net/merchant/success.php'; # Sucess URL
$MonexyMerchantFailUrl = 'http://monexy.richweber.net/merchant/fail.php'; # Fail URL

?>