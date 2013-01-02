<?php 
/*
 * Укажите свои данные
 */

$MonexyMerchantID = '103218177'; # Идентификатор мерчанта
$MonexyMerchantInfoShopName = 'RichWeber'; # Описание мерчанта
$MerchantSecretKey = 'Kqc7nQYJcvjz'; # Secret Key

$MonexyMerchantSum = '0.01'; # Сумма платежа
$MonexyMerchantOrderId = 'm004'; # Идентификатор платежа
$MonexyMerchantOrderDesc = 'Опллата товара № 459АК'; # Описание платежа

$MonexyMerchantHash = md5($MonexyMerchantID . ';' 
		. $MonexyMerchantOrderId . ';' 
		. $MonexyMerchantSum . ';' 
		. $MerchantSecretKey);

$MonexyMerchantResultUrl = 'http://monexy.richweber.net/merchant/result.php'; # Result URL
$MonexyMerchantSuccessUrl = 'http://monexy.richweber.net/merchant/success.php'; # Sucess URL
$MonexyMerchantFailUrl = 'http://monexy.richweber.net/merchant/fail.php'; # Fail URL

?>