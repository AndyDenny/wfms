<?php
error_reporting(-1);

//strpos() - возвращает позицию искомого символа в строке
//mb_strpos()
//$str = 'Привет мир!';
//echo mb_strpos($str , 'и'); // 2
//var_dump(mb_strpos($str , 'y')); // false
//echo mb_strpos($str , 'и',3); // 9

// переводят строки в верхний и нижний регистр
//$str = 'привет мир!';
//echo mb_strtoupper($str); // ПРИВЕТ МИР!
//$str = 'ПРИВЕТ МИР!';
//echo mb_strtolower($str); // привет мир!

// mb_substr() - возвращает подстроку, с указанного индекса
//$str = 'Привет мир!';
//echo mb_substr($str, 0, 3); //  При
//echo mb_substr($str, 4, 7); //  ет мир!
//echo mb_substr($str, -4, 3); //  мир

//htmlspecialchars() - преобразует HTML-символы в HTML-мнемоники
//echo htmlspecialchars('Привет мир!<br>'); // Привет мир!&lt;br&gt;

//htmlspecialchars_decode() - преобразует HTML-мнемоники в HTML-символы
//echo htmlspecialchars_decode('Привет мир!&lt;br&gt;'); // Привет мир!
