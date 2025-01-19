<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

// The maximum number of correct answers required to win the game
const MAX_CORRECT_ANSWERS = 3;

/**
 * Main function for the game engine.
 *
 * @param string $condition The condition before the game.
 * @param callable $generateQuestion Callback function that provides a question and the correct answer.
 * @return void
 */
function frameGame(string $condition, callable $generateQuestion): void
{
    // Приветствие игрока
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($condition);

    // Счетчик правильных ответов
    $correctAnswersCount = 0;

    while ($correctAnswersCount !== MAX_CORRECT_ANSWERS) {
        [$question, $correctAnswer] = $generateQuestion();
        line("Question: {$question}");
        $answer = prompt('Your answer ');

        if ($answer === $correctAnswer) {
            $correctAnswersCount++;
            line('Correct!');
        } else {
            line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            line("Let's try again, %s!", $name);
            return;
        }
    }

    line("Congratulations, %s!", $name);
}
