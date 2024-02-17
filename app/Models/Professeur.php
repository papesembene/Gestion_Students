<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'direction_id',
        'speciality',
    ];


    public function direction()
    {
        return $this->belongsTo(Direction::class, 'direction_id');


    }

    public function matieres()
    {
        return $this->hasMany(Matiere::class);
    }
}
