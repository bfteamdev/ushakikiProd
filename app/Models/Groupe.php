<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Groupe extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function categories()
    {
        return $this->hasMany(Category::class)->with("type")->withCount(["type", "ads"]);
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}
