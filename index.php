<?php
include('promenade.php');

use \Oefenweb\Promenade as Promenade;

$input = file_get_contents(__DIR__ . '/input.txt');

$promenade = new Promenade();
$promenade->dance($input);
echo $promenade->getPrograms() . PHP_EOL;
