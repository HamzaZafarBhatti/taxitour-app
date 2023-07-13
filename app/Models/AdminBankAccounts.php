<?php

namespace App\Models;

use App\Enum\AdminBankAccountsAccountForEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminBankAccounts extends Model
{
    use HasFactory;

    protected $table = 'admin_bank_accounts';

    protected $fillable = [
        'name', 'id_number', 'bank_name', 'account_number', 'account_for'
    ];

    protected $casts = [
        'account_for' => AdminBankAccountsAccountForEnum::class,
    ];
}
