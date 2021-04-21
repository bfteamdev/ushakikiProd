<?php

namespace App\Models;

use App\Models\Type;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Annonce extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table="annonces";

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function type(){
        return $this->hasMany(Type::class);
    }
}
