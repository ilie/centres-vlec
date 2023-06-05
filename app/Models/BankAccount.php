<?php

namespace App\Models;

use App\Models\Centre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BankAccount extends Model
{
    use HasFactory;
    protected $table = "bank_accounts";
    protected $fillable = ['iban', 'bank', 'branch', 'cd', 'number', 'holder'];

    public function centre(): BelongsTo
    {
        return $this->belongsTo(Centre::class);
    }
}
