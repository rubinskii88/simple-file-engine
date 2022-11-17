<?php

$pwd = __DIR__ . '/..';

$url = $_SERVER['REQUEST_URI'];

if ($url == '/') {
  $url = '/main';
}

$path = $pwd . '/views/' . $url . '.php';

// echo $path;

if (file_exists($path)) {
  $titles = require_once $pwd . '/views/titles.php';

  $title = $titles[$url];
  
  $content = file_get_contents($pwd . '/views/' . $url . '.php');
} else {
  
  $title = '404';
  $content = file_get_contents($pwd . '/views/404.php');
}

$layout = file_get_contents($pwd . '/views/layout.php');

$navigation = file_get_contents($pwd . '/views/navigation.php');

$layout = str_replace('{{ title }}', $title, $layout);

$layout = str_replace('{{ navigation }}', $navigation, $layout);

$layout = str_replace('{{ content }}', $content, $layout);

echo  $layout;