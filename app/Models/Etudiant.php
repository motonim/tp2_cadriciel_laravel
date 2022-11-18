<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{

    use HasFactory;

    protected $fillable = [
        'id',
        'nom',
        'adresse',
        'phone',
        'email',
        'birthday',
        'ville_id',
    ];

    public function selectVille() {
        return $this->hasOne('App\Models\Ville', 'id', 'ville_id');
    }
}
