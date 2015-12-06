<?php

use gries\Pokebot\Command\PokemathCommand;
use PhpSlackBot\Bot;

require_once __DIR__.'/../vendor/autoload.php';

$bot = new Bot();
$bot->setToken('token');
$bot->loadCommand(new PokemathCommand());
$bot->run();