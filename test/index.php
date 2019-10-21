<?php

$input = "test1chfghfgh234";
$hash = password_hash($input, PASSWORD_DEFAULT);
$varify = password_verify($input, '$2y$10$Mg/b20pn41zFrOKT28a3OevKV1JFfKjjF0GrGOhFbO.8L0j1zRmXu');

echo $input;
echo '<br>';
echo $hash;
echo '<br>';
echo $varify;