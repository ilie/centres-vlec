<?php

namespace App\Models;

use App\Models\InternalState;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExamDate extends Model
{
    use HasFactory;
    protected $table = "exam_dates";
    protected $fillable = [
        'type',
        'exam',
        'exam_date',
        'speaking_date',
        'location',
        'deadline',
        'cambridge_deadline',
        'results_date',
        'certificates_date',
        'price',
        'state',
        'internal_state',
        'is_public'
    ];

    public function internalState(): HasOne
    {
        return $this->hasOne(InternalState::class);
    }
}
