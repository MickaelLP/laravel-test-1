<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = ["name", "description"];

    public function avis(){
        return $this->hasMany(Avis::class)->orderBy('created_at','asc'); // Un subject est associé à plusieurs réponses
    }
}
