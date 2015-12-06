Pokebot
========

Slackbot integration to use Pokemath.

Installation
------------

Pokebot can be installed via. Composer:

    composer require "gries/pokebot"


Usage
-----

**Run the bot**
```php
<?php

use gries\Pokebot\Command\PokemathCommand;
use PhpSlackBot\Bot;

require_once __DIR__.'/../vendor/autoload.php';

$bot = new Bot();
$bot->setToken('token');
$bot->loadCommand(new PokemathCommand());
$bot->run();
```

**Using the bot in slack**
![demo](master/examples/demo.gif?raw=true "Title")

Author
------

- [Christoph Rosse](http://twitter.com/griesx)

License
-------
For the full copyright and license information, please view the LICENSE file that was distributed with this source code.