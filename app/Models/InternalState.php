<?php

namespace App\Models;

use App\Models\ExamDate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class InternalState extends Model
{
    use HasFactory;
    protected $table = 'internal_states';
    protected $fillable = ['name', 'color'];

    public function examDates(): BelongsToMany
    {
        return $this->belongsToMany(ExamDate::class);
    }
}
