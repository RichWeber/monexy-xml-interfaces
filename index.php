<?php
/*
 * Подключаем класс
 */
require_once 'class.Monexy.php';
$api = new Monexy();
/*
 * Заголовки
 */
echo 'Testing MoneXy API (' . $api->ApiName . ')';
echo '<br />=============================<br /><br />';

echo $api->MkTime();
echo '<br />=============================<br /><br />';
$MkTime = microtime(true);
echo  $MkTime;
echo '<br />=============================<br /><br />';

echo $api->URL;
echo '<br />=============================<br /><br />';


?>
