<?php
/**
 * Created by PhpStorm.
 * User: gries
 * Date: 06.12.2015
 * Time: 12:19
 */

namespace gries\Pokebot\Command;

use gries\Pokemath\PokeCalculator;
use PhpSlackBot\Command\BaseCommand;

class PokemathCommand extends BaseCommand
{
    protected $calculator;

    public function __construct()
    {
        $this->calculator = new PokeCalculator();
    }

    protected function configure()
    {
        $this->setName('pokemath:');
    }

    protected function execute($message, $context)
    {
        $text = $this->cleanMessage($message['text']);

        $translated = $this->calculator->translate($text, PokeCalculator::INPUT_DECIMAL);
        $result = $this->calculator->calculate($translated);

        $answer = sprintf("```%s -> *%s* (%s)```", $translated, $result->value(), $result->asDecimalString());
        $this->send($this->getCurrentChannel(), null, $answer);
    }

    protected function cleanMessage($message)
    {
        $message = trim(str_replace('pokemath:', '', $message));
        return preg_replace('/[^0-9*-+\/()]/', '', $message);
    }
}