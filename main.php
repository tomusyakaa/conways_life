<?php

require "vendor/autoload.php";

$glider = [
    [10, 10], [11, 11], [12, 11], [12, 10], [12, 9]
];

use App\Game;
use App\View\Console;
use App\Universe;

$console  = new Console();
$universe = new Universe(25, 25, $glider);

(new Game())
    ->setUniverse($universe)
    ->setView($console)
    ->run(80);
