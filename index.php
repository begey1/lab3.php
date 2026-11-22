<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Models\EntityArray;
use App\Services\EntityService;
use App\Services\DataProcessor;

$faker = Faker\Factory::create('uk_UA');

?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лабораторна робота №3 — Smart Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
            background: #f2f4f8;
            color: #222;
        }

        section {
            background: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
        }

        h1, h2 {
            color: #2456a6;
        }

        li {
            margin: 7px 0;
        }

        .result {
            background: #e8f4ff;
            padding: 12px;
            border-radius: 6px;
        }

        .error {
            color: #c62828;
        }
    </style>
</head>
<body>

<h1>Smart Calculator — лабораторна робота №3</h1>

<section>
    <h2>1. Масиви даних</h2>

    <?php EntityArray::render(); ?>
</section>

<section>
    <h2>2. Генерація випадкових чисел за допомогою Faker</h2>

    <?php
    $numbers = [];

    for ($i = 0; $i < 10; $i++) {
        $numbers[] = $faker->numberBetween(1, 1000);
    }

    echo '<p>Згенеровані числа:</p>';
    echo '<ul>';

    foreach ($numbers as $number) {
        echo '<li>' . $number . '</li>';
    }

    echo '</ul>';

    $threshold = 500;

    $filterNumbers = function (int $number) use ($threshold): bool {
        return $number > $threshold;
    };

    $filteredNumbers = array_filter($numbers, $filterNumbers);
    ?>

    <p class="result">
        Числа, більші за <?= $threshold ?>:
        <?= htmlspecialchars(implode(', ', $filteredNumbers)) ?>
    </p>
</section>

<section>
    <h2>3. Робота сервісу знижок</h2>

    <?php
    try {
        $price = 1000.0;
        $discount = 20.0;

        $finalPrice = EntityService::applyDiscount($price, $discount);

        echo '<p>Початкова ціна: ' . $price . ' грн</p>';
        echo '<p>Знижка: ' . $discount . '%</p>';
        echo '<p class="result">Ціна зі знижкою: ' . $finalPrice . ' грн</p>';

        // Перевірка некоректної знижки
        EntityService::applyDiscount(1000.0, 150.0);

    } catch (InvalidArgumentException $e) {
        echo '<p class="error">Перехоплена помилка: ' .
            htmlspecialchars($e->getMessage()) .
            '</p>';
    } finally {
        echo '<p>Блок finally виконано.</p>';
    }
    ?>
</section>

<section>
    <h2>4. Обробка даних — варіант №2</h2>

    <?php
    $number = 1234076;
    $minimumDigit = DataProcessor::findMinimumDigit($number);

    echo '<p>Число: ' . $number . '</p>';
    echo '<p class="result">Найменша цифра: ' . $minimumDigit . '</p>';

    $text = 'Привіт мій друже';
    $swappedText = DataProcessor::swapFirstAndLastWord($text);

    echo '<p>Початковий рядок: ' . htmlspecialchars($text) . '</p>';
    echo '<p class="result">Після обміну слів: ' .
        htmlspecialchars($swappedText) .
        '</p>';

    $lettersText = 'abcdef';
    $isSorted = DataProcessor::areLatinLettersSorted($lettersText);

    echo '<p>Рядок для перевірки: ' . $lettersText . '</p>';
    echo '<p class="result">Латинські літери розташовані за зростанням: ' .
        ($isSorted ? 'Так' : 'Ні') .
        '</p>';
    ?>

</section>

</body>
</html>
