<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\frameGame;

//The minimum number used as an operand
const MIN_OPERAND = 0;
// Maximum number used as an operand
const MAX_OPERAND = 100;
// Divisor for checking even numbers
const EVEN_DIVISOR = 2;

/**
 * Checks if a number is even or odd.
 *
 * @param  int $num The number to check.
 * @return bool True if the number is even, false otherwise.
 */
function isEven(int $num): bool
{
    return $num % EVEN_DIVISOR === 0;
}

function runEven()
{
    $rule = 'Answer "yes" if the number is even, otherwise answer "no".';

    $generateQuestion = function () {
        $randomNumber = rand(MIN_OPERAND, MAX_OPERAND);
        $isEven = isEven($randomNumber);
        $correctAnswer = $isEven ? 'yes' : 'no';

        return [$randomNumber, $correctAnswer];
    };

    frameGame($rule, $generateQuestion);
}
