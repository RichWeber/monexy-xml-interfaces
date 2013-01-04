<?php 
/*
 * Укажите свои данные
 */

$MonexyMerchantID = '1000000000'; # Идентификатор мерчанта
$MonexyMerchantInfoShopName = 'Name Merchant'; # Описание мерчанта
$MerchantSecretKey = 'password'; # Secret Key

$MonexyMerchantSum = '0.01'; # Сумма платежа
$MonexyMerchantOrderId = 'm007'; # Идентификатор платежа
$MonexyMerchantOrderDesc = 'Опллата товара № 462АК'; # Описание платежа

$MonexyMerchantHash = md5($MonexyMerchantID . ';' 
		. $MonexyMerchantOrderId . ';' 
		. $MonexyMerchantSum . ';' 
		. $MerchantSecretKey);

$MonexyMerchantResultUrl = 'http://mydomen.com/merchant/result.php'; # Result URL
$MonexyMerchantSuccessUrl = 'http://mydomen.com/merchant/success.php'; # Sucess URL
$MonexyMerchantFailUrl = 'http://mydomen.com/merchant/fail.php'; # Fail URL

?>