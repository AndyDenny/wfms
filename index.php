<?php
error_reporting(-1);

//echo  date(''); //  вывод даты

// Узнать часовой пояс сервера
//echo date_default_timezone_get(); // Europe/Moskow
//date_default_timezone_set('Europe/Paris'); // Устанавливает чаосвой пояс сервера
//echo time(); // 1726229425
//echo date("Y/m/d", time() + 60 * 60 * 24 ); // Плюс сутки, с текущего момента
//phpinfo(); // Список текущих настроек пыхи

//var_dump(getdate()); //["seconds"]=> int(27) ["minutes"]=> int(18) ["hours"]=> int(15) ["mday"]=> int(13) ["wday"]=> int(5) ["mon"]=> int(9) ["year"]=> int(2024) ["yday"]=> int(256) ["weekday"]=> string(6) "Friday" ["month"]=> string(9) "September" [0]=> int(1726229907)
//echo strtotime('now'); // 1726229990
//echo date("Y/m/d", strtotime('+ 1 day'));

//$t = mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y') + 1 ); 
//echo date('H:i:s Y', $t); //15:40:32 2025
