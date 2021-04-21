<?php

namespace App\Models;

use App\Models\Annonce;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Type extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table='types';

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function Ads()
    {
        return $this->hasMany(Annonce::class);
    }
}
