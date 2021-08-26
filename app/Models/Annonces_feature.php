<?php

namespace App\Models;

use App\Models\Field;
use App\Models\Annonce;
use App\Models\Feature;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Annonces_feature extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function feature()
    {
        return $this->belongsTo(Feature::class);
    }
    public function field()
    {
        return $this->belongsTo(Field::class);
    }
    /**
     * Get the user that owns the Annonces_feature
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function annonce()
    {
        return $this->belongsTo(Annonce::class);
    }
}
