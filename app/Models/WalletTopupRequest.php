<?php

namespace App\Models;

use App\Enum\WalletTopupStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletTopupRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'amount', 'ref_number', 'account_number', 'id_number', 'bank_name', 'account_name', 'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    protected $casts = [
        'status' => WalletTopupStatusEnum::class,
    ];
}
