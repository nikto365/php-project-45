<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\frameGame;

//The minimum number used as an operand
const MIN_OPERAND = 0;
// Maximum number used as an operand
const MAX_OPERAND = 100;

/**
 * Calculates the greatest common divisor of two numbers.
 *
 * @param  int $a The first number.
 * @param  int $b The second number.
 * @return int The greatest common divisor.
 */
function gcd(int $a, int $b): int
{
    while ($b !== 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }
    return $a;
}

function runGcdGame()
{
    $rule = 'Find the greatest common divisor of given numbers.';

    $generateQuestion = function () {
        $firstNumber = rand(MIN_OPERAND, MAX_OPERAND);
        $secondNumber = rand(MIN_OPERAND, MAX_OPERAND);
        $correctAnswer = gcd($firstNumber, $secondNumber);
        $question = "{$firstNumber} {$secondNumber}";
        return [$question, (string)$correctAnswer];
    };

    frameGame($rule, $generateQuestion);
}
