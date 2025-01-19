<?php

namespace BrainGames\Games\Progress;

use function BrainGames\Engine\frameGame;

//The minimum number used as an operand
const MIN_OPERAND = 0;
// Maximum number used as an operand
const MAX_OPERAND = 100;
//The minimum step (difference between two consecutive numbers) in the arithmetic progression.
const MIN_STEP = 1;
//The maximum step (difference between two consecutive numbers) in the arithmetic progression.
const MAX_STEP = 20;
//The minimum length of the arithmetic progression.
const MIN_PROGRESSION_LENGTH = 5;
// The maximum length of the arithmetic progression.
const MAX_PROGRESSION_LENGTH = 10;

/**
 * Generates an arithmetic progression.
 *
 * @return int[] The arithmetic progression array.
 */
function generateArithmeticProgression(): array
{
    $firstNum = rand(MIN_OPERAND, MAX_OPERAND);
    $step = rand(MIN_STEP, MAX_STEP);
    $count = rand(MIN_PROGRESSION_LENGTH, MAX_PROGRESSION_LENGTH);

    return range($firstNum, $firstNum + ($count - 1) * $step, $step);
}

/**
 * Generates a question for the game with a missing number in the arithmetic progression.
 *
 * @param int[] $progression The arithmetic progression array.
 * @return array The question as a string and the correct answer.
 */
function generateQuestionWithMissingNumber(array $progression): array
{
    $missingIndex = rand(0, count($progression) - 1);
    $missingNumber = $progression[$missingIndex];
    $progression[$missingIndex] = ".."; // Replace the number with a placeholder for the missing number.

    // Generate the question and return it with the correct answer
    $question = implode(' ', $progression);

    return [$question, $missingNumber];
}

/**
 * Starts the "progression" game.
 *
 * @return void
 */
function runProgressionGame(): void
{
    $rule = 'What number is missing in the progression?';

    $generateQuestion = function () {
        $progression = generateArithmeticProgression();
        [$question, $missingNumber] = generateQuestionWithMissingNumber($progression);

        return [$question, (string)$missingNumber];
    };

    frameGame($rule, $generateQuestion);
}
