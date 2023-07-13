<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminBankAccounts extends Model
{
    use HasFactory;

    protected $table = 'admin_bank_accounts';

    protected $fillable = [
        'name', 'id_number', 'bank_name', 'account_number', 'account_for'
    ];
}
