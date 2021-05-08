<?php

namespace App\Models;

use App\Models\Type;
use App\Models\Photo;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Annonce extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "annonces";

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    /**
     * Get all of the comments for the Annonce
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany(Photo::class, 'annonce_id');
    }
    /**
     * Get the user associated with the Annonce
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function viewPhoto()
    {
        return $this->hasOne(Photo::class);
    }

    /**
     * Get the user that owns the Annonce
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
