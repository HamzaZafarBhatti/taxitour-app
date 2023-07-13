<?php

namespace App\Enum;

enum AdminBankAccountsAccountForEnum: string
{
    case USER = 'user';
    case DRIVER = 'driver';

    public function getLabel(): string
    {
        return match ($this) {
            self::USER => 'User',
            self::DRIVER => 'Driver',
        };
    }
}
