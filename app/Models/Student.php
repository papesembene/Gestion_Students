<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname',
        'lastname',
        'image',
        'birthday',
        'lieu',
        'telephone',

    ];



    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function classes() {
        return $this->belongsToMany(Classe::class,'students_classes','id_student','id_classe')
            ->withPivot('annee_academique');
    }
}
