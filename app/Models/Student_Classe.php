<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_Classe extends Model
{
    use HasFactory;
    protected $table ='students_classes';
    protected $fillable = [
        'annee_academique',
        'id_classe',
        'id_student',
    ];
}
