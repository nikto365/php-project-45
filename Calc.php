<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\frameGame;

//The minimum number used as an operand
const MIN_OPERAND = 0;
// Maximum number used as an operand
const MAX_OPERAND = 100;
/**
 * Calculates the result of the given expression.
 *
 * @param int $operand1 The first operand.
 * @param int $operand2 The second operand.
 * @param string $operator The operator.
 * @return int The result of the operation.
 */
function calculateResult(int $operand1, int $operand2, string $operator): int
{
    switch ($operator) {
        case '+':
            return $operand1 + $operand2;
        case '-':
            return $operand1 - $operand2;
        case '*':
            return $operand1 * $operand2;
        default:
            throw new \InvalidArgumentException("Unsupported operator: $operator");
    }
}

/**
 * Starts the "calc" game.
 *
 * @return void
 */
function runCalc(): void
{
    $rule = 'What is the result of the expression?';

    $generateQuestion = function () {
        // Переменная для операторов
        $operators = ['+', '-', '*'];
        $operand1 = rand(MIN_OPERAND, MAX_OPERAND);
        $operand2 = rand(MIN_OPERAND, MAX_OPERAND);
        $operator = $operators[array_rand($operators)];

        $question = "{$operand1} {$operator} {$operand2}";
        $correctAnswer = calculateResult($operand1, $operand2, $operator);

        return [$question, (string)$correctAnswer];
    };

    frameGame($rule, $generateQuestion);
}
