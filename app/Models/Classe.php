<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    protected  $table ='classes';
    protected  $fillable = [
        'nomclasse',
    ];
    public function students()
    {
        return $this->belongsToMany(Student::class,'students_classes','id_student','id_classe')
            ->withPivot('annee_academique');

    }
}
