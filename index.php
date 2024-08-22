<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';

$app = new App\App(PATH);

if(isset($_GET['set'])) {
    $app->switch($_GET['set']);
}

echo '<p><a href="' . URL . '" target="_blank">Open</a>';

echo '<p>' . $app->current() . '</p>';

foreach($app->versions() as $version) {
    echo '<a href="?set=' . $version . '">' . $version . '</a><br>';
}
