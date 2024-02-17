<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

protected $fillable = [
        'student_id',
        'matiere_id',
        'note',
        'appreciation',
        'periode',
        'year',
        'session',
        'type',
        'coeff',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

}
