<?php

$url = $_SERVER['REQUEST_URI'];
echo $url;

$pwd = __DIR__ . '/..';

$layout = file_get_contents($pwd . '/views/layout.php');



if ($url == '/') {
  $content = '<h1>main page</h1>';
} else {
  $content = file_get_contents($pwd . '/views/' . $url . '.php');
}


$layout = str_replace('{{ content }}', $content, $layout);

echo  $layout;