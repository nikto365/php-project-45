<?php

namespace BrainGames\Prime;

use function cli\line;
use function cli\prompt;

function primeCheck($number)
{
    if ($number <= 1) {
        return 'no';
    }
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i === 0) {
            return 'no';
        }
    }
    return 'yes';
}

function prime($name)
{
    $flag = 0;
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    while ($flag < 3) {
        $num = rand(2, 100); // Изменено на 2, чтобы избежать чисел <= 1

        // Выводим вопрос
        line("Question: %d", $num);

        // Получаем ответ от пользователя
        $answ = prompt('Your answer ');

        // Проверка числа на простоту
        $correctAnswer = primeCheck($num);

        // Сравниваем ответ пользователя с результатом
        if ($answ === $correctAnswer) {
            line('Correct!');
            $flag++;
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answ, $correctAnswer);
            line("Let's try again, %s!", $name);
            return; // Изменен на return, чтобы не продолжать при ошибке
        }
    }
    line("Congratulations, %s!", $name);
}
