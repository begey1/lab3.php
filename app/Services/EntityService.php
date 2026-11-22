<?php

declare(strict_types=1);

namespace App\Services;

class EntityService
{
    public static function applyDiscount(float $price, float $discount): float
    {
        if ($price < 0) {
            throw new \InvalidArgumentException(
                'Ціна не може бути від’ємною.'
            );
        }

        if ($discount < 0 || $discount > 100) {
            throw new \InvalidArgumentException(
                'Знижка повинна бути від 0 до 100 відсотків.'
            );
        }

        return $price - ($price * $discount / 100);
    }
}
