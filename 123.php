<?php
// Сообщение
$message = "Line 1\nLine 2\nLine 3";

// На случай если какая-то строка письма длиннее 70 символов мы используем wordwrap()
$message = wordwrap($message, 70);

// Отправляем
mail('spitfire.ukr@gmail.com', 'My Subject', $message,'From: spitfire.ukr@gmail.com');
?>