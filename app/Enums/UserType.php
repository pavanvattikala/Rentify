<?php

namespace App\Enums;

enum UserType: string
{
    case Buyer = 'buyer';
    case Seller = 'seller';


    public static function getValues(): array
    {
        return [
            self::Buyer->value,
            self::Seller->value,
        ];
    }
}
