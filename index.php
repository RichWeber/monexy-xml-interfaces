<?php
/*
 * Подключаем класс
 */
require_once 'class.Monexy.php';
$api = new Monexy();
/*
 * Заголовки
 */
echo '<br />===================================<br />';
echo '=== Testing MoneXy API (' . $api->ApiName . ') ===';
echo '<br />===================================<br /><br />';

echo $api->MkTime();
echo '<br />=============================<br /><br />';

echo $api->getmicrotimeRW();
echo '<br />=============================<br /><br />';

echo  $api->ApiHash;
echo '<br />=============================<br /><br />';

echo $api->URL;
echo '<br />=============================<br /><br />';


?>
