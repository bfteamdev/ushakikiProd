<?php

namespace App\Models;

use App\Models\Type;
use App\Models\Groupe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['groupe_id', "name", "icon", "price"];

    public function groupe(){
        return $this->belongsTo(Groupe::class);
    }

    public function type(){
        return $this->hasMany(Type::class);
    }
}
