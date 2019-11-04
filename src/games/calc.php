<?php

namespace BrainGames\Games\Calc;

use function \cli\line;
use function \cli\prompt;


function run()
{
    line('Welcome to the Brain Games!');
    line('What is the result of the expression?');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);


    for ($i = 0; $i < 3; $i++) {
        $operation = [
            0 => [
                'op' => '+',
                'f' => function ($a, $b) {
                    return $a + $b;
                }
            ],
            1 => [
                'op' => '-',
                'f' => function ($a, $b) {
                    return $a - $b;
                }
            ],
            2 => [
                'op' => '*',
                'f' => function ($a, $b) {
                    return $a * $b;
                }
            ],
        ];
        $randNumber1 = (int)rand(0, 100);
        $randNumber2 = (int)rand(0, 100);
        $randOpNumber = (int)rand(0, 2);
        $randOperation = $operation[$randOpNumber]['op'];
        $result = $operation[$randOpNumber]['f']($randNumber1, $randNumber2);
        line("Question: %u %s %u:", $randNumber1, $randOperation, $randNumber2);
        $answer = prompt('Your answer: ');
        if ($answer === $result) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'", $answer, $result);
            line("Let's try again, %s!", $name);
            exit();
        } else {
            line("Correct!");
        }
    }
    line("Congratulations, %s!", $name);
}