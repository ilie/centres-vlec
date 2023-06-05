<?php

namespace App\Models;

use App\Models\Centre;
use App\Models\ExamDate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Registration extends Model
{
    use HasFactory;
    protected $fillable = [
        'exam_date_id',
        'centre_id',
        'candidate_id',
        'candidate_name',
        'candidate_surname',
        'candidate_gender',
        'candidate_birthdate',
        'id_number',
        'city',
        'candidate_phone',
        'candidate_email',
        'candidate_type',
        'payment_date',
        'payment_method',
        'speaking_partner',
        'comment',
        'locked'
    ];

    // Centre
    public function centre(): BelongsTo
    {
        return $this->belongsTo(Centre::class);
    }

    // Exam Date
    public function examDate(): BelongsTo
    {
        return $this->belongsTo(ExamDate::class);
    }
}
