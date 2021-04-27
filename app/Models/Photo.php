<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table="photos";
    /**
     * Get the user that owns the Photo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function annonce()
    {
        return $this->belongsTo(Annonce::class, 'annonce_id');
    }
}
