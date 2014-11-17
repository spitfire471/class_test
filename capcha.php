<?php
header("Content-type: image/png");
session_start();
$string = "";
for ($i = 0; $i < 3; $i++) // Здесь задается количество символов на картинке
$string .= chr(rand(97, 122)); // вывод случайных символов от a до z, по html коду
$_SESSION["capcha"] = $string; // создаем сессию, в которой будут храниться отображаемые символы
$font='tahoma.ttf';
$image = imagecreatetruecolor(90, 50); // размер создаваемой картинки
$black = imagecolorallocate($image, 10, 110, 0); // выделение цвета для изображения
$color = imagecolorallocate($image, 255, 255, 255); // Цвет символов на картинке
$bg = imagecolorallocate($image, 0, 0, 0); // фоновое изображение картинки
imagefilledrectangle($image,0,0,399,99,$bg); // рисует заполненный прямоугольник
imagettftext ($image, 30, 0, 10, 40, $color, $font, $_SESSION["capcha"]); // добавляем текст на изображение с использованием шрифтов TrueType, а так же сохраняем символы в данной сессии
imagepng($image);
imagedestroy($image);


?>