<?php

namespace App\Models;

use App\Models\User;
use App\Models\BankAccount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Centre extends Model
{
    use HasFactory;
    protected $fillable = [
        'comercial_name',
        'comercial_email',
        'contact_person',
        'fiscal_name',
        'nif',
        'fiscal_email',
        'address',
        'lat',
        'lng',
        'phone',
        'sepa',
        'payment_method',
        'bank_account',
        'send_certificates_to'
    ];

    public function bankAccount(): HasOne
    {
        return $this->hasOne(BankAccount::class);
    }

    public function contactPerson(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
