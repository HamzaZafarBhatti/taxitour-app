<?php

namespace App\Enum;

enum WalletTopupStatusEnum: string
{
    case PENDING = 'pending';
    case WAITING = 'waiting';
    case PAID = 'paid';
    case REJECTED = 'rejected';

    public function getLabel(): string
    {
        return match ($this) {
            self::PENDING => 'Pending',
            self::WAITING => 'Waiting',
            self::PAID => 'Paid',
            self::REJECTED => 'Rejected',
        };
    }
}
