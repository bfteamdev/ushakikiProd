<?php

namespace App\Models;

use App\Models\Annonces_feature;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Field extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function features(){
        return $this->belongsTo(Feature::class);
    }
    public function annonce_feature()
    {
        return $this->hasMany(Annonces_feature::class);
    }
}
