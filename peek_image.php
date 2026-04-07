<?php
$pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=moviedb', 'root', '');
print_r($pdo->query('SELECT image, image_link FROM movie LIMIT 1')->fetch(PDO::FETCH_ASSOC));
