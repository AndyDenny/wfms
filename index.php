<?php

//setcookie("test", "testvalue", time() + 3600); // кука устанавливается на час
//echo $_COOKIE["test"];
//setcookie("test", "", time() - 3600); // кука удаляется

isset($_COOKIE['counter']) ? setcookie('counter', ++$_COOKIE['counter']) : setcookie('counter', 1);
// префиксный инкремент используется для того чтобы переменная прибавилась, а потом уже отдалась в значение массива
// тогда счетчик будет прибавляться, вместо того чтобы оставаться на месте

echo isset($_COOKIE['counter']) ? $_COOKIE['counter'] : 1;

?> 
