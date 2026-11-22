<?php

declare(strict_types=1);

namespace App\Services;

class DataProcessor
{
    // Завдання 1: знаходження найменшої цифри натурального числа
    public static function findMinimumDigit(int $number): int
    {
        if ($number <= 0) {
            throw new \InvalidArgumentException(
                'Число повинно бути натуральним.'
            );
        }

        $digits = str_split((string) $number);

        return (int) min($digits);
    }

    // Завдання 2: обмін першого та останнього слова
    public static function swapFirstAndLastWord(string $text): string
    {
        $words = preg_split('/\s+/', trim($text));

        if ($words === false || count($words) < 2) {
            return $text;
        }

        $first = $words[0];
        $lastIndex = count($words) - 1;

        $words[0] = $words[$lastIndex];
        $words[$lastIndex] = $first;

        return implode(' ', $words);
    }

    // Завдання 3: перевірка сортування латинських літер за зростанням
    public static function areLatinLettersSorted(string $text): bool
    {
        preg_match_all('/[a-z]/i', $text, $matches);

        $letters = array_map('strtolower', $matches[0]);

        for ($i = 1; $i < count($letters); $i++) {
            if ($letters[$i] < $letters[$i - 1]) {
                return false;
            }
        }

        return true;
    }
}
