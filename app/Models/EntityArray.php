<?php

declare(strict_types=1);

namespace App\Models;

class EntityArray
{
    public static function render(): void
    {
        // Індексний масив операцій калькулятора
        $operations = [
            'Віднімання',
            'Додавання',
            'Множення',
            'Ділення',
            'Піднесення до степеня'
        ];

        // Сортування масиву за алфавітом
        sort($operations, SORT_STRING);

        // Асоціативний масив з характеристиками калькулятора
        $calculator = [
            'name' => 'Smart Calculator',
            'operation' => 'Додавання',
            'first_number' => 15,
            'second_number' => 5,
            'result' => 20
        ];

        echo '<h2>Індексний масив операцій</h2>';
        echo '<ul>';

        foreach ($operations as $operation) {
            echo '<li>' . htmlspecialchars($operation) . '</li>';
        }

        echo '</ul>';

        echo '<h2>Асоціативний масив калькулятора</h2>';
        echo '<ul>';

        foreach ($calculator as $key => $value) {
            echo '<li><strong>' .
                htmlspecialchars((string) $key) .
                ':</strong> ' .
                htmlspecialchars((string) $value) .
                '</li>';
        }

        echo '</ul>';
    }
}
