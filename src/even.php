<?php

namespace BrainGames\Even;

use function \cli\line;
use function \cli\prompt;

function run()
{
    line('Welcome to the Brain Games!');
    line('Answer "yes" if number even otherwise answer "no".');
    $name = prompt('May I have your name? Sam');
    line("Hello, %s!", $name);
    for ($i = 0; $i < 3; $i++) {
        $randNumber = (int)rand(0, 100);
        $isEven = $randNumber % 2 === 0 ? 'yes' : 'no';
        line("Question: %u!", $randNumber);
        $answer = prompt('Your answer: ');
        if ($answer !== $isEven) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'", $answer, $isEven);
            line("Let's try again, %s!", $name);
            exit();
        } else {
            line("Correct!");
        }
        line("Congratulations, %s!", $name);
    }
}
