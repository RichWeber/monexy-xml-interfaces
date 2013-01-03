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

//echo $api->MkTime();
//echo '<br />=============================<br /><br />';

//echo $api->getmicrotimeRW();
//echo '<br />=============================<br /><br />';

//echo  $api->ApiHash;
//echo '<br />=============================<br /><br />';

//echo $api->URL;
//echo '<br />=============================<br /><br />';

$typeAPI = 'balans-card-api-payee';
$data = '';
//echo '<pre><br /><br />';
//print_r($api->_xml($typeAPI, $date));
//echo '</pre>';
//echo '<br />=============================<br /><br />';

$xml = $api->_xml($typeAPI);
$XML = $api->_request($xml);

echo '<pre>';
print_r($XML);
echo '</pre>';


/*echo '<br />=============================<br /><br />';
echo 'RESULT:';
echo '<pre>';
print_r($_POST);
echo '</pre>';
echo '<br />=============================<br /><br />';*/

/*
 * 
 */

?>